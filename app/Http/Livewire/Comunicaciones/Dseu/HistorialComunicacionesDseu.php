<?php

namespace App\Http\Livewire\Comunicaciones\Dseu;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoDseu;

class HistorialComunicacionesDseu extends Component
{
    use WithPagination;

    public $trabajosDseuId;

    public function mount($trabajosDseuId)
    {
        $this->trabajosDseuId = $trabajosDseuId;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Dseu ID en mount: ' . $this->trabajosDseuId);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoDseu::where('trabajos_dseu_id', $this->trabajosDseuId)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoDseu::where('trabajos_dseu_id', $this->trabajosDseuId)
        ->orderBy('updated_at', 'desc')
        ->paginate(15);

        return view('livewire.Comunicaciones.dseu.historial-trabajo-Dseu', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
