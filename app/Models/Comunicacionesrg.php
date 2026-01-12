<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class Comunicacionesrg extends Model
{
    use HasFactory;
    use Auditable;
    protected $fillable = [
        'codigo_qr',
        'equipocomunicacion_id',
        'dependencia_riogrande_id',
        'marcaequipo_id',
        'lugar_colocacion',
        'modelo',
        'nro_serie',
        'condicion_equipo_comunicacion',
        'condicion_fuente',
        'condicion_baliza',
        'fecha_inventario',
        'fecha_service',
        'tipo_service',
        'detalle_inventario',
        'vhfantena_id',
    ];
    public function dependenciarg()
    {
        return $this->belongsTo('App\Models\DependenciaRiogrande', 'dependencia_riogrande_id', 'id');
    }
    public function marcaequipo()
    {
        return $this->belongsTo('App\Models\Marcaequipo', 'marcaequipo_id', 'id');
    }
    public function equipocomunicacion()
    {
        return $this->belongsTo('App\Models\Equipocomunicacion', 'equipocomunicacion_id', 'id');
    }
    public function vhfantena()
    {
        return $this->belongsTo('App\Models\Vhfantena', 'vhfantena_id', 'id');
    }
    public function historialDetalles()
    {
        return $this->hasMany(HistorialTrabajoRiogrande::class);
    }

    // 🔍 Cómo se muestra esta entidad en la auditoría
    public function auditLabel(): string
    {
        return 'D.C.R.G – ' . optional($this->dependenciarg)->nombre;
    }
}
