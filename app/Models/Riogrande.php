<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riogrande extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    public function generalinformatica(){

        return $this->hasMany(Riogrande::class, 'riogrande_id');

    }
    public function riograndegenerale(){
        return $this->hasMany(Riograndegenerale::class, 'riogrande_id');
    }
}
