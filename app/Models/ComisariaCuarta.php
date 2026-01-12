<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;


class ComisariaCuarta extends Model
{
    use HasFactory;
    use Auditable;

    protected $fillable = [
        'tipodispositivo_id',
        'tipodeoficina_id',
        'cantidadram_id',
        'modelo',
        'marca',
        'procesador',
        'almacenamiento',
        'monitor',
        'sistema_operativo',
        'tipo_servicio',
        'fecha_servicio',
        'activo',
        'detalle_servicio'
    ];

    public function tipodispositivo()
    {
        return $this->belongsTo('App\Models\Tipodispositivo', 'tipodispositivo_id', 'id');
    }
    public function tipodeoficina()
    {
        return $this->belongsTo('App\Models\Tipodeoficina', 'tipodeoficina_id', 'id');
    }
    public function cantidadram()
    {
        return $this->belongsTo('App\Models\Cantidadram', 'cantidadram_id', 'id');
    }
}
