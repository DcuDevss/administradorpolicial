<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class TrabajosGenerale extends Model
{
    use HasFactory, Auditable;


    protected $fillable = [
        'dependencia_ushuaia_id',
        'dependencia_riogrande_id',
        'dependencia_tolhuin_id',
        'otras_institucione_id',
        'tecnicocomunicacione_id',
        'lugar_trabajo',
        'fecha_trabajo',
        'detalle_trabajo',
    ];

    public function dependenciariogrande()
    {
        return $this->belongsTo('App\Models\DependenciaRiogrande', 'dependencia_riogrande_id', 'id');
    }
    public function dependenciaushuaia()
    {
        return $this->belongsTo('App\Models\DependenciaUshuaia', 'dependencia_ushuaia_id', 'id');
    }
    public function dependenciatolhuin()
    {
        return $this->belongsTo('App\Models\DependenciaTolhuin', 'dependencia_tolhuin_id', 'id');
    }
    public function otrainstitucione()
    {
        return $this->belongsTo('App\Models\OtrasInstitucione', 'otras_institucione_id', 'id');
    }
    public function tecnicocomunicacione()
    {
        return $this->belongsTo('App\Models\Tecnicocomunicacione', 'tecnicocomunicacione_id', 'id');
    }
    public function historialDetalles()
    {
        return $this->hasMany(HistorialDetalleTrabajo::class);
    }
}
