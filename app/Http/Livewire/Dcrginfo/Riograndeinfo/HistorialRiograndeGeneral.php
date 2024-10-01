<?php

namespace App\Http\Livewire\Dcrginfo\Riograndeinfo;

use Livewire\Component;
use App\Models\AuditoriaInventarioInventario;
use Livewire\WithPagination;
use App\Models\AuditoriaInventarioRiogrande;

class HistorialRiograndeGeneral extends Component
{
    use WithPagination;

    public $riograndeGeneraleId;

    public function mount($riograndeGeneraleId)
    {
        $this->riograndeGeneraleId = $riograndeGeneraleId;

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Informatica ID en mount: ' . $this->riograndeGeneraleId);
    }

    // Método correcto para obtener el historial de inventario
    public function getHistorialInventarioProperty()
    {
        return AuditoriaInventarioRiogrande::where('riograndegenerale_id', $this->riograndeGeneraleId)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }

    public function render()
    {
        // Utiliza la propiedad computada directamente en la vista
        return view('livewire.dcrginfo.riograndeinfo.historial-riogrande-general', [
            'modificaciones' => $this->historialInventario
        ]);
    }
}
