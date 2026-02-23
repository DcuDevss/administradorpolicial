<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class Tipodispositivo extends Model
{
    use HasFactory;
    use Auditable;

    protected $fillable = ['nombre'];



    //Relación uno a muchos
    public function comisariaprimera()
    {

        return $this->hasMany(ComisariaPrimera::class, 'tipodispositivo_id');
    }
    public function administraciongenerale()
    {

        return $this->hasMany(Administraciongenerale::class, 'tipodispositivo_id');
    }
    public function investigacionegenerale()
    {

        return $this->hasMany(Investigacionesgenerale::class, 'tipodispositivo_id');
    }
    public function recursoshumanosgenerale()
    {
        return $this->hasMany(Recursoshumanosgenerale::class, 'tipodispositivo_id');
    }
    public function jefaturagenerale()
    {
        return $this->hasMany(Jefaturagenerale::class, 'tipodispositivo_id');
    }
}
