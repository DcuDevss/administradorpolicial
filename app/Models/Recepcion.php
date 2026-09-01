<?php

namespace App\Models;

use App\Models\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Recepcion extends Model
{
    use HasFactory;
    use Auditable;

    protected $table = 'recepciones';

    protected $fillable = [
        'activo_id',
        'solicitud_reparacion_id',
        'turno_reparacion_id',
        'dependencia_id',
        'recibido_por_id',
        'fecha_recepcion',
        'persona_entrega_nombre',
        'persona_entrega_documento',
        'estado_fisico',
        'accesorios',
        'falla_declarada',
        'observaciones',
    ];

    protected $casts = [
        'fecha_recepcion' => 'datetime',
    ];

    /**
     * Activo recibido.
     */
    public function activo(): BelongsTo
    {
        return $this->belongsTo(
            Activo::class,
            'activo_id'
        );
    }

    /**
     * Solicitud de reparación.
     */
    public function solicitud(): BelongsTo
    {
        return $this->belongsTo(
            SolicitudReparacion::class,
            'solicitud_reparacion_id'
        );
    }

    /**
     * Ticket operativo de reparación.
     *
     * La FK se encuentra en tickets_reparacion.recepcion_id.
     */
    public function ticket(): HasOne
    {
        return $this->hasOne(
            TicketReparacion::class,
            'recepcion_id'
        );
    }

    /**
     * Turno mediante el cual fue recibido el equipo.
     */
    public function turno(): BelongsTo
    {
        return $this->belongsTo(
            TurnoReparacion::class,
            'turno_reparacion_id'
        );
    }

    /**
     * Dependencia propietaria del activo.
     */
    public function dependencia(): BelongsTo
    {
        return $this->belongsTo(
            Dependencia::class,
            'dependencia_id'
        );
    }

    /**
     * Técnico que recibió físicamente el equipo.
     */
    public function recibidoPor(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'recibido_por_id'
        );
    }
}
