<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialTrabajoDcu extends Model
{
    // Asegúrate de que el nombre de la tabla es correcto
    protected $table = 'historial_comunicaciones_dcu';

    protected $fillable = ['trabajos_dcu_id', 'detalle_inventario'];

    public function trabajosDcu()
    {
        return $this->belongsTo(Comunicacionesdcu::class, 'trabajos_dcu_id');
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
