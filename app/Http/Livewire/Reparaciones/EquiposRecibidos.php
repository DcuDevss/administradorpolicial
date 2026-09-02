<?php

namespace App\Http\Livewire\Reparaciones;

use App\Models\Recepcion;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class EquiposRecibidos extends Component
{
    /**
     * Equipos que ingresaron físicamente
     * al Área de Reparaciones.
     */
    public function getRecepcionesProperty()
    {
        return Recepcion::query()
            ->with([
                'activo.categoria',
                'activo.dependencia',
                'solicitud',
                'turno',
                'ticket',
                'recibidoPor',
            ])
            ->whereHas('solicitud', function ($query) {
                $query->whereNotIn('estado', [
                    'entregada',
                    'cerrada',
                    'cancelada',
                    'rechazada',
                ]);
            })
            ->latest('fecha_recepcion')
            ->get();
    }

    public function render()
    {
        return view('livewire.reparaciones.equipos-recibidos', [
            'recepciones' => $this->recepciones,
        ]);
    }
}
