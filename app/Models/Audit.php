<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Helpers\AuditEntityMapper;

class Audit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'action',
        'description',
        'auditable_type',
        'auditable_id',
        'ip_address',
        'user_agent',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function auditable()
    {
        return $this->morphTo();
    }

    // 🚫 Bloquear eliminación de auditorías
    protected static function boot()
    {
        parent::boot();

        static::deleting(function () {
            throw new \Exception(
                'No se puede eliminar un registro de auditoría.'
            );
        });
    }

    // Etiqueta legible de acción
    public function getActionLabelAttribute()
    {
        return match ($this->action) {
            'create'        => 'Equipo Creado',
            'update'        => 'Equipo Actualizado',
            'delete'        => 'Equipo Eliminado',
            'user.delete'   => 'Usuario Eliminado',
            'role.update'   => 'Actualización de rol',
            'user.create' => 'Usuario Creado',
            'user.update' => 'Actualización de Usuario',
            'role.create'   => 'Rol Creado',
            'role.update'   => 'Rol Actualizado',
            'role.delete'   => 'Rol Eliminado',


            default         => $this->action,
        };
    }


    // Etiqueta legible de entidad
    /*  public function getEntityLabelAttribute()
    {
        return class_basename($this->auditable_type);
    } */



    /*  public function getEntityLabelAttribute()
    {
        return $this->auditable_type
            ? AuditEntityMapper::label($this->auditable_type)
            : '—';
    } */

    public function getEntityLabelAttribute(): string
    {
        // 1️⃣ Si el modelo existe, la relación está cargada y define etiqueta → usarla
        // Agregamos relationLoaded para evitar LazyLoadingViolationException
        if ($this->relationLoaded('auditable') && $this->auditable && method_exists($this->auditable, 'auditLabel')) {
            return $this->auditable->auditLabel();
        }

        // 2️⃣ Si no, usar mapper por tipo
        if ($this->auditable_type) {
            return \App\Helpers\AuditEntityMapper::label($this->auditable_type);
        }

        return '—';
    }
}
