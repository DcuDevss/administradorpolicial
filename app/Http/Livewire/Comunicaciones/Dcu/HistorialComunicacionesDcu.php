<?php

namespace App\Http\Livewire\Comunicaciones\Dcu;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoDcu;

class HistorialComunicacionesDcu extends Component
{
    use WithPagination;

    public $trabajosDcuId;

    public function mount($trabajosDcuId)
    {
        $this->trabajosDcuId = $trabajosDcuId;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos D.C.U ID en mount: ' . $this->trabajosDcuId);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoDcu::where('trabajos_dcu_id', $this->trabajosDcuId)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoDcu::where('trabajos_dcu_id', $this->trabajosDcuId)
        ->orderBy('updated_at', 'desc')
        ->paginate(15);

        return view('livewire.comunicaciones.dcu.historial-trabajo-dcu', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
