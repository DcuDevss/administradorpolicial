<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunicacionescientifica extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo_qr','equipocomunicacion_id', 'marcaequipo_id',  'lugar_colocacion', 'modelo',
        'nro_serie', 'condicion_equipo_comunicacion', 'condicion_fuente','condicion_baliza',
        'fecha_inventario', 'fecha_service', 'tipo_service','detalle_inventario','vhfantena_id',
    ];
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
}
