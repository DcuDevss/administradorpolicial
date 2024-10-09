<?php

namespace App\Observers;

use App\Models\Comunicacionesinvestigacion;
use App\Models\Comunicacionesprimera;
use App\Models\HistorialTrabajoPrimera;

class ComunicacionesprimeraObserver
{
    public function created(Comunicacionesprimera $historialTrabajoPrimera):void
    {
        //
    }


    public function updated(Comunicacionesprimera $comunicacionesprimera): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionesprimera->detalle_inventario) {
            HistorialTrabajoPrimera::create([
                'trabajos_primera_id' => $comunicacionesprimera->id,
                'detalle_inventario' => $comunicacionesprimera->detalle_inventario,
            ]);
        }
    }


public function deleted(Comunicacionesprimera $comunicacionesprimera):void
{
   //
}

public function forceDeleted(Comunicacionesprimera $comunicacionesprimera):void
{
   //
}

}
