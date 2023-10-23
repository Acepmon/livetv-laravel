<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum UserStatus: string implements HasLabel
{
    case ACTIVE = 'active';
    case WITHDRAWAL = 'withdrawal';
    case SUSPENDED = 'suspended';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::WITHDRAWAL => 'Withdrawal',
            self::SUSPENDED => 'Suspended',
        };
    }

    public static function getKeys(): array
    {
        return [
            self::ACTIVE->value,
            self::WITHDRAWAL->value,
            self::SUSPENDED->value,
        ];
    }
}