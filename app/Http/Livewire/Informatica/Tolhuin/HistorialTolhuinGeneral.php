<?php

namespace App\Http\Livewire\Informatica\Tolhuin;

use Livewire\Component;
use App\Models\AuditoriaInventarioInventario;
use Livewire\WithPagination;
use App\Models\AuditoriaInventarioTolhuin;
use App\Models\HistorialTrabajoTolhuin;

class HistorialtolhuinGeneral extends Component
{
    use WithPagination;

    public $tolhuinGeneraleId;

    public function mount($tolhuinGeneraleId)
    {
        $this->tolhuinGeneraleId = $tolhuinGeneraleId;

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Informatica ID en mount: ' . $this->tolhuinGeneraleId);
    }

    // Método correcto para obtener el historial de inventario
    public function getHistorialInventarioProperty()
    {
        return AuditoriaInventarioTolhuin::where('tolhuingenerale_id', $this->tolhuinGeneraleId)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }

    public function render()
    {
        // Utiliza la propiedad computada directamente en la vista
        return view('livewire.informatica.tolhuin.historial-tolhuin-general', [
            'modificaciones' => $this->historialInventario
        ]);
    }
}
