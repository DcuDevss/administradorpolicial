<?php

namespace App\Http\Livewire\Comunicaciones\Complejo;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoComplejo;

class HistorialComunicacionesComplejo extends Component
{
    use WithPagination;

    public $trabajosComplejoId;

    public function mount($trabajosComplejoId)
    {
        $this->trabajosComplejoId = $trabajosComplejoId;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Complejo ID en mount: ' . $this->trabajosComplejoId);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoComplejo::where('trabajos_complejo_id', $this->trabajosComplejoId)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoComplejo::where('trabajos_complejo_id', $this->trabajosComplejoId)
        ->orderBy('updated_at', 'desc')
        ->paginate(15);

        return view('livewire.Comunicaciones.complejo.historial-trabajo-Complejo', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
