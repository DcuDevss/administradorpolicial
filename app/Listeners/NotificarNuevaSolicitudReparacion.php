<?php

namespace App\Listeners;

use App\Events\SolicitudReparacionCreada;
use App\Models\User;
use App\Notifications\NuevaSolicitudReparacion;
use Illuminate\Support\Facades\Notification;

class NotificarNuevaSolicitudReparacion
{
    public function handle(SolicitudReparacionCreada $event): void
    {
        $tecnicos = User::role([
            'tecnicoinformatico',
            'tecnicocomunicacion',
        ])->get();

        Notification::send(
            $tecnicos,
            new NuevaSolicitudReparacion($event->solicitud)
        );
    }
}
