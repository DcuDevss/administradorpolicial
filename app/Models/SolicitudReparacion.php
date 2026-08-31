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

    protected $fillable = [
        'activo_id',
        'usuario_id',
        'estado',
        'prioridad',
        'titulo',
        'descripcion',
    ];

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

}
