<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'age',
        'height',
        'weight',
        'gender',
        'activity_level',
        'dietary_preference',
        'goal',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}