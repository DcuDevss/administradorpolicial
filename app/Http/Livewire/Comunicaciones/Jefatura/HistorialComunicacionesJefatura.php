<?php

namespace App\Http\Livewire\Comunicaciones\Jefatura;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoJefatura;

class HistorialComunicacionesJefatura extends Component
{
    use WithPagination;

    public $trabajosJefaturaId;

    public function mount($trabajosJefaturaId)
    {
        $this->trabajosJefaturaId = $trabajosJefaturaId;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Jefatura ID en mount: ' . $this->trabajosJefaturaId);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoJefatura::where('trabajos_jefatura_id', $this->trabajosJefaturaId)
            ->orderBy('updated_at', 'desc')
            ->paginate(25);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoJefatura::where('trabajos_jefatura_id', $this->trabajosJefaturaId)
            ->orderBy('updated_at', 'desc')
            ->paginate(25);

        return view('livewire.comunicaciones.jefatura.historial-trabajo-jefatura', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
