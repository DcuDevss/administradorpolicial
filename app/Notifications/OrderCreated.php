<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCreated extends Notification
{
    use Queueable;
    protected $order;

    /**
     * Create a new notification instance.
     */
    public function __construct($order)
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
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('Se ha creado una nueva orden de trabajo para usted.')
                    ->action('Ver Orden de Trabajo', url('/orders/' . $this->order->id))
                    ->line('Gracias por usar nuestra aplicación.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            /* Puedes incluir más información aquí para notificaciones de otros canales, como base de datos o notificaciones en tiempo real. */
            'message' => 'Se ha creado una nueva orden de trabajo para usted.',
            'order_id' => $this->order->id,
            'link' => url('/orders/' . $this->order->id),
        ];
    }
}
