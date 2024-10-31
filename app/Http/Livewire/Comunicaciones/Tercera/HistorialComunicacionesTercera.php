<?php

namespace App\Http\Livewire\Comunicaciones\Tercera;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoTercera;

class HistorialComunicacionesTercera extends Component
{
    use WithPagination;

    public $trabajosTerceraId;

    public function mount($trabajosTerceraId)
    {
        $this->trabajosTerceraId = $trabajosTerceraId;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Tercera ID en mount: ' . $this->trabajosTerceraId);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoTercera::where('trabajos_tercera_id', $this->trabajosTerceraId)
            ->orderBy('updated_at', 'desc')
            ->paginate(25);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoTercera::where('trabajos_tercera_id', $this->trabajosTerceraId)
            ->orderBy('updated_at', 'desc')
            ->paginate(25);

        return view('livewire.Comunicaciones.tercera.historial-trabajo-tercera', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
