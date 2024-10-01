<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destacamento extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    public function generalinformatica(){

        return $this->hasMany(Destacamento::class, 'destacamento_id');

    }
}
