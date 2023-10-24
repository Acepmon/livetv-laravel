<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\ChannelVisibility;

class Channel extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'visibility' => ChannelVisibility::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function liveContents()
    {
        return $this->hasMany(LiveContent::class);
    }

    public function vodContents()
    {
        return $this->hasMany(VodContent::class);
    }

    public function shortContents()
    {
        return $this->hasMany(ShortContent::class);
    }
}
