<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum LiveStatus: string implements HasLabel
{
    case STANDBY = 'standby';
    case STARTED = 'started';
    case ENDED = 'ended';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::STANDBY => 'Standby',
            self::STARTED => 'Live Started',
            self::ENDED => 'Live Ended',
        };
    }

    public static function getKeys(): array
    {
        return [
            self::STANDBY->value,
            self::STARTED->value,
            self::ENDED->value,
        ];
    }
}