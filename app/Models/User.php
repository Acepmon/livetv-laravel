<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Enums\CreatorLevel;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements FilamentUser, HasAvatar, HasName
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role' => UserRole::class,
        'status' => UserStatus::class,
        'creator_level' => CreatorLevel::class,
    ];

    public function isAdmin()
    {
        return $this->role === UserRole::ADMIN;
    }

    public function isCreator()
    {
        return $this->role === UserRole::CREATOR;
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->role == UserRole::ADMIN;
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return Storage::url($this->avatar_url);
    }

    public function getFilamentName(): string
    {
        return $this->name;
    }

    public function channels()
    {
        return $this->hasMany(Channel::class);
    }
}
