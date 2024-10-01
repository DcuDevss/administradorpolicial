<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialTrabajoRiogrande extends Model
{
    // Asegúrate de que el nombre de la tabla es correcto
    protected $table = 'historial_comunicaciones_rgs';

    protected $fillable = ['trabajos_riogrande_id', 'detalle_inventario'];

    public function trabajosRiogrande()
    {
        return $this->belongsTo(Comunicacionesrg::class, 'trabajos_riogrande_id');
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
