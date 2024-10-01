<?php

/*namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slotmemoria extends Model
{
    use HasFactory;

    protected $fillable = ['cantidad'];

    public function comisariaprimera(){

        return $this->hasMany(ComisariaPrimera::class, 'slotmemoria_id');

    }
    public function admnistraciongenerale(){

        return $this->hasMany(Administraciongenerale::class, 'slotmemoria_id');

    }
}*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slotmemoria extends Model
{
    use HasFactory;

    protected $fillable = ['cantidad'];

    public function comisariaprimera(){
        return $this->hasMany(ComisariaPrimera::class, 'slotmemoria_id');
    }

    public function administraciongenerale(){
        return $this->hasMany(Administraciongenerale::class, 'slotmemoria_id');
    }
    public function investigacionegenerale(){
        return $this->hasMany(Investigacionegenerale::class, 'slotmemoria_id');
    }
    public function recursoshumanosgenerale(){
        return $this->hasMany(Recursoshumanosgenerale::class, 'slotmemoria_id');
    }
    public function jefaturagenerale(){
        return $this->hasMany(Jefaturagenerale::class, 'slotmemoria_id');
    }
}

