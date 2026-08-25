<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
