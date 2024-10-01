<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnicocomunicacione extends Model
{
    use HasFactory;
    protected $fillable =['nombre'];

    public function trabajosgenerale(){

        return $this->hasMany(Tecnicocomunicacione::class, 'tecnicocomunicacione_id');

    }
    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class, 'tecnico_id');
    }
}
