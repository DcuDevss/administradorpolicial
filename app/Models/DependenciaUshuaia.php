<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DependenciaUshuaia extends Model
{
    use HasFactory;
    protected $fillable =['nombre'];

    public function trabajosgenerale(){

        return $this->hasMany(DependenciaUshuaia::class, 'dependencia_ushuaia_id');

    }
    public function generalinformatica(){

        return $this->hasMany(DependenciaUshuaia::class, 'dependencia_ushuaia_id');

    }

   
}
