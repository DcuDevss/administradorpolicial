<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialTrabajoQuinta extends Model
{
    // Asegúrate de que el nombre de la tabla es correcto
    protected $table = 'historial_comunicaciones_quinta';

    protected $fillable = ['trabajos_quinta_id', 'detalle_inventario'];

    public function trabajosQuinta()
    {
        return $this->belongsTo(Comunicacionesquinta::class, 'trabajos_quinta_id');
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
