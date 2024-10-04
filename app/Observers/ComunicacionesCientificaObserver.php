<?php

namespace App\Observers;
use App\Models\HistorialTrabajoCientifica;
use App\Models\Comunicacionescientifica;

class ComunicacionesCientificaObserver
{
    public function updated(Comunicacionescientifica $comunicacionescientifica): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionescientifica->detalle_inventario) {
            HistorialTrabajoCientifica::create([
                'trabajos_cientifica_id' => $comunicacionescientifica->id,
                'detalle_inventario' => $comunicacionescientifica->detalle_inventario,
            ]);
        }
    }

}
