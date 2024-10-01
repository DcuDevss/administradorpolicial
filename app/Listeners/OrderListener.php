<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Notifications\OrderNotification;
use App\Notifications\OrderComunicacion;
//use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification;


class OrderListener
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
        User::role('tecnicoinformatico')//->except($notification->user_id)
          ->whereNotIn('id',$event->notificacion->user_id)
          ->each(function(User $user) use ($event){
             Notification::send($user, new OrderNotification($event->notificacion));
          });

         
          // Aquí puedes enviar notificaciones a los técnicos y almacenar la notificación en la base de datos
       // $notificaciones = $event->notificacion;

        // Envía la notificación al técnico
        //$tecnico = $notificaciones->tecnicos;
        //Notification::send($tecnico, new OrderNotification($notificaciones));

        // Puedes almacenar la notificación en la base de datos si es necesario
        // Ejemplo: $notificacion->save();
    }
}
