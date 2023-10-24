<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ContentAgeLimit: string implements HasLabel
{
    case ALL = 'all';
    case ADULT = 'adult';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ALL => 'All ages',
            self::ADULT => 'Adult only',
        };
    }

    public static function getKeys(): array
    {
        return [
            self::ALL->value,
            self::ADULT->value,
        ];
    }
}