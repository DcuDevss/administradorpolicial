<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
//use App\Notifications\OrderNotification;
use App\Notifications\OrderComunicacion;
//use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification;

class OrderListenerComunicacion
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
       /* User::role('tecnicocomunicacion')//->except($notification->user_id)
        ->whereNotIn('id',$event->notificacion->user_id)
        ->each(function(User $user) use ($event){
           Notification::send($user, new OrderComunicacion($event->notificacion));
        });*/
    }
}
