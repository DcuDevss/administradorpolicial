<?php

namespace App\Http\Livewire\Reparaciones;

use App\Models\Activo;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class FichaActivo extends Component
{
    public Activo $activo;

    public function mount(Activo $activo): void
    {
        $this->activo = $activo->load([
            'dependencia',
            'ubicacion',
            'categoria',
            'responsable',
            'solicitudesReparacion',
        ]);
    }

    public function render()
    {
        return view('livewire.reparaciones.ficha-activo');
    }
}
