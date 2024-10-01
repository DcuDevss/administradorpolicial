<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DependenciaRiogrande extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    //Relación uno a muchos
    public function trabajosgenerale(){

        return $this->hasMany(DependenciaRiogrande::class, 'dependencia_rg_id');

    }
}
