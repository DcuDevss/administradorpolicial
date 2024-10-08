<?php

namespace App\Http\Livewire\Comunicaciones\Familia2;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoFamilia2;

class HistorialComunicacionesFamilia2 extends Component
{
    use WithPagination;

    public $trabajosFamilia2Id;

    public function mount($trabajosFamilia2Id)
    {
        $this->trabajosFamilia2Id = $trabajosFamilia2Id;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Familia2 ID en mount: ' . $this->trabajosFamilia2Id);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoFamilia2::where('trabajos_familia2_id', $this->trabajosFamilia2Id)
            ->orderBy('updated_at', 'desc')
            ->paginate(25);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoFamilia2::where('trabajos_familia2_id', $this->trabajosFamilia2Id)
        ->orderBy('updated_at', 'desc')
        ->paginate(25);

        return view('livewire.Comunicaciones.familia2.historial-trabajo-Familia2', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
