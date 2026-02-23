<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class HistorialTrabajoUshuaia extends Model
{
    use Auditable;
    // Asegúrate de que el nombre de la tabla es correcto
    protected $table = 'historial_comunicaciones_ushuaia';

    protected $fillable = ['trabajos_ushuaia_id', 'detalle_inventario'];

    public function trabajosUshuaia()
    {
        return $this->belongsTo(Comunicacionesushuaia::class, 'trabajos_ushuaia_id');
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
