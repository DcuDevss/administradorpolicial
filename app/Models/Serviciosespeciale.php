<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serviciosespeciale extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    public function generalinformatica(){
        return $this->hasMany(Serviciosespeciale::class, 'serviciosespeciale_id');
    }

    public function serviciosespecialesgenerale(){
        return $this->hasMany(Serviciosespecialesgenerale::class, 'serviciosespeciale_id');
    }
}

