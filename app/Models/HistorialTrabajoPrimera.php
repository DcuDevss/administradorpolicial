<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialTrabajoPrimera extends Model
{
    // Asegúrate de que el nombre de la tabla es correcto
    protected $table = 'historial_comunicaciones_primera';

    protected $fillable = ['trabajos_primera_id', 'detalle_inventario'];

    public function trabajosPrimera()
    {
        return $this->belongsTo(Comunicacionesprimera::class, 'trabajos_primera_id');
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
