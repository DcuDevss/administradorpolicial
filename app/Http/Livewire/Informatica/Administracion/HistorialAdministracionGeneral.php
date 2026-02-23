<?php

namespace App\Http\Livewire\Informatica\Administracion;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AuditoriaInventarioAdministracion;

class HistorialAdministracionGeneral extends Component
{
    use WithPagination;

    public $administracionGeneraleId;

    public function mount($administracionGeneraleId)
    {
        $this->administracionGeneraleId = $administracionGeneraleId;

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Informatica ID en mount: ' . $this->administracionGeneraleId);
    }

    // Método correcto para obtener el historial de inventario
    public function getHistorialInventarioProperty()
    {
        return AuditoriaInventarioadministracion::where('administraciongenerale_id', $this->administracionGeneraleId)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }

    public function render()
    {
        // Utiliza la propiedad computada directamente en la vista
        return view('livewire.informatica.administracion.historial-administracion-general', [
            'modificaciones' => $this->historialInventario
        ]);
    }
}
