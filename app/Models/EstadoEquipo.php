<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class EstadoEquipo extends Model
{
    use HasFactory;
    use Auditable;
    protected $fillable = ['nombre'];

    // Relación de muchos a muchos con Comunicacionesprimera
    public function comunicacionesprimeras()
    {
        return $this->belongsToMany(Comunicacionesprimera::class, 'estado_comunicacion', 'estado_equipo_id', 'comunicacionesprimera_id')
            ->withTimestamps();
    }
}
