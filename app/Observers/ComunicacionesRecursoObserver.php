<?php

namespace App\Observers;

use App\Models\Comunicacionesinvestigacion;
use App\Models\Comunicacionesrecurso;
use App\Models\HistorialTrabajoRecurso;

class ComunicacionesRecursoObserver
{
    public function created(Comunicacionesrecurso $historialTrabajoRecurso):void
    {
        //
    }


    public function updated(Comunicacionesrecurso $comunicacionesrecurso): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionesrecurso->detalle_inventario) {
            HistorialTrabajoRecurso::create([
                'trabajos_recurso_id' => $comunicacionesrecurso->id,
                'detalle_inventario' => $comunicacionesrecurso->detalle_inventario,
            ]);
        }
    }


public function deleted(Comunicacionesrecurso $comunicacionesrecurso):void
{
   //
}

public function forceDeleted(Comunicacionesrecurso $comunicacionesrecurso):void
{
   //
}

}
