<?php

namespace App\Http\Livewire\Comunicaciones\Automotore;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoAutomotore;

class HistorialComunicacionesAutomotore extends Component
{
    use WithPagination;

    public $trabajosAutomotoreId;

    public function mount($trabajosAutomotoreId)
    {
        $this->trabajosAutomotoreId = $trabajosAutomotoreId;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos D.C.U ID en mount: ' . $this->trabajosAutomotoreId);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoAutomotore::where('trabajos_auto_id', $this->trabajosAutomotoreId)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoAutomotore::where('trabajos_auto_id', $this->trabajosAutomotoreId)
        ->orderBy('updated_at', 'desc')
        ->paginate(15);

        return view('livewire.Comunicaciones.automotore.historial-trabajo-Automotore', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
