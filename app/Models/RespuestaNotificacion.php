<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaNotificacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'mensaje',
        'user_id',
        'notificacion_id',
        'user_comisaria_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function usercomisaria()
    {
        return $this->belongsTo(User::class, 'user_comisaria_id');
    }

    public function notificacion()
    {
        return $this->belongsTo(Notificacion::class, 'notificacion_id');
    }
}
