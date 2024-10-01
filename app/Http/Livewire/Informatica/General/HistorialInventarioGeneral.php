<?php

namespace App\Http\Livewire\Informatica\General;

use Livewire\Component;
use App\Models\AuditoriaDetalleInventario;
use Livewire\WithPagination;

class HistorialInventarioGeneral extends Component
{
    use WithPagination;

    public $generalInformaticaId;

    public function mount($generalInformaticaId)
    {
        $this->generalInformaticaId = $generalInformaticaId;

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Informatica ID en mount: ' . $this->generalInformaticaId);
    }

    // Método correcto para obtener el historial de inventario
    public function getHistorialInventarioProperty()
    {
        return AuditoriaDetalleInventario::where('generalinformatica_id', $this->generalInformaticaId)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }

    public function render()
    {
        // Utiliza la propiedad computada directamente en la vista
        return view('livewire.informatica.general.historial-inventario-general', [
            'modificaciones' => $this->historialInventario
        ]);
    }
}
