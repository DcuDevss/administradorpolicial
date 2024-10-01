<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recursoshumanosgenerale extends Model
{
    use HasFactory;
    protected $fillable = ['recurso_humano_id','bienestare_id','sumario_id',
    'tipodispositivo_id', 'cantidadram_id', 'modelo', 'marca', 'procesador',
    'sistema_operativo','fecha_inventario', 'activo', 'detalles_inventario','codigo_qr','slotmemoria_id','tipo_ram',
    'tipo_disco','cant_almacenamiento','tipo_mouse','tipo_teclado','fecha_service','tipo_service'
];

public function recursohumano()
{
    return $this->belongsTo('App\Models\RecursoHumano', 'recurso_humano_id', 'id');
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
public function bienestare()
{
    return $this->belongsTo('App\Models\Bienestare', 'bienestare_id', 'id');
}
public function sumario()
{
    return $this->belongsTo('App\Models\Sumario', 'sumario_id', 'id');
}
}
