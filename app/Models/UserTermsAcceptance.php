<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTermsAcceptance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'terms_condition_id',
        'accepted_at',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function termsCondition()
    {
        return $this->belongsTo(TermsCondition::class);
    }
    }
