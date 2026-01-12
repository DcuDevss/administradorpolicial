<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class Investigacione extends Model
{

    use HasFactory;
    use Auditable;
    protected $fillable = ['nombre'];

    public function generalinformatica(){

        return $this->hasMany(Investigacione::class, 'investigacione_id');

    }
    public function investigacionegenerale(){
        return $this->hasMany(Investigacionesgenerale::class, 'investigacione_id');
    }
}
