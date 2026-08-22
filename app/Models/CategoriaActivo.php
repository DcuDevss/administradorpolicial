<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaActivo extends Model
{
    use HasFactory;

    protected $table = 'categorias_activos';

    protected $fillable = [
        'parent_id',
        'nombre',
        'codigo',
        'descripcion',
        'activa',
    ];

    protected $casts = [
        'activa' => 'boolean',
    ];

    public function padre()
    {
        return $this->belongsTo(CategoriaActivo::class, 'parent_id');
    }

    public function hijas()
    {
        return $this->hasMany(CategoriaActivo::class, 'parent_id');
    }

    public function activos()
    {
        return $this->hasMany(Activo::class, 'categoria_activo_id');
    }
}
