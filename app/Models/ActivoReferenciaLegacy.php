<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivoReferenciaLegacy extends Model
{
    use HasFactory;

    protected $table = 'activo_referencias_legacy';

    protected $fillable = [
        'activo_id',
        'source_type',
        'source_id',
        'source_identifier',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    public function activo()
    {
        return $this->belongsTo(Activo::class);
    }
}
