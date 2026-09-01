<?php

namespace App\Http\Livewire\Activos;

use App\Services\Activos\MisActivosService;
use Livewire\Component;
use Livewire\WithPagination;

class MisActivos extends Component
{
    use WithPagination;

    public string $buscar = '';

    public string $categoriaId = '';

    public string $ubicacionId = '';

    public string $estado = '';

    public function updatingBuscar(): void
    {
        $this->resetPage();
    }

    public function updatingCategoriaId(): void
    {
        $this->resetPage();
    }

    public function updatingUbicacionId(): void
    {
        $this->resetPage();
    }

    public function updatingEstado(): void
    {
        $this->resetPage();
    }

    public function limpiarFiltros(): void
    {
        $this->reset([
            'buscar',
            'categoriaId',
            'ubicacionId',
            'estado',
        ]);

        $this->resetPage();
    }

    public function render(MisActivosService $service)
    {
        $datos = $service->obtenerActivos([
            'buscar' => $this->buscar,
            'categoria_id' => $this->categoriaId,
            'ubicacion_id' => $this->ubicacionId,
            'estado' => $this->estado,
        ]);

        return view('livewire.activos.mis-activos', $datos);
    }
}
