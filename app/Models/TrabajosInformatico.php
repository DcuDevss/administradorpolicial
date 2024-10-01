<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrabajosInformatico extends Model
{
    use HasFactory;

    protected $fillable = ['totaldependencia_id','dependencia_tolhuin_id','lugar_trabajo','fecha_trabajo','detalles_trabajo'];

    public function totaldependencia()
    {
        return $this->belongsTo('App\Models\Totaldependencia', 'totaldependencia_id', 'id');
    }
    public function dependenciatolhuin()
    {
        return $this->belongsTo('App\Models\DependenciaTolhuin', 'dependencia_tolhuin_id', 'id');
    }
    public function historialDetalles()
    {
        return $this->hasMany(HistorialDetalleInformatica::class);
    }
}
