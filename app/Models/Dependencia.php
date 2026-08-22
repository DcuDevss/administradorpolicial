<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    use HasFactory;

    protected $table = 'dependencias';

    protected $fillable = [
        'nombre',
        'codigo',
        'ciudad',
        'activa',
        'metadata',
    ];

    protected $casts = [
        'activa' => 'boolean',
        'metadata' => 'array',
    ];

    public function ubicaciones()
    {
        return $this->hasMany(Ubicacion::class);
    }
    public function activos()
    {
        return $this->hasMany(Activo::class);
    }
}
