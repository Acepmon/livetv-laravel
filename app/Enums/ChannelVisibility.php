<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ChannelVisibility: string implements HasLabel
{
    case HIDDEN = 'hidden';
    case VISIBLE = 'visible';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::HIDDEN => 'hidden',
            self::VISIBLE => 'visible',
        };
    }

    public static function getKeys(): array
    {
        return [
            self::HIDDEN->value,
            self::VISIBLE->value,
        ];
    }
}