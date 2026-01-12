<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class RespuestaTecnico extends Model
{
    use HasFactory;
    use Auditable;

    protected $table = 'respuesta_notificacions';

    protected $fillable = ['mensaje', 'user_id', 'notificacion_id','tecnico_id'];

    public function notificacion()
    {
        return $this->belongsTo(Notificacion::class, 'notificacion_id');
    }


}
