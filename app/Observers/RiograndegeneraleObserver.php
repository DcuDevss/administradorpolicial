<?php

namespace App\Observers;

use App\Models\Riograndegenerale;
use App\Models\AuditoriaInventarioRiogrande;

class RiograndegeneraleObserver
{
    /**
     * Handle the Riograndegenerale "created" event.
     */
    public function created(Riograndegenerale $riograndegenerale): void
    {
        // Si quieres que al CREAR también se guarde en la auditoría
        if ($riograndegenerale->detalles_inventario) {
            $this->saveAuditoria($riograndegenerale);
        }
    }

    /**
     * Handle the Riograndegenerale "updated" event.
     */
    public function updated(Riograndegenerale $riograndegenerale): void
    {
        // Se ejecuta al ACTUALIZAR
        if ($riograndegenerale->detalles_inventario) {
            $this->saveAuditoria($riograndegenerale);
        }
    }

    /**
     * Método auxiliar para evitar repetir código
     */
    private function saveAuditoria(Riograndegenerale $riograndegenerale): void
    {
        AuditoriaInventarioRiogrande::create([
            'riograndegenerale_id' => $riograndegenerale->id,
            'detalles_inventario'  => $riograndegenerale->detalles_inventario,
        ]);
    }

    /**
     * IMPORTANTE: En todos los métodos de abajo, el argumento debe ser Riograndegenerale
     */
    public function deleted(Riograndegenerale $riograndegenerale): void
    {
        //
    }

    public function restored(Riograndegenerale $riograndegenerale): void
    {
        //
    }

    public function forceDeleted(Riograndegenerale $riograndegenerale): void
    {
        //
    }
}
