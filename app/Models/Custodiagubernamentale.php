<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custodiagubernamentale extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    public function custodiagubernamentale(){
        return $this->hasMany(Custodiagubernamentale::class, 'custodiagubernamentale_id');
    }

    public function generalinformatica(){

        return $this->hasMany(Custodiagubernamentale::class, 'custodiagubernamentale_id');

    }
}
