<?php

namespace App\Observers;
use App\Models\HistorialTrabajoCuarta;
use App\Models\Comunicacionescuarta;

class ComunicacionesCuartaObserver
{
    public function updated(Comunicacionescuarta $comunicacionescuarta): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionescuarta->detalle_inventario) {
            HistorialTrabajoCuarta::create([
                'trabajos_cuarta_id' => $comunicacionescuarta->id,
                'detalle_inventario' => $comunicacionescuarta->detalle_inventario,
            ]);
        }
    }

}
