<?php

namespace App\Observers;

use App\Models\Comunicacionestolhuin;
use App\Models\HistorialTrabajoTolhuin;

class ComunicacionesTolhuinObserver
{
    public function created(ComunicacionesTolhuin $historialTrabajoTolhuin):void
    {
        //
    }


    public function updated(Comunicacionestolhuin $comunicacionestolhuin): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionestolhuin->detalle_inventario) {
            HistorialTrabajoTolhuin::create([
                'trabajos_tolhuin_id' => $comunicacionestolhuin->id,
                'detalle_inventario' => $comunicacionestolhuin->detalle_inventario,
            ]);
        }
    }


public function deleted(Comunicacionestolhuin $comunicacionestolhuin):void
{
   //
}

public function forceDeleted(ComunicacionesTolhuin $comunicacionestolhuin):void
{
   //
}

}
