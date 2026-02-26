<?php

namespace App\Http\Livewire\Comunicaciones\Narco;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoNarco;

class HistorialComunicacionesNarco extends Component
{
    use WithPagination;

    public $trabajosNarcoId;

    public function mount($trabajosNarcoId)
    {
        $this->trabajosNarcoId = $trabajosNarcoId;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Narco ID en mount: ' . $this->trabajosNarcoId);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoNarco::where('trabajos_narco_id', $this->trabajosNarcoId)
            ->orderBy('updated_at', 'desc')
            ->paginate(25);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoNarco::where('trabajos_narco_id', $this->trabajosNarcoId)
            ->orderBy('updated_at', 'desc')
            ->paginate(25);

        return view('livewire.comunicaciones.narco.historial-trabajo-narco', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
