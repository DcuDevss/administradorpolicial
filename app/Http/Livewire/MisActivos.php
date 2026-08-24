<?php

namespace App\Http\Livewire;

use App\Models\Activo;
use App\Models\CategoriaActivo;
use App\Models\Ubicacion;
use Livewire\Component;

class MisActivos extends Component
{
    public string $buscar = '';

    public string $categoriaId = '';

    public string $ubicacionId = '';

    public string $estado = '';

    public function limpiarFiltros(): void
    {
        $this->buscar = '';
        $this->categoriaId = '';
        $this->ubicacionId = '';
        $this->estado = '';
    }

    public function render()
    {
        $query = Activo::query()
            ->with([
                'categoria',
                'dependencia',
                'ubicacion',
            ]);

        /*
        |--------------------------------------------------------------------------
        | Búsqueda general
        |--------------------------------------------------------------------------
        */
        if (trim($this->buscar) !== '') {
            $buscar = trim($this->buscar);

            $query->where(function ($q) use ($buscar) {
                $q->where('marca', 'like', "%{$buscar}%")
                    ->orWhere('modelo', 'like', "%{$buscar}%")
                    ->orWhere('codigo_interno', 'like', "%{$buscar}%")
                    ->orWhere('numero_serie', 'like', "%{$buscar}%")
                    ->orWhere('codigo_patrimonial', 'like', "%{$buscar}%");
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Filtro por categoría
        |--------------------------------------------------------------------------
        */
        if ($this->categoriaId !== '') {
            $query->where(
                'categoria_activo_id',
                $this->categoriaId
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Filtro por ubicación
        |--------------------------------------------------------------------------
        */
        if ($this->ubicacionId !== '') {
            $query->where(
                'ubicacion_id',
                $this->ubicacionId
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Filtro por estado
        |--------------------------------------------------------------------------
        */
        if ($this->estado !== '') {
            $query->where(
                'estado',
                $this->estado
            );
        }

        $activos = $query
            ->orderBy('created_at', 'desc')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Catálogos para filtros
        |--------------------------------------------------------------------------
        */
        $categorias = CategoriaActivo::query()
            ->where('activa', true)
            ->orderBy('nombre')
            ->get();

        $ubicaciones = Ubicacion::query()
            ->where('activa', true)
            ->orderBy('nombre')
            ->get();

        return view('livewire.mis-activos', [
            'activos' => $activos,
            'categorias' => $categorias,
            'ubicaciones' => $ubicaciones,
        ]);
    }
}
