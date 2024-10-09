<?php

namespace App\Http\Livewire\Comunicaciones\Recurso;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoRecurso;

class HistorialComunicacionesRecurso extends Component
{
    use WithPagination;

    public $trabajosRecursoId;

    public function mount($trabajosRecursoId)
    {
        $this->trabajosRecursoId = $trabajosRecursoId;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Recurso ID en mount: ' . $this->trabajosRecursoId);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoRecurso::where('trabajos_recurso_id', $this->trabajosRecursoId)
            ->orderBy('updated_at', 'desc')
            ->paginate(25);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoRecurso::where('trabajos_recurso_id', $this->trabajosRecursoId)
            ->orderBy('updated_at', 'desc')
            ->paginate(25);

        return view('livewire.Comunicaciones.recurso.historial-trabajo-recurso', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
