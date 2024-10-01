<?php

namespace App\Observers;

use App\Models\AuditoriaInventarioTolhuin;
use App\Models\TolhuinGenerale;

class TolhuinGeneraleObserver
{
    /**
     * Handle the TolhuinGenerale "created" event.
     */
    public function created(TolhuinGenerale $tolhuinGenerale): void
    {
        //
    }

    /**
     * Handle the TolhuinGenerale "updated" event.
     */
    public function updated(Tolhuingenerale $tolhuingenerale): void
    {
        if ($tolhuingenerale->detalles_inventario) {
            AuditoriaInventariotolhuin::create([
                'tolhuingenerale_id' => $tolhuingenerale->id,
                'detalles_inventario' => $tolhuingenerale->detalles_inventario,
            ]);
        }
    }

    /**
     * Handle the TolhuinGenerale "deleted" event.
     */
    public function deleted(TolhuinGenerale $tolhuinGenerale): void
    {
        //
    }

    /**
     * Handle the TolhuinGenerale "restored" event.
     */
    public function restored(TolhuinGenerale $tolhuinGenerale): void
    {
        //
    }

    /**
     * Handle the TolhuinGenerale "force deleted" event.
     */
    public function forceDeleted(TolhuinGenerale $tolhuinGenerale): void
    {
        //
    }
}
