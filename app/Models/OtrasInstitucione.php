<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class OtrasInstitucione extends Model
{
    use HasFactory;
    use Auditable;
    protected $fillable = ['nombre'];

    public function trabajosgenerale()
    {

        return $this->hasMany(OtrasInstitucione::class, 'otrasinstitucione_id');
    }
}
