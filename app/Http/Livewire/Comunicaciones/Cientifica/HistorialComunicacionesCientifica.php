<?php

namespace App\Http\Livewire\Comunicaciones\Cientifica;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoCientifica;

class HistorialComunicacionesCientifica extends Component
{
    use WithPagination;

    public $trabajosCientificaId;

    public function mount($trabajosCientificaId)
    {
        $this->trabajosCientificaId = $trabajosCientificaId;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Cientifica ID en mount: ' . $this->trabajosCientificaId);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoCientifica::where('trabajos_cientifica_id', $this->trabajosCientificaId)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoCientifica::where('trabajos_cientifica_id', $this->trabajosCientificaId)
        ->orderBy('updated_at', 'desc')
        ->paginate(15);

        return view('livewire.comunicaciones.cientifica.historial-trabajo-cientifica', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
