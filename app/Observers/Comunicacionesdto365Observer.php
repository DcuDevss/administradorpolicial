<?php

namespace App\Observers;

use App\Models\Comunicacionesdto365;
use App\Models\HistorialTrabajoDto365;

class Comunicacionesdto365Observer
{
    public function created(ComunicacionesDto365 $historialTrabajoDto365):void
    {
        //
    }


    public function updated(Comunicacionesdto365 $comunicacionesdto365): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionesdto365->detalle_inventario) {
            HistorialTrabajoDto365::create([
                'trabajos_dto365_id' => $comunicacionesdto365->id,
                'detalle_inventario' => $comunicacionesdto365->detalle_inventario,
            ]);
        }
    }


public function deleted(Comunicacionesdto365 $comunicacionesdto365):void
{
   //
}

public function forceDeleted(ComunicacionesDto365 $comunicacionesdto365):void
{
   //
}

}
