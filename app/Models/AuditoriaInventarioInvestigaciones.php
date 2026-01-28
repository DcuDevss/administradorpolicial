<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class AuditoriaInventarioInvestigaciones extends Model
{
    use HasFactory;
    use Auditable;

    protected $table = 'auditoria_inventario_investigaciones';

    protected $fillable = ['investigacionegenerale_id', 'detalles_inventario'];

    public function trabajosInformatica()
    {
        return $this->belongsTo(Investigacionesgenerale::class, 'investigacionegenerale_id');
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
