<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class Destacamento extends Model
{
    use HasFactory;
    use Auditable;
    protected $fillable = ['nombre'];

    public function generalinformatica()
    {

        return $this->hasMany(Destacamento::class, 'destacamento_id');
    }
}
