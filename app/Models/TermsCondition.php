<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsCondition extends Model
{
    protected $fillable = [
        'titulo',
        'version',
        'contenido',
        'activo',
        'fecha_activacion',
        'created_by',
    ];

    public function acceptances()
    {
        return $this->hasMany(UserTermsAcceptance::class);
    }

    public static function active()
    {
        return self::where('activo', true)->first();
    }
}


