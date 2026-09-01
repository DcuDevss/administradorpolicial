<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dependencia extends Model
{
    use HasFactory;

    protected $table = 'dependencias';

    protected $fillable = [
        'dependencia_padre_id',
        'tipo',
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

    /*
    |--------------------------------------------------------------------------
    | Dependencia superior
    |--------------------------------------------------------------------------
    */

    public function dependenciaPadre(): BelongsTo
    {
        return $this->belongsTo(
            self::class,
            'dependencia_padre_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Dependencias subordinadas
    |--------------------------------------------------------------------------
    */

    public function dependenciasHijas(): HasMany
    {
        return $this->hasMany(
            self::class,
            'dependencia_padre_id'
        );
    }

    public function areas(): HasMany
    {
        return $this->hasMany(Area::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Ubicaciones / estructura interna
    |--------------------------------------------------------------------------
    */

    public function ubicaciones(): HasMany
    {
        return $this->hasMany(Ubicacion::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Activos
    |--------------------------------------------------------------------------
    */

    public function activos(): HasMany
    {
        return $this->hasMany(Activo::class);
    }
}
