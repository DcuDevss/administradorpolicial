<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class Totaldependencia extends Model
{
    use HasFactory;
    use Auditable;
    protected $fillable = ['nombre'];

    public function trabajosinformaticos()
    {

        return $this->hasMany(Totaldependencia::class, 'totaldependencia_id');
    }
}
