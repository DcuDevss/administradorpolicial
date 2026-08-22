<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivoEspecificacion extends Model
{
    use HasFactory;

    protected $table = 'activo_especificaciones';

    protected $fillable = [
        'activo_id',
        'clave',
        'valor',
        'unidad',
        'tipo_valor',
    ];

    public function activo()
    {
        return $this->belongsTo(Activo::class);
    }
}
