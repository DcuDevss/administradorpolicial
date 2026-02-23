<?php

/*namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administracion extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    public function generalinformatica(){

        return $this->hasMany(Administracion::class, 'administracion_id');

    }
    public function administraciongenerale(){

        return $this->hasMany(Administracion::class, 'administracion_id');

    }
}*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class Administracion extends Model
{
    use HasFactory;
    use Auditable;
    protected $fillable = ['nombre'];

    public function generalinformatica()
    {
        return $this->hasMany(Generalinformatica::class, 'administracion_id');
    }

    public function administraciongenerale()
    {
        return $this->hasMany(Administraciongenerale::class, 'administracion_id');
    }
}
