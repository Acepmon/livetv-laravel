<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\VodStatus;
use App\Enums\ContentVisibility;
use App\Enums\ContentAgeLimit;
use Illuminate\Support\Str;

class VodContent extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'status' => VodStatus::class,
        'visibility' => ContentVisibility::class,
        'age_limit' => ContentAgeLimit::class,
    ];

    public static function generateContentId()
    {
        // TODO: generate content id
        return Str::random(6);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
