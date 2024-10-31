<?php

namespace App\Http\Livewire\Comunicaciones\Dto365;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoDto365;

class HistorialComunicacionesDto365 extends Component
{
    use WithPagination;

    public $trabajosDto365Id;

    public function mount($trabajosDto365Id)
    {
        $this->trabajosDto365Id = $trabajosDto365Id;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Dto365 ID en mount: ' . $this->trabajosDto365Id);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoDto365::where('trabajos_dto365_id', $this->trabajosDto365Id)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoDto365::where('trabajos_dto365_id', $this->trabajosDto365Id)
        ->orderBy('updated_at', 'desc')
        ->paginate(15);

        return view('livewire.Comunicaciones.dto365.historial-trabajo-Dto365', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
