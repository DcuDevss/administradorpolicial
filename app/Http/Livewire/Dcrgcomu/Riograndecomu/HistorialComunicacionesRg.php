<?php

namespace App\Http\Livewire\Dcrgcomu\Riograndecomu;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoRiogrande;

class HistorialComunicacionesRg extends Component
{
    use WithPagination;

    public $trabajosRiograndeId;

    public function mount($trabajosRiograndeId)
    {
        $this->trabajosRiograndeId = $trabajosRiograndeId;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Rio grande ID en mount: ' . $this->trabajosRiograndeId);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoRiogrande::where('trabajos_riogrande_id', $this->trabajosRiograndeId)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoRiogrande::where('trabajos_riogrande_id', $this->trabajosRiograndeId)
        ->orderBy('updated_at', 'desc')
        ->paginate(15);

        return view('livewire.dcrgcomu.riograndecomu.historial-trabajo-riogrande', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
