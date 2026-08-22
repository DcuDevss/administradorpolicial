<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;

    protected $table = 'ubicaciones';

    protected $fillable = [
        'dependencia_id',
        'parent_id',
        'nombre',
        'tipo',
        'codigo',
        'descripcion',
        'activa',
    ];

    protected $casts = [
        'activa' => 'boolean',
    ];

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class);
    }

    public function padre()
    {
        return $this->belongsTo(Ubicacion::class, 'parent_id');
    }

    public function hijas()
    {
        return $this->hasMany(Ubicacion::class, 'parent_id');
    }

    public function activos()
    {
        return $this->hasMany(Activo::class);
    }
}
