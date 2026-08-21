<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketReparacionHistorial extends Model
{
    protected $table = 'ticket_reparacion_historial';

    protected $fillable = [
        'ticket_reparacion_id',
        'usuario_id',
        'accion',
        'descripcion',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function ticket()
    {
        return $this->belongsTo(TicketReparacion::class, 'ticket_reparacion_id');
    }
}
