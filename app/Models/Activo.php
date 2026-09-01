<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activo extends Model
{
    use HasFactory;

    protected $table = 'activos';

    protected $fillable = [
        'dependencia_id',
        'ubicacion_id',
        'categoria_activo_id',
        'marca',
        'modelo',
        'numero_serie',
        'codigo_patrimonial',
        'codigo_interno',
        'estado',
        'responsable_user_id',
        'fecha_alta',
        'observaciones',
        'qr_token',
        'qr_revocado_at',
    ];

    protected $casts = [
        'fecha_alta' => 'date',
        'qr_revocado_at' => 'datetime',
    ];

    public function dependencia(): BelongsTo
    {
        return $this->belongsTo(Dependencia::class);
    }

    public function ubicacion(): BelongsTo
    {
        return $this->belongsTo(Ubicacion::class);
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(
            CategoriaActivo::class,
            'categoria_activo_id'
        );
    }

    public function responsable(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'responsable_user_id'
        );
    }

    public function especificaciones(): HasMany
    {
        return $this->hasMany(ActivoEspecificacion::class);
    }

    public function referenciasLegacy(): HasMany
    {
        return $this->hasMany(ActivoReferenciaLegacy::class);
    }

    public function solicitudesReparacion(): HasMany
    {
        return $this->hasMany(SolicitudReparacion::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Relaciones futuras del dominio de Reparaciones
    |--------------------------------------------------------------------------
    |
    | Se agregarán cuando las entidades estén formalmente implementadas.
    |
    | hasMany Recepcion
    | hasMany OrdenTrabajo
    | hasMany Entrega
    | hasMany HistorialTecnico
    |
    */
}
