<?php

namespace App\Events;

use App\Models\SolicitudReparacion;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SolicitudReparacionCreada
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public SolicitudReparacion $solicitud
    ) {}
}
