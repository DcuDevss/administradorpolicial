<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class Tolhuin extends Model
{
    use HasFactory;
    use Auditable;
    protected $fillable = ['nombre'];

    public function generalinformatica()
    {

        return $this->hasMany(Tolhuin::class, 'tolhuin_id');
    }
    public function tolhuingenerale()
    {
        return $this->hasMany(Tolhuingenerale::class, 'tolhuin_id');
    }


    public function auditLabel(): string
    {
        return 'Tolhuin – ' . $this->nombre;
    }
}
