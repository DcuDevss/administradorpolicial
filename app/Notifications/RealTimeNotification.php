<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Broadcast;

class RealTimeNotification extends Notification implements ShouldBroadcast
{
    use Queueable;
    public string $message;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $message)
    {
        $this->message=$message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['broadcast'];
    }

   public function toBroadcast($notifiable):BroadcastMessage
   {
     return new BroadcastMessage([
        'message'=>"$this->message (User: ID: $notifiable->id)"
     ]);
   }
}
