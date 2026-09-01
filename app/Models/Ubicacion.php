<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /*
    |--------------------------------------------------------------------------
    | Dependencia a la que pertenece
    |--------------------------------------------------------------------------
    */

    public function dependencia(): BelongsTo
    {
        return $this->belongsTo(Dependencia::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Ubicación superior
    |--------------------------------------------------------------------------
    */

    public function padre(): BelongsTo
    {
        return $this->belongsTo(
            Ubicacion::class,
            'parent_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Ubicaciones subordinadas
    |--------------------------------------------------------------------------
    */

    public function hijas(): HasMany
    {
        return $this->hasMany(
            self::class,
            'parent_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Activos ubicados aquí
    |--------------------------------------------------------------------------
    */

    public function activos(): HasMany
    {
        return $this->hasMany(Activo::class);
    }
}
