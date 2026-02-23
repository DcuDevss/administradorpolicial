<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class HistorialTrabajoComplejo extends Model
{
    use Auditable;
    // Asegúrate de que el nombre de la tabla es correcto
    protected $table = 'historial_comunicaciones_complejo';

    protected $fillable = ['trabajos_complejo_id', 'detalle_inventario'];

    public function trabajosDcu()
    {
        return $this->belongsTo(Comunicacionescomplejo::class, 'trabajos_complejo_id');
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
