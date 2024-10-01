<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bienestare extends Model
{
    use HasFactory;

    protected $fillable =['nombre'];

    public function recursoshumanosgenerale(){
        return $this->hasMany(Recursoshumanosgenerale::class, 'bienestare_id');
    }



}
