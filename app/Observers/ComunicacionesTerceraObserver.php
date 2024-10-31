<?php

namespace App\Observers;

use App\Models\Comunicacionesinvestigacion;
use App\Models\Comunicacionestercera;
use App\Models\HistorialTrabajoTercera;

class ComunicacionesterceraObserver
{
    public function created(Comunicacionestercera $historialTrabajoTercera):void
    {
        //
    }


    public function updated(Comunicacionestercera $comunicacionestercera): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionestercera->detalle_inventario) {
            HistorialTrabajoTercera::create([
                'trabajos_tercera_id' => $comunicacionestercera->id,
                'detalle_inventario' => $comunicacionestercera->detalle_inventario,
            ]);
        }
    }


public function deleted(Comunicacionestercera $comunicacionestercera):void
{
   //
}

public function forceDeleted(Comunicacionestercera $comunicacionestercera):void
{
   //
}

}
