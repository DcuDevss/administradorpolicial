<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrdenTrabajo extends Model
{
    use HasFactory;

    protected $table = 'ordenes_trabajo';

    /*
    |--------------------------------------------------------------------------
    | Estados
    |--------------------------------------------------------------------------
    */

    public const ESTADO_PENDIENTE = 'pendiente';

    public const ESTADO_EN_DIAGNOSTICO = 'en_diagnostico';

    public const ESTADO_EN_REPARACION = 'en_reparacion';

    public const ESTADO_ESPERANDO_REPUESTO = 'esperando_repuesto';

    public const ESTADO_REPARADA = 'reparada';

    public const ESTADO_NO_REPARADA = 'no_reparada';

    /*
    |--------------------------------------------------------------------------
    | Mass Assignment
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        'solicitud_reparacion_id',
        'tecnico_id',
        'estado',
        'fecha_inicio',
        'fecha_finalizacion',
        'diagnostico',
        'problema_encontrado',
        'trabajo_realizado',
        'pruebas_realizadas',
        'observaciones',
        'resultado',
    ];

    /*
    |--------------------------------------------------------------------------
    | Casts
    |--------------------------------------------------------------------------
    */

    protected $casts = [
        'fecha_inicio' => 'datetime',
        'fecha_finalizacion' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Solicitud
    |--------------------------------------------------------------------------
    */

    public function solicitud(): BelongsTo
    {
        return $this->belongsTo(
            SolicitudReparacion::class,
            'solicitud_reparacion_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Técnico
    |--------------------------------------------------------------------------
    */

    public function tecnico(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'tecnico_id'
        );
    }
}
