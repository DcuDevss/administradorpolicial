<?php

/*namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cantidadram extends Model
{
    use HasFactory;

    protected $fillable = ['cantidad'];
    //Relación uno a uno

    //Relación uno a uno inversa

    //Relación uno a muchos
    public function comisariaprimera(){

        return $this->hasMany(ComisariaPrimera::class, 'cantidadram_id');
        //return $this->hasMany('App\Models\ComisariaPrimera','cantidadram_id','id');
    }
    public function admnistraciongenerale(){

        return $this->hasMany(Administraciongenerale::class, 'cantidadram_id');

    }
}*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cantidadram extends Model
{
    use HasFactory;

    protected $fillable = ['cantidad'];
    // Relación uno a muchos
    public function comisariaprimera(){
        return $this->hasMany(ComisariaPrimera::class, 'cantidadram_id');
    }

    public function investigacionegenerale(){
        return $this->hasMany(Investigacionesgenerale::class, 'cantidadram_id');
    }

    public function administraciongenerale(){
        return $this->hasMany(Administraciongenerale::class, 'cantidadram_id');
    }
    public function recursoshumanosgenerale(){
        return $this->hasMany(Recursoshumanosgenerale::class, 'cantidadram_id');
    }
    public function jefaturagenerale(){
        return $this->hasMany(Jefaturagenerale::class, 'cantidadram_id');
    }

}

