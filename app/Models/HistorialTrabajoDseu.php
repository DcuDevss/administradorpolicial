<?php

namespace App\Models;

use App\Models\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;

class HistorialTrabajoDseu extends Model
{
    use Auditable;
    // Asegúrate de que el nombre de la tabla es correcto
    protected $table = 'historial_comunicaciones_dseu';

    protected $fillable = ['trabajos_dseu_id', 'detalle_inventario'];

    public function trabajosDseu()
    {
        return $this->belongsTo(Comunicacionesdseu::class, 'trabajos_dseu_id');
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
