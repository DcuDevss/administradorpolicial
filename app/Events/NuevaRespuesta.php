<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\RespuestaNotificacion;

class NuevaRespuesta
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $notificacionId;
    /**
     * Create a new event instance.
     */
    public function __construct(int $notificacionId)
    {
        $this->notificacionId = $notificacionId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }

    public function getMensaje()
    {
        // Obtener el mensaje de la respuesta
        return RespuestaNotificacion::find($this->notificacionId)->mensaje;
    }
}
