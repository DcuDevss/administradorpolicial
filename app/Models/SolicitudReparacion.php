<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SolicitudReparacion extends Model
{
    use HasFactory;

    protected $table = 'solicitudes_reparacion';

    public const ETAPA_SOLICITUD = 1;
    public const ETAPA_TURNO = 2;
    public const ETAPA_RECEPCION = 3;
    public const ETAPA_REPARACION = 4;
    public const ETAPA_ENTREGA = 5;

    protected $fillable = [
        'activo_id',
        'usuario_id',
        'estado',
        'prioridad',
        'titulo',
        'descripcion',
    ];

    public function getEtapaActualAttribute(): int
    {
        return match ($this->estado) {

            'pendiente' =>
            self::ETAPA_SOLICITUD,

            'turnada' =>
            self::ETAPA_TURNO,

            'recepcionada' =>
            self::ETAPA_RECEPCION,

            'en_diagnostico',
            'en_reparacion',
            'esperando_repuesto',
            'reparada' =>
            self::ETAPA_REPARACION,

            'lista_para_retirar',
            'entregada' =>
            self::ETAPA_ENTREGA,

            default =>
            self::ETAPA_SOLICITUD,
        };
    }

    /**
     * Activo sobre el cual se generó la solicitud.
     */
    public function activo(): BelongsTo
    {
        return $this->belongsTo(Activo::class);
    }

    /**
     * Usuario que generó la solicitud.
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    /**
     * Turno asignado a la solicitud.
     */
    public function turno(): HasOne
    {
        return $this->hasOne(
            TurnoReparacion::class,
            'solicitud_id'
        );
    }
    
    public function recepciones(): HasMany
    {
        return $this->hasMany(
            Recepcion::class,
            'solicitud_reparacion_id'
        );
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(
            TicketReparacion::class,
            'solicitud_reparacion_id'
        );
    }

    /**
     * Orden de trabajo asociada a la solicitud.
     */
    public function ordenTrabajo(): HasOne
    {
        return $this->hasOne(
            OrdenTrabajo::class,
            'solicitud_reparacion_id'
        );
    }

}
