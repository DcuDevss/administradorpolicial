<?php

namespace App\Http\Livewire\Comunicaciones\Tolhuin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoTolhuin;

class HistorialComunicacionesTolhuin extends Component
{
    use WithPagination;

    public $trabajosTolhuinId;

    public function mount($trabajosTolhuinId)
    {
        $this->trabajosTolhuinId = $trabajosTolhuinId;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Tolhuin ID en mount: ' . $this->trabajosTolhuinId);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoTolhuin::where('trabajos_tolhuin_id', $this->trabajosTolhuinId)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }

    

    public function render()
    {
        $historialTrabajos = HistorialTrabajoTolhuin::where('trabajos_tolhuin_id', $this->trabajosTolhuinId)
        ->orderBy('updated_at', 'desc')
        ->paginate(15);

        return view('livewire.comunicaciones.tolhuin.historial-trabajo-tolhuin', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
