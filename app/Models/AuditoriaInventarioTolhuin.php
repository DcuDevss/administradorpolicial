<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditoriaInventarioTolhuin extends Model
{
    use HasFactory;

    protected $table = 'auditoria_inventario_tolhuins';

    protected $fillable = ['tolhuingenerale_id', 'detalles_inventario'];

    public function trabajosInformatica()
    {
        return $this->belongsTo(Tolhuingenerale::class, 'tolhuingenerale_id');
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
