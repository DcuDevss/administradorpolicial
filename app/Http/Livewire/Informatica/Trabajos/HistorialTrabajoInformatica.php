<?php

namespace App\Http\Livewire\Informatica\Trabajos;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialDetalleInformatica;

class HistorialTrabajoInformatica extends Component
{
    use WithPagination;

    public $trabajosInformaticaId;

    public function mount($trabajosInformaticaId)
    {
        $this->trabajosInformaticaId = $trabajosInformaticaId;

        // Depuración: Verifica que el ID esté configurado correctamente.
        logger()->info('Trabajos Informatica ID en mount: ' . $this->trabajosInformaticaId);
    }

    public function getHistorialInformaticasProperty()
    {
        // Recupera el historial de trabajos con base en el ID
        return HistorialDetalleInformatica::where('trabajos_informatica_id', $this->trabajosInformaticaId)
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }

    public function render()
    {
        $historialInformaticas = HistorialDetalleInformatica::where('trabajos_informatica_id', $this->trabajosInformaticaId)
        ->orderBy('updated_at', 'desc')
        ->paginate(15);
        
        $historialInformaticas = $this->historialInformaticas;

        return view('livewire.informatica.trabajos.historial-trabajo-informatica', [
            'historialInformaticas' => $historialInformaticas,
        ]);
    }
}
