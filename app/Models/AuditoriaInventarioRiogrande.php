<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditoriaInventarioRiogrande extends Model
{
    use HasFactory;

    protected $table = 'auditoria_inventario_riograndes';

    protected $fillable = ['riograndegenerale_id', 'detalles_inventario'];

    public function trabajosInformatica()
    {
        return $this->belongsTo(Riograndegenerale::class, 'riograndegenerale_id');
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
