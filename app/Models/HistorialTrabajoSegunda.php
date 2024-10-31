<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialTrabajoSegunda extends Model
{
    // Asegúrate de que el nombre de la tabla es correcto
    protected $table = 'historial_comunicaciones_segunda';

    protected $fillable = ['trabajos_segunda_id', 'detalle_inventario'];

    public function trabajosSegunda()
    {
        return $this->belongsTo(Comunicacionessegunda::class, 'trabajos_segunda_id');
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
