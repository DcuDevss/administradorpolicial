<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class HistorialTrabajoCientifica extends Model
{

    // Asegúrate de que el nombre de la tabla es correcto
    protected $table = 'historial_comunicaciones_cientifica';

    protected $fillable = ['trabajos_cientifica_id', 'detalle_inventario'];

    public function trabajosDcu()
    {
        return $this->belongsTo(Comunicacionescientifica::class, 'trabajos_cientifica_id');
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
