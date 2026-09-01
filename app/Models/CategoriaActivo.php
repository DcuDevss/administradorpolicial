<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function padre(): BelongsTo
    {
        return $this->belongsTo(
            self::class,
            'parent_id'
        );
    }

    public function hijas(): HasMany
    {
        return $this->hasMany(
            self::class,
            'parent_id'
        );
    }

    public function activos(): HasMany
    {
        return $this->hasMany(
            Activo::class,
            'categoria_activo_id'
        );
    }
}
