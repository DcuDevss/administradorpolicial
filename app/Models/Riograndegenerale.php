<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class Riograndegenerale extends Model
{

    use HasFactory;
    use Auditable;
    protected $fillable = [
        'riogrande_id',
        'dependencia_riogrande_id',
        'tipodispositivo_id',
        'cantidadram_id',
        'modelo',
        'marca',
        'procesador',
        'sistema_operativo',
        'fecha_inventario',
        'activo',
        'detalles_inventario',
        'codigo_qr',
        'slotmemoria_id',
        'tipo_ram',
        'tipo_disco',
        'cant_almacenamiento',
        'tipo_mouse',
        'tipo_teclado',
        'tipo_impresora',
        'fecha_service',
        'tipo_service'
    ];

    public function dependencia_riogrande()
    {
        return $this->belongsTo('App\Models\DependenciaRiogrande', 'dependencia_riogrande_id', 'id');
    }
    public function riogrande()
    {
        return $this->belongsTo('App\Models\Riogrande', 'riogrande_id', 'id');
    }
    public function tipodeoficina()
    {
        return $this->belongsTo('App\Models\Tipodeoficina', 'tipodeoficina_id', 'id');
    }
    public function tipodispositivo()
    {
        return $this->belongsTo('App\Models\Tipodispositivo', 'tipodispositivo_id', 'id');
    }
    public function cantidadram()
    {
        return $this->belongsTo('App\Models\Cantidadram', 'cantidadram_id', 'id');
    }
    public function slotmemoria()
    {
        return $this->belongsTo('App\Models\Slotmemoria', 'slotmemoria_id', 'id');
    }
    public function auditorias()
    {
        return $this->hasMany(AuditoriaInventarioRiogrande::class);
    }

    /* ================== 🔍 AUDITORÍA ================== */

    public function auditLabel(): string
    {
        return $this->dependencia_riogrande
            ? $this->dependencia_riogrande->nombre
            : 'Río Grande – Sin dependencia';
    }
}
