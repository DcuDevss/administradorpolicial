<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DependenciaTolhuin extends Model
{
    use HasFactory;
    protected $fillable =['nombre'];

    public function trabajosgenerale(){

        return $this->hasMany(DependenciaTolhuin::class, 'dependencia_tolhuin_id');

    }

    public function trabajosinformatico(){

        return $this->hasMany(DependenciaTolhuin::class, 'dependencia_tolhuin_id');

    }
}
