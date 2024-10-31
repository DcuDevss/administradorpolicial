<?php

namespace App\Observers;

use App\Models\Comunicacionesinvestigacion;
use App\Models\Comunicacionesnarco;
use App\Models\HistorialTrabajoNarco;

class ComunicacionesnarcoObserver
{
    public function created(Comunicacionesnarco $historialTrabajoNarco):void
    {
        //
    }


    public function updated(Comunicacionesnarco $comunicacionesnarco): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionesnarco->detalle_inventario) {
            HistorialTrabajoNarco::create([
                'trabajos_narco_id' => $comunicacionesnarco->id,
                'detalle_inventario' => $comunicacionesnarco->detalle_inventario,
            ]);
        }
    }


public function deleted(Comunicacionesnarco $comunicacionesnarco):void
{
   //
}

public function forceDeleted(Comunicacionesnarco $comunicacionesnarco):void
{
   //
}

}
