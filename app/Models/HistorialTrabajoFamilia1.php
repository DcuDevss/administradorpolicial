<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialTrabajoFamilia1 extends Model
{
    // Asegúrate de que el nombre de la tabla es correcto
    protected $table = 'historial_comunicaciones_familia1';

    protected $fillable = ['trabajos_familia1_id', 'detalle_inventario'];

    public function trabajosFamilia1()
    {
        return $this->belongsTo(Comunicacionesfamilia1::class, 'trabajos_familia1_id');
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
