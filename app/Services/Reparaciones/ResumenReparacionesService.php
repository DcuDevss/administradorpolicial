<?php

namespace App\Services\Reparaciones;

use App\Models\SolicitudReparacion;

class ResumenReparacionesService
{
    public function obtener(): array
    {
        return [
            'recepcionadas' => SolicitudReparacion::where(
                'estado',
                'recepcionada'
            )->count(),

            'diagnostico' => SolicitudReparacion::where(
                'estado',
                'en_diagnostico'
            )->count(),

            'reparacion' => SolicitudReparacion::where(
                'estado',
                'en_reparacion'
            )->count(),

            'esperandoRepuesto' => SolicitudReparacion::where(
                'estado',
                'esperando_repuesto'
            )->count(),

            'listasRetirar' => SolicitudReparacion::where(
                'estado',
                'lista_para_retirar'
            )->count(),
        ];
    }
}
