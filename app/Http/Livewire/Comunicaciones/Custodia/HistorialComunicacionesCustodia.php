<?php

namespace App\Http\Livewire\Comunicaciones\Custodia;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoCustodia;

class HistorialComunicacionesCustodia extends Component
{
    use WithPagination;

    public $trabajosCustodiaId;

    public function mount($trabajosCustodiaId)
    {
        $this->trabajosCustodiaId = $trabajosCustodiaId;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Custodia ID en mount: ' . $this->trabajosCustodiaId);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoCustodia::where('trabajos_custodia_id', $this->trabajosCustodiaId)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoCustodia::where('trabajos_custodia_id', $this->trabajosCustodiaId)
        ->orderBy('updated_at', 'desc')
        ->paginate(15);

        return view('livewire.Comunicaciones.custodia.historial-trabajo-Custodia', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
