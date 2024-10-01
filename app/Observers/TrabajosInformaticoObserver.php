<?php

namespace App\Observers;

use App\Models\TrabajosInformatico;
use App\Models\HistorialDetalleInformatica;

class TrabajosInformaticoObserver
{
    /**
     * Handle the TrabajosInformatico "created" event.
     */
    public function updated(TrabajosInformatico $trabajosInformatico)
    {
        // Guardar en historial si hay cambios en el trabajo informático
        if ($trabajosInformatico->wasChanged()) {
            HistorialDetalleInformatica::create([
                'trabajos_informatica_id' => $trabajosInformatico->id,
                'detalles_trabajo' => $trabajosInformatico->detalles_trabajo,
            ]);
        }
    }

    /**
     * Handle the TrabajosInformatico "updated" event.
     */
    

    /**
     * Handle the TrabajosInformatico "deleted" event.
     */
    public function deleted(TrabajosInformatico $trabajosInformatico): void
    {
        //
    }

    /**
     * Handle the TrabajosInformatico "restored" event.
     */
    public function restored(TrabajosInformatico $trabajosInformatico): void
    {
        //
    }

    /**
     * Handle the TrabajosInformatico "force deleted" event.
     */
    public function forceDeleted(TrabajosInformatico $trabajosInformatico): void
    {
        //
    }
}
