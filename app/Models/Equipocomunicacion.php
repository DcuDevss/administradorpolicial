<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipocomunicacion extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    //Relación uno a muchos
    public function comunicacionesprimera(){

        return $this->hasMany(Equipocomunicacion::class, 'equipocomunicacion_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }

    public function comunicacionessegunda(){

        return $this->hasMany(Equipocomunicacion::class, 'equipocomunicacion_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }

    public function comunicacionestercera(){

        return $this->hasMany(Equipocomunicacion::class, 'equipocomunicacion_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }

    public function comunicacionescuarta(){

        return $this->hasMany(Equipocomunicacion::class, 'equipocomunicacion_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }

    public function comunicacionesquinta(){

        return $this->hasMany(Equipocomunicacion::class, 'equipocomunicacion_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }

    public function comunicacionesflia1(){

        return $this->hasMany(Equipocomunicacion::class, 'equipocomunicacion_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }

    public function comunicacionesflia2(){

        return $this->hasMany(Equipocomunicacion::class, 'equipocomunicacion_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }

    public function comunicacionesdesu(){

        return $this->hasMany(Equipocomunicacion::class, 'equipocomunicacion_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }

    public function comunicacionescientifica(){

        return $this->hasMany(Equipocomunicacion::class, 'equipocomunicacion_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }
}
