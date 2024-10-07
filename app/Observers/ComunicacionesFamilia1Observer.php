<?php

namespace App\Observers;

use App\Models\Comunicacionesfamilia1;
use App\Models\HistorialTrabajoFamilia1;

class Comunicacionesfamilia1Observer
{
    public function created(ComunicacionesFamilia1 $historialTrabajoFamilia1):void
    {
        //
    }


    public function updated(Comunicacionesfamilia1 $comunicacionesfamilia1): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionesfamilia1->detalle_inventario) {
            HistorialTrabajoFamilia1::create([
                'trabajos_familia1_id' => $comunicacionesfamilia1->id,
                'detalle_inventario' => $comunicacionesfamilia1->detalle_inventario,
            ]);
        }
    }


public function deleted(Comunicacionesfamilia1 $comunicacionesfamilia1):void
{
   //
}

public function forceDeleted(ComunicacionesFamilia1 $comunicacionesfamilia1):void
{
   //
}

}
