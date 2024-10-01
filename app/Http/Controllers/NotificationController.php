<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function mark_all_notifications(){
             auth()->user()->unreadNotifications->markAsRead();
             return view('livewire.ver-notificaciones');
             //return redirect()->route('dashboard');
    }

    public function mark_a_notifications($notification_id, $notificacion_id){
        auth()->user()->unreadNotifications->when($notification_id, function($query)use ($notification_id){
            return $query->where('id',$notification_id);
        })->markAsRead();

        $notificaciones  = Notificacion::find($notificacion_id);
        return view('livewire.ver-notificaciones',$notificaciones);

    }
}
