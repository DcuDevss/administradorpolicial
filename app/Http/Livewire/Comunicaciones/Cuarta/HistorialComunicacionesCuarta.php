<?php

namespace App\Http\Livewire\Comunicaciones\Cuarta;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoCuarta;

class HistorialComunicacionesCuarta extends Component
{
    use WithPagination;

    public $trabajosCuartaId;

    public function mount($trabajosCuartaId)
    {
        $this->trabajosCuartaId = $trabajosCuartaId;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Cuarta ID en mount: ' . $this->trabajosCuartaId);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoCuarta::where('trabajos_cuarta_id', $this->trabajosCuartaId)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoCuarta::where('trabajos_cuarta_id', $this->trabajosCuartaId)
        ->orderBy('updated_at', 'desc')
        ->paginate(15);

        return view('livewire.Comunicaciones.cuarta.historial-trabajo-Cuarta', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
