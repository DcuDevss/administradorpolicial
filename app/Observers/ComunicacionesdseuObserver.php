<?php

namespace App\Observers;

use App\Models\Comunicacionesdseu;
use App\Models\HistorialTrabajoDseu;

class ComunicacionesdseuObserver
{
    public function created(ComunicacionesDseu $historialTrabajoDseu):void
    {
        //
    }


    public function updated(Comunicacionesdseu $comunicacionesdseu): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionesdseu->detalle_inventario) {
            HistorialTrabajoDseu::create([
                'trabajos_dseu_id' => $comunicacionesdseu->id,
                'detalle_inventario' => $comunicacionesdseu->detalle_inventario,
            ]);
        }
    }


public function deleted(Comunicacionesdseu $comunicacionesdseu):void
{
   //
}

public function forceDeleted(ComunicacionesDseu $comunicacionesdseu):void
{
   //
}

}
