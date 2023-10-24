<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ContentVisibility: string implements HasLabel
{
    case PRIVATE = 'private';
    case PUBLIC = 'public';
    case SUBSCRIBER = 'subscriber';
    case PREMIUM = 'premium';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PRIVATE => 'Private',
            self::PUBLIC => 'Public',
            self::SUBSCRIBER => 'Subscriber only',
            self::PREMIUM => 'Premium members',
        };
    }

    public static function getKeys(): array
    {
        return [
            self::PRIVATE->value,
            self::PUBLIC->value,
            self::SUBSCRIBER->value,
            self::PREMIUM->value,
        ];
    }
}