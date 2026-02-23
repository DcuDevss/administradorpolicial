<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class Tipodeoficina extends Model
{
    use HasFactory;
    use Auditable;

    protected $fillable = ['nombre'];
    //Relación uno a uno

    //Relación uno a uno inversa

    //Relación uno a muchos
    public function comisariaprimera()
    {

        return $this->hasMany(Tipodeoficina::class, 'tipodeoficina_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','tipodeoficina_id','id');
    }
}
