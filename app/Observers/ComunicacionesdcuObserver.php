<?php

namespace App\Observers;

use App\Models\Comunicacionesdcu;
use App\Models\HistorialTrabajoDcu;

class ComunicacionesdcuObserver
{
    public function created(Comunicacionesdcu $historialTrabajoDcu):void
    {
        //
    }


    public function updated(Comunicacionesdcu $comunicacionesdcu): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionesdcu->detalle_inventario) {
            HistorialTrabajoDcu::create([
                'trabajos_dcu_id' => $comunicacionesdcu->id,
                'detalle_inventario' => $comunicacionesdcu->detalle_inventario,
            ]);
        }
    }


public function deleted(Comunicacionesdcu $comunicacionesdcu):void
{
   //
}

public function forceDeleted(ComunicacionesDcu $comunicacionesdcu):void
{
   //
}

}
