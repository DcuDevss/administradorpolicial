<?php

namespace App\Observers;
use App\Models\HistorialTrabajoCustodia;
use App\Models\Comunicacionescustodia;

class ComunicacionesCustodiaObserver
{
    public function updated(Comunicacionescustodia $comunicacionescustodia): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionescustodia->detalle_inventario) {
            HistorialTrabajoCustodia::create([
                'trabajos_custodia_id' => $comunicacionescustodia->id,
                'detalle_inventario' => $comunicacionescustodia->detalle_inventario,
            ]);
        }
    }

}
