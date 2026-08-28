<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\SolicitudReparacion;

class NuevaSolicitudReparacion extends Notification
{
    use Queueable;

    public function __construct(
        public SolicitudReparacion $solicitud
    ) {}

    /**
     * Canales mediante los cuales se envía la notificación.
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Datos que se almacenarán en la tabla notifications.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'tipo' => 'solicitud_reparacion',
            'titulo' => 'Nueva solicitud de reparación',
            'solicitud_id' => $this->solicitud->id,
            'activo_id' => $this->solicitud->activo_id,
            'prioridad' => $this->solicitud->prioridad,
            'mensaje' => $this->solicitud->titulo,
            'descripcion' => $this->solicitud->descripcion,
            'usuario_id' => $this->solicitud->usuario_id,
        ];
    }
}
