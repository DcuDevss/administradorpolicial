<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoriacomunicacion extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function comunicacionesdcus(){

        return $this->belongsTo(Categoriacomunicacion::class, 'categoriacomunicacion_id');

    }

  

}
