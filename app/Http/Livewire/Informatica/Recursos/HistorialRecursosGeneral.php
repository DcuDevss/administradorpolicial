<?php

namespace App\Http\Livewire\Informatica\Recursos;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AuditoriaInventarioRecursos;

class HistorialRecursosGeneral extends Component
{
    use WithPagination;

    public $recursosGeneraleId;

    public function mount($recursosGeneraleId)
    {
        $this->recursosGeneraleId = $recursosGeneraleId;

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Informatica ID en mount: ' . $this->recursosGeneraleId);
    }

    // Método correcto para obtener el historial de inventario
    public function getHistorialInventarioProperty()
    {
        return AuditoriaInventarioRecursos::where('recursoshumanosgenerale_id', $this->recursosGeneraleId)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }

    public function render()
    {
        // Utiliza la propiedad computada directamente en la vista
        return view('livewire.informatica.recursos.historial-recursos-general', [
            'modificaciones' => $this->historialInventario
        ]);
    }
}
