<?php

namespace App\Http\Livewire\Activos;

use App\Models\Activo;
use Livewire\Component;

class DetalleActivo extends Component
{
    public Activo $activo;

    public function mount(Activo $activo): void
    {
        $this->activo = $activo->load([
            'dependencia',
            'ubicacion',
            'categoria',
            'especificaciones',
        ]);
    }

    public function render()
    {
        return view('livewire.activos.detalle-activo');
    }
}
