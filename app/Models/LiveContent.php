<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\LiveStatus;
use App\Enums\ContentVisibility;
use App\Enums\ContentAgeLimit;

class LiveContent extends Model
{
    use HasFactory;

    protected $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
        'lock_password' => 'hashed',
        'status' => LiveStatus::class,
        'visibility' => ContentVisibility::class,
        'age_limit' => ContentAgeLimit::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
