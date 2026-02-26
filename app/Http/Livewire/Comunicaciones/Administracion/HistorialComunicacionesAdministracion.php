<?php

namespace App\Http\Livewire\Comunicaciones\Administracion;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialTrabajoAdministracion;

class HistorialComunicacionesAdministracion extends Component
{
    use WithPagination;

    public $trabajosAdministracionId;

    public function mount($trabajosAdministracionId)
    {
        $this->trabajosAdministracionId = $trabajosAdministracionId;
        // Esto detendrá la ejecución y mostrará los datos

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos D.C.U ID en mount: ' . $this->trabajosAdministracionId);
    }

    public function getHistorialTrabajosProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialTrabajoAdministracion::where('trabajos_adminin_id', $this->trabajosAdministracionId)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }



    public function render()
    {
        $historialTrabajos = HistorialTrabajoAdministracion::where('trabajos_admin_id', $this->trabajosAdministracionId)
        ->orderBy('updated_at', 'desc')
        ->paginate(15);

        return view('livewire.comunicaciones.administracion.historial-trabajo-administracion', [
            'historialTrabajos' => $historialTrabajos, // Usando el método de propiedad
        ]);
    }
}
