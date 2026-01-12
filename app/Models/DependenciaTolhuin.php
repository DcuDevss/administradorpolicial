<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class DependenciaTolhuin extends Model
{
    use HasFactory;
    use Auditable;
    protected $fillable = ['nombre'];

    public function trabajosgenerale()
    {

        return $this->hasMany(DependenciaTolhuin::class, 'dependencia_tolhuin_id');
    }

    public function trabajosinformatico()
    {

        return $this->hasMany(DependenciaTolhuin::class, 'dependencia_tolhuin_id');
    }

    public function auditLabel(): string
    {
        return 'Tolhuin – ' . $this->nombre;
    }
}
