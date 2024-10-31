<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialTrabajoRecurso extends Model
{
    // Asegúrate de que el nombre de la tabla es correcto
    protected $table = 'historial_comunicaciones_recurso';

    protected $fillable = ['trabajos_recurso_id', 'detalle_inventario'];

    public function trabajosRecurso()
    {
        return $this->belongsTo(Comunicacionesrecurso::class, 'trabajos_recurso_id');
    }

    // Configura eventos para el modelo
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($historial) {
            // Prevenir la eliminación de registros históricos
            throw new \Exception('No se puede eliminar un registro histórico de trabajo.');
        });
    }
}
