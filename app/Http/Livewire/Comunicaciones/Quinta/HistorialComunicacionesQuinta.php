<?php

namespace App\Http\Livewire\Comunicaciones\Quinta;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoQuinta;

class HistorialComunicacionesQuinta extends Component
{
    use WithPagination;

    public $trabajosQuintaId;

    public function mount($trabajosQuintaId)
    {
        $this->trabajosQuintaId = $trabajosQuintaId;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Quinta ID en mount: ' . $this->trabajosQuintaId);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoQuinta::where('trabajos_quinta_id', $this->trabajosQuintaId)
            ->orderBy('updated_at', 'desc')
            ->paginate(25);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoQuinta::where('trabajos_quinta_id', $this->trabajosQuintaId)
            ->orderBy('updated_at', 'desc')
            ->paginate(25);

        return view('livewire.comunicaciones.quinta.historial-trabajo-quinta', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
