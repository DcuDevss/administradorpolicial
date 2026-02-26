<?php

namespace App\Http\Livewire\Comunicaciones\Investigacion;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoInvestigacion;
use App\Models\HistorialTrabajoInvestigaciones;

class HistorialComunicacionesInvestigaciones extends Component
{
    use WithPagination;

    public $trabajosInvestigacionId;

    public function mount($trabajosInvestigacionId)
    {
        $this->trabajosInvestigacionId = $trabajosInvestigacionId;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Investigacion ID en mount: ' . $this->trabajosInvestigacionId);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoInvestigaciones::where('trabajos_investigaciones_id', $this->trabajosInvestigacionId)
            ->orderBy('updated_at', 'desc')
            ->paginate(25);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoInvestigaciones::where('trabajos_investigaciones_id', $this->trabajosInvestigacionId)
            ->orderBy('updated_at', 'desc')
            ->paginate(25);

        return view('livewire.comunicaciones.investigacion.historial-trabajo-investigaciones', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
