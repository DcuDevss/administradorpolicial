<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function getEntityLabelAttribute()
    {
        return class_basename($this->auditable_type);
    }
}
