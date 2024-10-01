<?php

namespace App\Observers;

use App\Models\Comunicacionesrg;
use App\Models\HistorialTrabajoRiogrande;

class ComunicacionesrgObserver
{
    /**
     * Handle the Comunicacionesrg "created" event.
     */
    public function created(Comunicacionesrg $comunicacionesrg): void
    {
        //
    }

    /**
     * Handle the Comunicacionesrg "updated" event.
     */
    public function updated(Comunicacionesrg $comunicacionesrg): void
    {
        if ($comunicacionesrg->detalle_inventario) {
            HistorialTrabajoRiogrande::create([
                'trabajos_riogrande_id' => $comunicacionesrg->id,
                'detalle_inventario' => $comunicacionesrg->detalle_inventario,
            ]);
        }

     }

    /**
     * Handle the Comunicacionesrg "deleted" event.
     */
    public function deleted(Comunicacionesrg $comunicacionesrg): void
    {
        //
    }

    /**
     * Handle the Comunicacionesrg "restored" event.
     */
    public function restored(Comunicacionesrg $comunicacionesrg): void
    {
        //
    }

    /**
     * Handle the Comunicacionesrg "force deleted" event.
     */
    public function forceDeleted(Comunicacionesrg $comunicacionesrg): void
    {
        //
    }
}
