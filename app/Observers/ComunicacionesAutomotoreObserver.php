<?php

namespace App\Observers;
use App\Models\HistorialTrabajoAutomotore;
use App\Models\Comunicacionesautomotore;

class ComunicacionesAutomotoreObserver
{
    public function updated(Comunicacionesautomotore $comunicacionesautomotore): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionesautomotore->detalle_inventario) {
            HistorialTrabajoAutomotore::create([
                'trabajos_auto_id' => $comunicacionesautomotore->id,
                'detalle_inventario' => $comunicacionesautomotore->detalle_inventario,
            ]);
        }
    }

}
