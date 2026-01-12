<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class Equipocomunicacion extends Model
{
    use HasFactory;
    use Auditable;
    protected $fillable = ['nombre'];

    //Relación uno a muchos
    public function comunicacionesprimera()
    {

        return $this->hasMany(Comunicacionesprimera::class, 'equipocomunicacion_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }

    public function comunicacionessegunda()
    {

        return $this->hasMany(Comunicacionessegunda::class, 'equipocomunicacion_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }

    public function comunicacionestercera()
    {

        return $this->hasMany(Comunicacionestercera::class, 'equipocomunicacion_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }

    public function comunicacionescuarta()
    {

        return $this->hasMany(Comunicacionescuarta::class, 'equipocomunicacion_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }

    public function comunicacionesquinta()
    {

        return $this->hasMany(Comunicacionesquinta::class, 'equipocomunicacion_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }

    public function comunicacionesflia1()
    {

        return $this->hasMany(Comunicacionesflia1::class, 'equipocomunicacion_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }

    public function comunicacionesflia2()
    {

        return $this->hasMany(Comunicacionesflia2::class, 'equipocomunicacion_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }

    public function comunicacionesdesu()
    {

        return $this->hasMany(Comunicacionesdesu::class, 'equipocomunicacion_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }

    public function comunicacionescientifica()
    {

        return $this->hasMany(Comunicacionescientifica::class, 'equipocomunicacion_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }
}
