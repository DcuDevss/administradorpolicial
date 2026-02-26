<?php

namespace App\Http\Livewire\Comunicaciones\Segunda;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoSegunda;

class HistorialComunicacionesSegunda extends Component
{
    use WithPagination;

    public $trabajosSegundaId;

    public function mount($trabajosSegundaId)
    {
        $this->trabajosSegundaId = $trabajosSegundaId;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Segunda ID en mount: ' . $this->trabajosSegundaId);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoSegunda::where('trabajos_segunda_id', $this->trabajosSegundaId)
            ->orderBy('updated_at', 'desc')
            ->paginate(25);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoSegunda::where('trabajos_segunda_id', $this->trabajosSegundaId)
            ->orderBy('updated_at', 'desc')
            ->paginate(25);

        return view('livewire.comunicaciones.segunda.historial-trabajo-segunda', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
