<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Order; // Asegúrate de importar el modelo Order

class OrderCreatedNotification extends Notification
{
    use Queueable;

    protected $order;

    /**
     * Create a new notification instance.
     *
     * @param \App\Models\Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Nueva Orden de Trabajo',
            'body' => 'Se ha creado una nueva orden de trabajo.',
            'order_id' => $this->order->id,
        ];
    }

    /**
     * Get the array representation of the notification for Pusher.
     *
     * @param  object  $notifiable
     * @return array<string, mixed>
     */
    public function toPusher(object $notifiable): array
    {
        return [
            'title' => 'Nueva Orden de Trabajo',
            'body' => 'Se ha creado una nueva orden de trabajo.',
            'order_id' => $this->order->id,
        ];
    }
}
