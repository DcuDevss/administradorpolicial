<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumario extends Model
{
    use HasFactory;

    protected $fillable=['nombre'];

    public function recursoshumanosgenerale(){
        return $this->hasMany(Recursoshumanosgenerale::class, 'sumario_id');
    }
}
