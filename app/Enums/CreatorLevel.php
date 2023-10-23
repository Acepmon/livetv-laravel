<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum CreatorLevel: string implements HasLabel
{
    case GENERAL = 'general';
    case BRONZE = 'bronze';
    case SILVER = 'silver';
    case GOLD = 'gold';
    case RAINBOW = 'rainbow';
    case CROWN = 'crown';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::GENERAL => 'General',
            self::BRONZE => 'Bronze',
            self::SILVER => 'Silver',
            self::GOLD => 'Gold',
            self::RAINBOW => 'Rainbow',
            self::CROWN => 'Crown',
        };
    }

    public static function getKeys(): array
    {
        return [
            self::GENERAL->value,
            self::BRONZE->value,
            self::SILVER->value,
            self::GOLD->value,
            self::RAINBOW->value,
            self::CROWN->value,
        ];
    }
}