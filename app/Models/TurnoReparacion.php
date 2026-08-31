<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Traits\Auditable;

class TurnoReparacion extends Model
{
    use HasFactory;
    use Auditable;

    protected $table = 'turnos_reparacion';

    protected $fillable = [
        'solicitud_id',
        'fecha',
        'hora',
        'estado',
        'observaciones',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];

    /**
     * Solicitud de reparación asociada al turno.
     */
    public function solicitud(): BelongsTo
    {
        return $this->belongsTo(
            SolicitudReparacion::class,
            'solicitud_id'
        );
    }
}
