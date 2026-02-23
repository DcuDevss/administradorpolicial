<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class DependenciaRiogrande extends Model
{
    use HasFactory;
    use Auditable;

    protected $fillable = ['nombre'];

    //Relación uno a muchos
    public function trabajosgenerale()
    {

        return $this->hasMany(DependenciaRiogrande::class, 'dependencia_rg_id');
    }

    // 🔍 Cómo se muestra en auditoría
    public function auditLabel(): string
    {
        return $this->nombre;
    }
}
