<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum UserRole: string implements HasLabel
{
    case ADMIN = 'admin';
    case CREATOR = 'creator';
    case USER = 'user';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ADMIN => 'Administrator',
            self::CREATOR => 'Creator',
            self::USER => 'User',
        };
    }

    public static function getKeys(): array
    {
        return [
            self::ADMIN->value,
            self::CREATOR->value,
            self::USER->value,
        ];
    }
}