<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Totaldependencia extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    public function trabajosinformaticos(){

        return $this->hasMany(Totaldependencia::class, 'totaldependencia_id');

    }


}
