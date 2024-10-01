<?php

namespace App\Observers;

use App\Models\Riograndegenerale;
use App\Models\AuditoriaInventarioRiogrande;

class RiograndegeneraleObserver
{
    /**
     * Handle the AuditoriaInventarioRiogrande "created" event.
     */
    public function created(AuditoriaInventarioRiogrande $auditoriaInventarioRiogrande): void
    {
        //
    }

    /**
     * Handle the AuditoriaInventarioRiogrande "updated" event.
     */
    public function updated(Riograndegenerale $riograndegenerale): void
    {
        if ($riograndegenerale->detalles_inventario) {
            AuditoriaInventarioRiogrande::create([
                'riograndegenerale_id' => $riograndegenerale->id,
                'detalles_inventario' => $riograndegenerale->detalles_inventario,
            ]);
        }
    }

    /**
     * Handle the AuditoriaInventarioRiogrande "deleted" event.
     */
    public function deleted(AuditoriaInventarioRiogrande $auditoriaInventarioRiogrande): void
    {
        //
    }

    /**
     * Handle the AuditoriaInventarioRiogrande "restored" event.
     */
    public function restored(AuditoriaInventarioRiogrande $auditoriaInventarioRiogrande): void
    {
        //
    }

    /**
     * Handle the AuditoriaInventarioRiogrande "force deleted" event.
     */
    public function forceDeleted(AuditoriaInventarioRiogrande $auditoriaInventarioRiogrande): void
    {
        //
    }
}
