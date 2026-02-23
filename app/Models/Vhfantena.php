<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class Vhfantena extends Model
{
    use HasFactory;
    use Auditable;
    protected $fillable = ['nombre'];

    //Relación uno a muchos
    public function comunicacionesprimera()
    {

        return $this->hasMany(Vhfantena::class, 'vhfantena_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }

    public function comunicacionessegunda()
    {

        return $this->hasMany(Vhfantena::class, 'vhfantena_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }

    public function comunicacionestercera()
    {

        return $this->hasMany(Vhfantena::class, 'vhfantena_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }
    public function comunicacionescuarta()
    {

        return $this->hasMany(Vhfantena::class, 'vhfantena_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }
    public function comunicacionesquinta()
    {

        return $this->hasMany(Vhfantena::class, 'vhfantena_id');
        //return$this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }
    public function comunicacionesfamilia1()
    {

        return $this->hasMany(Vhfantena::class, 'vhfantena_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }

    public function comunicacionesfamilia2()
    {

        return $this->hasMany(Vhfantena::class, 'vhfantena_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }
    public function comunicacionesdesu()
    {

        return $this->hasMany(Vhfantena::class, 'vhfantena_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }

    public function comunicacionescienteifica()
    {

        return $this->hasMany(Vhfantena::class, 'vhfantena_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }
}
