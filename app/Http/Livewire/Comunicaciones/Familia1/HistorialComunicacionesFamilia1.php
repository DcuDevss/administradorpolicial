<?php

namespace App\Http\Livewire\Comunicaciones\Familia1;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoFamilia1;

class HistorialComunicacionesFamilia1 extends Component
{
    use WithPagination;

    public $trabajosFamilia1Id;

    public function mount($trabajosFamilia1Id)
    {
        $this->trabajosFamilia1Id = $trabajosFamilia1Id;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Familia1 ID en mount: ' . $this->trabajosFamilia1Id);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoFamilia1::where('trabajos_familia1_id', $this->trabajosFamilia1Id)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoFamilia1::where('trabajos_familia1_id', $this->trabajosFamilia1Id)
        ->orderBy('updated_at', 'desc')
        ->paginate(15);

        return view('livewire.Comunicaciones.familia1.historial-trabajo-Familia1', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
