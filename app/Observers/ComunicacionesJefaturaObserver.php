<?php

namespace App\Observers;

use App\Models\Comunicacionesinvestigacion;
use App\Models\Comunicacionesjefatura;
use App\Models\HistorialTrabajoJefatura;

class ComunicacionesJefaturaObserver
{
    public function created(Comunicacionesjefatura $historialTrabajoJefatura):void
    {
        //
    }


    public function updated(Comunicacionesjefatura $comunicacionesjefatura): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionesjefatura->detalle_inventario) {
            HistorialTrabajoJefatura::create([
                'trabajos_jefatura_id' => $comunicacionesjefatura->id,
                'detalle_inventario' => $comunicacionesjefatura->detalle_inventario,
            ]);
        }
    }


public function deleted(Comunicacionesjefatura $comunicacionesjefatura):void
{
   //
}

public function forceDeleted(Comunicacionesjefatura $comunicacionesjefatura):void
{
   //
}

}
