<?php

namespace App\Observers;

use App\Models\Comunicacionesinvestigacion;
use App\Models\Comunicacionessegunda;
use App\Models\HistorialTrabajoSegunda;

class ComunicacionesSegundaObserver
{
    public function created(Comunicacionessegunda $historialTrabajoSegunda):void
    {
        //
    }


    public function updated(Comunicacionessegunda $comunicacionessegunda): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionessegunda->detalle_inventario) {
            HistorialTrabajoSegunda::create([
                'trabajos_segunda_id' => $comunicacionessegunda->id,
                'detalle_inventario' => $comunicacionessegunda->detalle_inventario,
            ]);
        }
    }


public function deleted(Comunicacionessegunda $comunicacionessegunda):void
{
   //
}

public function forceDeleted(Comunicacionessegunda $comunicacionessegunda):void
{
   //
}

}
