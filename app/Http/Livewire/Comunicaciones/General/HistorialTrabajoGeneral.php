<?php

namespace App\Http\Livewire\Comunicaciones\General;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialDetalleTrabajo;

class HistorialTrabajoGeneral extends Component
{
    use WithPagination;

    public $trabajosGeneraleId;

    public function mount($trabajosGeneraleId)
    {
        $this->trabajosGeneraleId = $trabajosGeneraleId;

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Generale ID en mount: ' . $this->trabajosGeneraleId);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialDetalleTrabajo::where('trabajos_generale_id', $this->trabajosGeneraleId)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }

    public function render()
    {
        $historialTrabajos = HistorialDetalleTrabajo::where('trabajos_generale_id', $this->trabajosGeneraleId)
        ->orderBy('updated_at', 'desc')
        ->paginate(15);

        return view('livewire.comunicaciones.general.historial-trabajo-general', [
            'historialTrabajos' => $historialTrabajos,
        ]);
    }
}
