<?php

namespace App\Notifications;

use App\Models\TurnoReparacion;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TurnoReparacionAsignado extends Notification
{
    use Queueable;

    public function __construct(
        public TurnoReparacion $turno
    ) {}

    /**
     * Canales mediante los cuales se envía la notificación.
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Datos almacenados en la tabla notifications.
     */
    public function toArray(object $notifiable): array
    {
        $solicitud = $this->turno->solicitud;

        return [
            'tipo' => 'turno_reparacion_asignado',
            'titulo' => 'Turno de reparación asignado',

            'turno_id' => $this->turno->id,
            'solicitud_id' => $solicitud->id,
            'activo_id' => $solicitud->activo_id,

            'fecha' => $this->turno->fecha?->format('d/m/Y'),
            'hora' => $this->turno->hora,

            'mensaje' => 'Se asignó un turno para la reparación del equipo.',
            'observaciones' => $this->turno->observaciones,
        ];
    }
}
