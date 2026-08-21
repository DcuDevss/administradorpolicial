<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class TicketReparacion extends Model
{
    use HasFactory;
    use Auditable;

    protected $table = 'tickets_reparaciones';

    protected $fillable = [
        'numero_ticket',
        'user_id',
        'tecnico_id',
        'generalinformatica_id',
        'dependencia_tipo',
        'dependencia_id',
        'dependencia_nombre',
        'fecha_ingreso',
        'hora_ingreso',
        'entregado_por',
        'recibido_por',
        'equipo',
        'marca',
        'modelo',
        'numero_serie',
        'problema_reportado',
        'estado',
        'diagnostico',
        'pieza_danada',
        'trabajo_realizado',
        'observaciones',
        'fecha_entrega',
        'hora_entrega',
        'entregado_por_tecnico',
        'recibido_por_dependencia',
    ];

    protected $casts = [
        'fecha_ingreso' => 'date',
        'fecha_entrega' => 'date',
    ];

    public const ESTADOS = [
        'nuevo' => 'Nuevo',
        'asignado' => 'Asignado',
        'en_revision' => 'En revision',
        'pendiente_repuesto' => 'Pendiente repuesto',
        'reparado' => 'Reparado',
        'entregado' => 'Entregado',
        'cerrado' => 'Cerrado',
    ];

    public function solicitante()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tecnico()
    {
        return $this->belongsTo(User::class, 'tecnico_id');
    }

    public function equipoInventariado()
    {
        return $this->belongsTo(Generalinformatica::class, 'generalinformatica_id');
    }

    public function historial()
    {
        return $this->hasMany(TicketReparacionHistorial::class, 'ticket_reparacion_id')->latest();
    }

    public function getEstadoNombreAttribute(): string
    {
        return self::ESTADOS[$this->estado] ?? ucfirst((string) $this->estado);
    }
}
