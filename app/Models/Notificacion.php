<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $table = 'notificaciones';
    protected $fillable = [
        'mensaje', 'user_comisaria_id', 'tecnico_id', 'activa',
    ];
    public function respuestas()
    {
        return $this->hasMany(RespuestaNotificacion::class, 'notificacion_id');
    }
    public function usercomisaria()
    {
        return $this->belongsTo(User::class, 'user_comisaria_id');
    }
   /* public function users()
    {
        return $this->belongsToMany(User::class, 'notificacion_user', 'notificacion_id', 'user_id');
    }*/
    public function tecnico()
    {
        return $this->belongsTo(User::class, 'tecnico_id');
    }
    public function respuesta()
    {
        return $this->hasOne(RespuestaTecnico::class, 'notificacion_id');
    }

    public function tecnicos()
{
    return $this->belongsTo(Tecnicocomunicacione::class, 'tecnico_id');
}
}
