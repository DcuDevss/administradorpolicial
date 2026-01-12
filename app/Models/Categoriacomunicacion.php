<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class Categoriacomunicacion extends Model
{
    use HasFactory;
    use Auditable;

    protected $fillable = ['name'];

    public function comunicacionesdcus()
    {
        return $this->hasMany(Comunicacionesdcu::class, 'categoriacomunicacion_id');
    }
}
