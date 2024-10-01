<?php

namespace App\Observers;

use App\Models\AuditoriaDetalleInventario;
use App\Models\Generalinformatica;

class GeneralinformaticaObserver
{
    /**
     * Handle the Generalinformatica "created" event.
     */
    public function created(Generalinformatica $generalinformatica): void
    {
        //
    }

    /**
     * Handle the Generalinformatica "updated" event.
     */
    public function updated(Generalinformatica $generalinformatica): void
    {
        if ($generalinformatica->detalles_inventario) {
            AuditoriaDetalleInventario::create([
                'generalinformatica_id' => $generalinformatica->id,
                'detalles_inventario' => $generalinformatica->detalles_inventario,
            ]);
        }
    }

    /**
     * Handle the Generalinformatica "deleted" event.
     */
    public function deleted(Generalinformatica $generalinformatica): void
    {
        //
    }

    /**
     * Handle the Generalinformatica "restored" event.
     */
    public function restored(Generalinformatica $generalinformatica): void
    {
        //
    }

    /**
     * Handle the Generalinformatica "force deleted" event.
     */
    public function forceDeleted(Generalinformatica $generalinformatica): void
    {
        //
    }
}
