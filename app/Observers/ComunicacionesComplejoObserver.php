<?php

namespace App\Observers;
use App\Models\HistorialTrabajoComplejo;
use App\Models\Comunicacionescomplejo;

class ComunicacionesComplejoObserver
{
    public function updated(Comunicacionescomplejo $comunicacionescomplejo): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionescomplejo->detalle_inventario) {
            HistorialTrabajoComplejo::create([
                'trabajos_complejo_id' => $comunicacionescomplejo->id,
                'detalle_inventario' => $comunicacionescomplejo->detalle_inventario,
            ]);
        }
    }

}
