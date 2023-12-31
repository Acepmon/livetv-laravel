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

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'avatar_url' => '/assets/images/default-avatar.svg',
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
        if (empty($this->avatar_url)) {
            return url('/assets/images/default-avatar.svg');
        }

        return $this->avatar_url;
    }

    public function getFilamentName(): string
    {
        return $this->name;
    }

    public function channels()
    {
        return $this->hasMany(Channel::class);
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

    public function getRoleHomeRoute()
    {
        if ($this->role == UserRole::ADMIN) {
            return 'filament.admin.pages.dashboard';
        } else if ($this->role == UserRole::CREATOR) {
            return 'studio';
        } else {
            return 'profile';
        }
    }
}
