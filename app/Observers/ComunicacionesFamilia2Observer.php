<?php

namespace App\Observers;

use App\Models\Comunicacionesfamilia2;
use App\Models\HistorialTrabajoFamilia2;

class ComunicacionesFamilia2Observer
{
    public function created(ComunicacionesFamilia2 $historialTrabajoFamilia2):void
    {
        //
    }


    public function updated(Comunicacionesfamilia2 $comunicacionesfamilia2): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionesfamilia2->detalle_inventario) {
            HistorialTrabajoFamilia2::create([
                'trabajos_familia2_id' => $comunicacionesfamilia2->id,
                'detalle_inventario' => $comunicacionesfamilia2->detalle_inventario,
            ]);
        }
    }


public function deleted(Comunicacionesfamilia2 $comunicacionesfamilia2):void
{
   //
}

public function forceDeleted(ComunicacionesFamilia2 $comunicacionesfamilia2):void
{
   //
}

}
