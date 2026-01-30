<?php

namespace App\Http\Livewire\Informatica\Jefatura;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AuditoriaInventarioJefatura;

class HistorialJefaturaGeneral extends Component
{
    use WithPagination;

    public $jefaturaGeneraleId;

    public function mount($jefaturaGeneraleId)
    {
        $this->jefaturaGeneraleId = $jefaturaGeneraleId;

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Informatica ID en mount: ' . $this->jefaturaGeneraleId);
    }

    // Método correcto para obtener el historial de inventario
    public function getHistorialInventarioProperty()
    {
        return AuditoriaInventarioJefatura::where('jefaturagenerale_id', $this->jefaturaGeneraleId)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }

    public function render()
    {
        // Utiliza la propiedad computada directamente en la vista
        return view('livewire.informatica.jefatura.historial-jefatura-general', [
            'modificaciones' => $this->historialInventario
        ]);
    }
}
