<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunicacionesdcu extends Model
{
    use Hasfactory;
    protected $fillable = [
        'nombre',
        'categoriacomunicacion_id',
        'marca',
        'modelo',
        'numero_serie',
        'fecha_service',
        'tipo_service',
        'estado',
        'fecha_inventario',
        'detalle_inventario',
        'codigo_qr',  ];

        public function categoriacomunicacions()
        {
            return $this->belongsTo('App\Models\Categoriacomunicacion', 'categoriacomunicacion_id', 'id');
        }

}
