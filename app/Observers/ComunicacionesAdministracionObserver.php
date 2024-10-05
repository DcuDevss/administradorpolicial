<?php

namespace App\Observers;
use App\Models\HistorialTrabajoAdministracion;
use App\Models\Comunicacionesadministracion;

class ComunicacionesAdministracionObserver
{
    public function updated(Comunicacionesadministracion $comunicacionesadministracion): void
    {
        // Asegúrate de que el campo correcto de 'detalle_inventario' esté siendo utilizado
        if ($comunicacionesadministracion->detalle_inventario) {
            HistorialTrabajoAdministracion::create([
                'trabajos_admin_id' => $comunicacionesadministracion->id,
                'detalle_inventario' => $comunicacionesadministracion->detalle_inventario,
            ]);
        }
    }

}
