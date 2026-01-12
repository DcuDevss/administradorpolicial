<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;

class Appointment extends Model
{
    use HasFactory;
    use Auditable;
    protected $fillable = ['user_id', 'start_time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
