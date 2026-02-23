<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class HistorialDetalleTrabajo extends Model
{
    use Auditable;
    // Asegúrate de que el nombre de la tabla es correcto
    protected $table = 'historial_detalles_trabajos';

    protected $fillable = ['trabajos_generale_id', 'fecha_trabajo', 'detalle_trabajo'];

    public function trabajosGenerale()
    {
        return $this->belongsTo(TrabajosGenerale::class, 'trabajos_generale_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($historial) {
            // Prevenir la eliminación de registros históricos
            throw new \Exception('No se puede eliminar un registro histórico de trabajo.');
        });
    }
}
