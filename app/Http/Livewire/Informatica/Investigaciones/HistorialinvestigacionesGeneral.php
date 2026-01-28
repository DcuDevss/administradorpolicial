<?php

namespace App\Http\Livewire\Informatica\Investigaciones;

use Livewire\Component;
use App\Models\AuditoriaInventarioInventario;
use Livewire\WithPagination;
use App\Models\AuditoriaInventarioInvestigaciones;
use App\Models\HistorialTrabajoinvestigaciones;

class HistorialinvestigacionesGeneral extends Component
{
    use WithPagination;

    public $investigacioneGeneraleId;

    public function mount($investigacioneGeneraleId)
    {
        $this->investigacioneGeneraleId = $investigacioneGeneraleId;

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Informatica ID en mount: ' . $this->investigacioneGeneraleId);
    }

    // Método correcto para obtener el historial de inventario
    public function getHistorialInventarioProperty()
    {
        return AuditoriaInventarioinvestigaciones::where('investigacionegenerale_id', $this->investigacioneGeneraleId)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }

    public function render()
    {
        // Utiliza la propiedad computada directamente en la vista
        return view('livewire.informatica.investigaciones.historial-investigaciones-general', [
            'modificaciones' => $this->historialInventario
        ]);
    }
}
