<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;


class Cientifica extends Model
{
    use HasFactory;
    use Auditable;

    protected $fillable = ['nombre'];

    public function generalinformatica()
    {

        return $this->hasMany(Cientifica::class, 'cientifica_id');
    }
    public function investigacionegenerale()
    {

        return $this->hasMany(Investigacionesgenerale::class, 'cientifica_id');
    }
}
