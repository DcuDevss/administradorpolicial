<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class Marcaequipo extends Model
{
    use HasFactory;
    use Auditable;
    protected $fillable = ['nombre'];

    //Relación uno a muchos
    public function comunicacionesprimera()
    {

        return $this->hasMany(Marcaequipo::class, 'marcaequipo_id');
    }

    public function comunicacionessegunda()
    {

        return $this->hasMany(Marcaequipo::class, 'marcaequipo_id');
    }

    public function comunicacionestercera()
    {

        return $this->hasMany(Marcaequipo::class, 'marcaequipo_id');
    }
    public function comunicacionescuarta()
    {

        return $this->hasMany(Marcaequipo::class, 'marcaequipo_id');
    }

    public function comunicacionesquinta()
    {

        return $this->hasMany(Marcaequipo::class, 'marcaequipo_id');
    }

    public function comunicacionesfamilia1()
    {

        return $this->hasMany(Marcaequipo::class, 'marcaequipo_id');
    }

    public function comunicacionesfamilia2()
    {

        return $this->hasMany(Marcaequipo::class, 'marcaequipo_id');
    }

    public function comunicacionesdesu()
    {

        return $this->hasMany(Marcaequipo::class, 'marcaequipo_id');
    }

    public function comunicacionescientifica()
    {

        return $this->hasMany(Marcaequipo::class, 'marcaequipo_id');
    }
}
