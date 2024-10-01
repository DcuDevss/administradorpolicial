<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtrasInstitucione extends Model
{
    use HasFactory;
    protected $fillable =['nombre'];

    public function trabajosgenerale(){

        return $this->hasMany(OtrasInstitucione::class, 'otrasinstitucione_id');

    }
}
