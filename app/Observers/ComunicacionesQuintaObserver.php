<?php

namespace App\Observers;

use App\Models\Comunicacionesinvestigacion;
use App\Models\Comunicacionesquinta;
use App\Models\HistorialTrabajoQuinta;

class ComunicacionesQuintaObserver
{
    public function created(Comunicacionesquinta $historialTrabajoQuinta):void
    {
        //
    }


    public function updated(Comunicacionesquinta $comunicacionesquinta): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionesquinta->detalle_inventario) {
            HistorialTrabajoQuinta::create([
                'trabajos_quinta_id' => $comunicacionesquinta->id,
                'detalle_inventario' => $comunicacionesquinta->detalle_inventario,
            ]);
        }
    }


public function deleted(Comunicacionesquinta $comunicacionesquinta):void
{
   //
}

public function forceDeleted(Comunicacionesquinta $comunicacionesquinta):void
{
   //
}

}
