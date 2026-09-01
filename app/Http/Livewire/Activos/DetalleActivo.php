<?php

namespace App\Http\Livewire\Activos;

use App\Events\SolicitudReparacionCreada;
use App\Models\Activo;
use App\Models\SolicitudReparacion;
use App\Services\Activos\MisActivosService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class DetalleActivo extends Component
{
    use WithPagination;

    protected MisActivosService $service;

    public Activo $activo;

    public bool $mostrarSolicitud = false;

    public string $tituloSolicitud = '';

    public string $descripcionSolicitud = '';

    public string $prioridadSolicitud = 'media';

    public function boot(MisActivosService $service): void
    {
        $this->service = $service;
    }

    public function mount(Activo $activo): void
    {
        $this->activo = $activo->refresh()->load([
            'dependencia',
            'ubicacion.dependencia',
            'categoria',
            'especificaciones',
        ]);

        Log::info('DetalleActivo: activo cargado', [
            'activo_id' => $this->activo->id,
            'dependencia_id' => $this->activo->dependencia_id,
            'ubicacion_id' => $this->activo->ubicacion_id,
            'categoria_activo_id' => $this->activo->categoria_activo_id,
        ]);
    }

    /**
     * Indica si el activo posee una solicitud de reparación
     * que todavía se encuentra en curso.
     */
    public function tieneSolicitudActiva(): bool
    {
        return $this->service->tieneSolicitudActiva($this->activo);
    }

    public function abrirSolicitud(): void
    {
        if ($this->tieneSolicitudActiva()) {
            return;
        }

        $this->resetValidation();

        $this->reset([
            'tituloSolicitud',
            'descripcionSolicitud',
        ]);

        $this->prioridadSolicitud = 'media';

        $this->mostrarSolicitud = true;
    }

    /**
     * Cierra el formulario de solicitud.
     */
    public function cerrarSolicitud(): void
    {
        $this->mostrarSolicitud = false;

        $this->resetValidation();
    }

    /**
     * Registra una nueva solicitud de reparación.
     */
    public function guardarSolicitud(): void
    {
        $this->validate([
            'tituloSolicitud' => [
                'required',
                'string',
                'max:150',
            ],

            'descripcionSolicitud' => [
                'required',
                'string',
                'max:5000',
            ],

            'prioridadSolicitud' => [
                'required',
                'in:baja,media,alta,urgente',
            ],
        ]);

        $solicitud = $this->service->crearSolicitudReparacion(
            $this->activo,
            [
                'titulo' => $this->tituloSolicitud,
                'descripcion' => $this->descripcionSolicitud,
                'prioridad' => $this->prioridadSolicitud,
            ]
        );

        Log::info('DetalleActivo: solicitud creada correctamente', [
            'solicitud_id' => $solicitud->id,
            'activo_id' => $this->activo->id,
            'usuario_id' => Auth::id(),
            'prioridad' => $solicitud->prioridad,
        ]);

        event(new SolicitudReparacionCreada($solicitud));

        $this->reset([
            'tituloSolicitud',
            'descripcionSolicitud',
        ]);

        $this->prioridadSolicitud = 'media';

        $this->mostrarSolicitud = false;

        $this->activo->refresh()->load([
            'dependencia',
            'ubicacion',
            'categoria',
            'especificaciones',
            'solicitudesReparacion',
        ]);

        session()->flash(
            'success',
            'La solicitud de revisión fue registrada correctamente.'
        );
    }

    /**
     * Cancela una solicitud de reparación pendiente.
     */
    public function cancelarSolicitud(int $solicitudId): void
    {
        $solicitud = $this->service->cancelarSolicitud(
            $this->activo,
            $solicitudId
        );

        Log::info('DetalleActivo: cancelación de solicitud', [
            'user_id' => Auth::id(),
            'activo_id' => $this->activo->id,
            'solicitud_id' => $solicitud->id,
        ]);

        $this->activo->load('solicitudesReparacion');

        session()->flash(
            'success',
            'La solicitud de revisión fue cancelada correctamente.'
        );
    }

    public function render()
    {
        $solicitudes = $this->activo
            ->solicitudesReparacion()
            ->latest()
            ->paginate(5);

        return view('livewire.activos.detalle-activo', [
            'solicitudes' => $solicitudes,
        ]);
    }
}
