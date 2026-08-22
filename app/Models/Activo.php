<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Activo extends Model
{
    use HasFactory;

    protected $table = 'activos';

    protected $fillable = [
        'dependencia_id',
        'ubicacion_id',
        'categoria_activo_id',
        'marca',
        'modelo',
        'numero_serie',
        'codigo_patrimonial',
        'codigo_interno',
        'estado',
        'responsable_user_id',
        'fecha_alta',
        'observaciones',
        'qr_token',
        'qr_revocado_at',
    ];

    protected $casts = [
        'fecha_alta' => 'date',
        'qr_revocado_at' => 'datetime',
    ];

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class);
    }

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_user_id');
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaActivo::class, 'categoria_activo_id');
    }

    public function especificaciones()
    {
        return $this->hasMany(ActivoEspecificacion::class);
    }

    public function referenciasLegacy()
    {
        return $this->hasMany(ActivoReferenciaLegacy::class);
    }
}
