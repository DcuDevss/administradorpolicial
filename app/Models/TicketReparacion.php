<?php

namespace App\Models;

use App\Models\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketReparacion extends Model
{
    use HasFactory;
    use Auditable;

    protected $table = 'tickets_reparacion';

    protected $fillable = [
        'numero',
        'codigo_verificacion',
        'solicitud_reparacion_id',
        'activo_id',
        'recepcion_id',
        'entrega_id',
        'estado',
        'emitido_at',
    ];

    protected $casts = [
        'emitido_at' => 'datetime',
    ];

    /**
     * Solicitud de reparación asociada.
     */
    public function solicitud(): BelongsTo
    {
        return $this->belongsTo(
            SolicitudReparacion::class,
            'solicitud_reparacion_id'
        );
    }

    /**
     * Activo asociado al ticket.
     */
    public function activo(): BelongsTo
    {
        return $this->belongsTo(
            Activo::class,
            'activo_id'
        );
    }

    /**
     * Recepción física del activo.
     */
    public function recepcion(): BelongsTo
    {
        return $this->belongsTo(
            Recepcion::class,
            'recepcion_id'
        );
    }

    /**
     * Entrega del activo.
     */
    /*
    public function entrega(): BelongsTo
    {
        return $this->belongsTo(
            Entrega::class,
            'entrega_id'
        );
    }
    */
}
