<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class HistorialDetalleInformatica extends Model
{
    use Auditable;
    // Asegúrate de que el nombre de la tabla es correcto
    protected $table = 'historial_detalles_informaticas';

    protected $fillable = ['trabajos_informatica_id', 'detalles_trabajo'];

    public function trabajosGenerale()
    {
        return $this->belongsTo(TrabajosInformatico::class, 'trabajos_informatica_id');
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
