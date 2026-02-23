<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class Sumario extends Model
{
    use HasFactory;
    use Auditable;
    protected $fillable = ['nombre'];

    public function recursoshumanosgenerale()
    {
        return $this->hasMany(Recursoshumanosgenerale::class, 'sumario_id');
    }
}
