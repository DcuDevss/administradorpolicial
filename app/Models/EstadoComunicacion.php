<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class EstadoComunicacion extends Model
{
    use HasFactory;
    use Auditable;

    //protected $table = 'estado_comunicacion';

    //protected $fillable = ['comunicacionesprimera_id', 'estado_equipo_id'];

    //public function comunicacionesprimera()
    //{
    //    return $this->belongsTo(Comunicacionesprimera::class, 'comunicacionesprimera_id');
    //}

    //public function estadoequipo()
    //{
    //    return $this->belongsTo(EstadoEquipo::class, 'estado_equipo_id');
    // }
}
