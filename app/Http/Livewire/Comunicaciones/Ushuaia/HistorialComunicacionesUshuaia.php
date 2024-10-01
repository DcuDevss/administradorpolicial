<?php

namespace App\Http\Livewire\Comunicaciones\Ushuaia;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoUshuaia;

class HistorialComunicacionesUshuaia extends Component
{
    use WithPagination;

    public $trabajosUshuaiaId;

    public function mount($trabajosUshuaiaId)
    {
        $this->trabajosUshuaiaId = $trabajosUshuaiaId;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Ushuaia ID en mount: ' . $this->trabajosUshuaiaId);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoUshuaia::where('trabajos_ushuaia_id', $this->trabajosUshuaiaId)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoUshuaia::where('trabajos_ushuaia_id', $this->trabajosUshuaiaId)
        ->orderBy('updated_at', 'desc')
        ->paginate(15);

        return view('livewire.comunicaciones.ushuaia.historial-trabajo-ushuaia', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
