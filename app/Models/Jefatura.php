<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class Jefatura extends Model
{
    use HasFactory, Auditable;
    protected $fillable = ['nombre'];

    public function generalinformatica()
    {

        return $this->hasMany(Jefatura::class, 'jefatura_id');
    }
    public function jefaturagenerale()
    {
        return $this->hasMany(Jefaturagenerale::class, 'jefatura_id');
    }
}
