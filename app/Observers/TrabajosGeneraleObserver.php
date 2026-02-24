<?php

namespace App\Observers;

use App\Models\TrabajosGenerale;
use App\Models\HistorialDetalleTrabajo;
class TrabajosGeneraleObserver
{


    /**
     * Handle the TrabajosGenerale "created" event.
     */
    public function created(TrabajosGenerale $trabajosGenerale): void
    {
        //
    }

    /**
     * Handle the TrabajosGenerale "updated" event.
     */
    public function updated(TrabajosGenerale $trabajosGenerale): void
    {
        if ($trabajosGenerale->wasChanged('detalle_trabajo')) {

            HistorialDetalleTrabajo::create([
                'trabajos_generale_id' => $trabajosGenerale->id,
                'detalle_trabajo' => $trabajosGenerale->detalle_trabajo,
            ]);
        }
    }

    /**
     * Handle the TrabajosGenerale "deleted" event.
     */
    public function deleted(TrabajosGenerale $trabajosGenerale): void
    {
        //
    }

    /**
     * Handle the TrabajosGenerale "restored" event.
     */
    public function restored(TrabajosGenerale $trabajosGenerale): void
    {
        //
    }

    /**
     * Handle the TrabajosGenerale "force deleted" event.
     */
    public function forceDeleted(TrabajosGenerale $trabajosGenerale): void
    {
        //
    }
}
