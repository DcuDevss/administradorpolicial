<?php

namespace App\Http\Livewire\Comunicaciones\Primera;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoPrimera;

class HistorialComunicacionesPrimera extends Component
{
    use WithPagination;

    public $trabajosPrimeraId;

    public function mount($trabajosPrimeraId)
    {
        $this->trabajosPrimeraId = $trabajosPrimeraId;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Primera ID en mount: ' . $this->trabajosPrimeraId);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoPrimera::where('trabajos_primera_id', $this->trabajosPrimeraId)
            ->orderBy('updated_at', 'desc')
            ->paginate(25);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoPrimera::where('trabajos_primera_id', $this->trabajosPrimeraId)
            ->orderBy('updated_at', 'desc')
            ->paginate(25);

        return view('livewire.Comunicaciones.primera.historial-trabajo-primera', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
