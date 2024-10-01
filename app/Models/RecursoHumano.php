<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecursoHumano extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    public function generalinformatica(){

        return $this->hasMany(Generalinformatica::class, 'recurso_humano_id');

    }
    public function recursoshumanosgenerale(){
        return $this->hasMany(Recursoshumanosgenerale::class, 'recurso_humano_id');
    }
}
