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
        // Si necesitas guardar el detalle inicial al crear, hazlo aquí
        if ($generalinformatica->detalles_inventario) {
            AuditoriaDetalleInventario::create([
                'generalinformatica_id' => $generalinformatica->id,
                'detalles_inventario' => $generalinformatica->detalles_inventario,
            ]);
        }
    }

    /**
     * Handle the Generalinformatica "updated" event.
     */
    public function updated(Generalinformatica $generalinformatica): void
    {
        // Solo registrar si el campo detalles_inventario realmente cambió
        // y no es un modelo recién creado para evitar duplicados.
        if ($generalinformatica->wasChanged('detalles_inventario') && $generalinformatica->detalles_inventario) {
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
