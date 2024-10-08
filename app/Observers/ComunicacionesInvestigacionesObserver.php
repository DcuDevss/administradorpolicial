<?php

namespace App\Observers;

use App\Models\Comunicacionesinvestigacion;
use App\Models\HistorialTrabajoInvestigaciones;

class ComunicacionesinvestigacionesObserver
{
    public function created(ComunicacionesInvestigacion $historialTrabajoInvestigaciones):void
    {
        //
    }


    public function updated(Comunicacionesinvestigacion $comunicacionesinvestigaciones): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionesinvestigaciones->detalle_inventario) {
            HistorialTrabajoInvestigaciones::create([
                'trabajos_investigaciones_id' => $comunicacionesinvestigaciones->id,
                'detalle_inventario' => $comunicacionesinvestigaciones->detalle_inventario,
            ]);
        }
    }


public function deleted(Comunicacionesinvestigacion $comunicacionesinvestigaciones):void
{
   //
}

public function forceDeleted(ComunicacionesInvestigacion $comunicacionesinvestigaciones):void
{
   //
}

}
