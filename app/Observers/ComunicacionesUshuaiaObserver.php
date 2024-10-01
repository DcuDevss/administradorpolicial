<?php

namespace App\Observers;

use App\Models\Comunicacionesushuaia;
use App\Models\HistorialTrabajoUshuaia;

class ComunicacionesUshuaiaObserver
{
    public function created(ComunicacionesUshuaia $historialTrabajoUshuaia):void
    {
        //
    }


    public function updated(Comunicacionesushuaia $comunicacionesushuaia): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionesushuaia->detalle_inventario) {
            HistorialTrabajoUshuaia::create([
                'trabajos_ushuaia_id' => $comunicacionesushuaia->id,
                'detalle_inventario' => $comunicacionesushuaia->detalle_inventario,
            ]);
        }
    }


public function deleted(Comunicacionesushuaia $comunicacionesushuaia):void
{
   //
}

public function forceDeleted(ComunicacionesUshuaia $comunicacionesushuaia):void
{
   //
}

}
