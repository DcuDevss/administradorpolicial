<?php

namespace App\Services\Activos;

use App\Models\Activo;
use App\Models\CategoriaActivo;
use App\Models\SolicitudReparacion;
use App\Models\Ubicacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class MisActivosService
{
    /**
     * Obtener los activos pertenecientes a la dependencia
     * del usuario autenticado.
     */
    public function obtenerActivos(array $filtros = []): array
    {
        $usuario = Auth::user();

        $query = Activo::query()
            ->with([
                'categoria',
                'dependencia',
                'ubicacion',
            ])
            ->withExists([
                'solicitudesReparacion as tiene_solicitud_pendiente' => function ($q) {
                    $q->where('estado', 'pendiente');
                },
            ]);

        /*
        |--------------------------------------------------------------------------
        | Alcance institucional
        |--------------------------------------------------------------------------
        */

        if ($usuario?->dependencia_id) {
            $query->where(
                'dependencia_id',
                $usuario->dependencia_id
            );
        }

        $this->aplicarFiltros($query, $filtros);

        return [
            'activos' => $query
                ->orderByDesc('created_at')
                ->paginate(12),

            'categorias' => $this->obtenerCategorias(),

            'ubicaciones' => $this->obtenerUbicaciones(
                $usuario?->dependencia_id
            ),
        ];
    }

    /**
     * Obtener los datos necesarios para los formularios de activos.
     */
    public function obtenerDatosFormulario(?int $dependenciaId = null): array
    {
        return [
            'categorias' => $this->obtenerCategorias(),

            'ubicaciones' => $this->obtenerUbicaciones(
                $dependenciaId
            ),
        ];
    }

    /**
     * Crear un nuevo activo dentro del alcance
     * de la dependencia del usuario autenticado.
     */
    public function crearActivo(array $datos): Activo
    {
        $usuario = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Usuario autenticado
        |--------------------------------------------------------------------------
        */

        if (!$usuario) {
            throw ValidationException::withMessages([
                'general' => 'No hay un usuario autenticado.',
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Dependencia
        |--------------------------------------------------------------------------
        |
        | La dependencia NO viene del formulario.
        | Se obtiene exclusivamente del usuario autenticado.
        |
        */

        if (!$usuario->dependencia_id) {
            throw ValidationException::withMessages([
                'general' => 'El usuario no tiene una dependencia asignada.',
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Ubicación
        |--------------------------------------------------------------------------
        |
        | La ubicación debe:
        |
        | - Existir.
        | - Estar activa.
        | - Pertenecer a la dependencia del usuario.
        |
        */

        $ubicacion = Ubicacion::query()
            ->where('id', $datos['ubicacion_id'] ?? null)
            ->where('dependencia_id', $usuario->dependencia_id)
            ->where('activa', true)
            ->first();

        if (!$ubicacion) {
            throw ValidationException::withMessages([
                'ubicacion_id' => 'La ubicación seleccionada no pertenece a su dependencia.',
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Crear activo
        |--------------------------------------------------------------------------
        */

        return Activo::create([
            'dependencia_id' => $usuario->dependencia_id,

            'ubicacion_id' => $ubicacion->id,

            'categoria_activo_id' => $datos['categoria_activo_id'],

            'marca' => !empty($datos['marca'])
                ? trim($datos['marca'])
                : null,

            'modelo' => !empty($datos['modelo'])
                ? trim($datos['modelo'])
                : null,

            'estado' => 'activo',

            'observaciones' => !empty($datos['observaciones'])
                ? trim($datos['observaciones'])
                : null,
        ]);
    }

    /**
     * Aplicar filtros de búsqueda.
     */
    protected function aplicarFiltros($query, array $filtros): void
    {
        $buscar = trim($filtros['buscar'] ?? '');

        if ($buscar !== '') {
            $query->where(function ($q) use ($buscar) {
                $q->where('marca', 'like', "%{$buscar}%")
                    ->orWhere('modelo', 'like', "%{$buscar}%")
                    ->orWhere('codigo_interno', 'like', "%{$buscar}%")
                    ->orWhere('numero_serie', 'like', "%{$buscar}%")
                    ->orWhere('codigo_patrimonial', 'like', "%{$buscar}%");
            });
        }

        if (!empty($filtros['categoria_id'])) {
            $query->where(
                'categoria_activo_id',
                $filtros['categoria_id']
            );
        }

        if (!empty($filtros['ubicacion_id'])) {
            $query->where(
                'ubicacion_id',
                $filtros['ubicacion_id']
            );
        }

        if (!empty($filtros['estado'])) {
            $query->where(
                'estado',
                $filtros['estado']
            );
        }
    }

    /**
     * Obtener categorías activas.
     */
    protected function obtenerCategorias()
    {
        return CategoriaActivo::query()
            ->where('activa', true)
            ->orderBy('nombre')
            ->get();
    }

    /**
     * Obtener ubicaciones activas de una dependencia.
     */
    protected function obtenerUbicaciones(?int $dependenciaId = null)
    {
        return Ubicacion::query()
            ->where('activa', true)
            ->when(
                $dependenciaId,
                fn($query) => $query->where(
                    'dependencia_id',
                    $dependenciaId
                )
            )
            ->with('dependencia')
            ->orderBy('nombre')
            ->get();
    }

    /**
     * Indica si un activo posee una solicitud de reparación pendiente.
     */
    public function tieneSolicitudPendiente(Activo $activo): bool
    {
        return $activo
            ->solicitudesReparacion()
            ->where('estado', 'pendiente')
            ->exists();
    }

    /**
     * Crear una solicitud de reparación para un activo.
     */
    public function crearSolicitudReparacion(
        Activo $activo,
        array $datos
    ): SolicitudReparacion {
        $usuario = Auth::user();

        if (!$usuario) {
            throw ValidationException::withMessages([
                'general' => 'No hay un usuario autenticado.',
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Verificar solicitud pendiente
        |--------------------------------------------------------------------------
        */

        if ($this->tieneSolicitudPendiente($activo)) {
            throw ValidationException::withMessages([
                'general' => 'Este activo ya tiene una solicitud de reparación pendiente.',
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Crear solicitud
        |--------------------------------------------------------------------------
        */

        return SolicitudReparacion::create([
            'activo_id' => $activo->id,
            'usuario_id' => $usuario->id,
            'estado' => 'pendiente',
            'prioridad' => $datos['prioridad'],
            'titulo' => trim($datos['titulo']),
            'descripcion' => trim($datos['descripcion']),
        ]);
    }

    /**
     * Cancelar una solicitud de reparación.
     */
    public function cancelarSolicitud(
        Activo $activo,
        int $solicitudId
    ): SolicitudReparacion {
        $usuario = Auth::user();

        if (!$usuario) {
            throw ValidationException::withMessages([
                'general' => 'No hay un usuario autenticado.',
            ]);
        }

        $solicitud = $activo
            ->solicitudesReparacion()
            ->where('id', $solicitudId)
            ->where('usuario_id', $usuario->id)
            ->where('estado', 'pendiente')
            ->first();

        if (!$solicitud) {
            throw ValidationException::withMessages([
                'general' => 'La solicitud no puede ser cancelada.',
            ]);
        }

        $solicitud->update([
            'estado' => 'cancelada',
        ]);

        return $solicitud;
    }
}
