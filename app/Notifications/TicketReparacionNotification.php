<?php

namespace App\Notifications;

use App\Models\TicketReparacion;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TicketReparacionNotification extends Notification
{
    use Queueable;

    public function __construct(public TicketReparacion $ticket)
    {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'ticket_id' => $this->ticket->id,
            'numero_ticket' => $this->ticket->numero_ticket,
            'dependencia' => $this->ticket->dependencia_nombre,
            'equipo' => $this->ticket->equipo,
            'estado' => $this->ticket->estado,
            'title' => 'Nuevo ticket de reparacion',
        ];
    }
}
