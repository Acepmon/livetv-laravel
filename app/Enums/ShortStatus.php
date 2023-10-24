<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ShortStatus: string implements HasLabel
{
    case SETUP = 'setup';
    case UPLOADING = 'uploading';
    case ENCODING = 'encoding';
    case COMPLETE = 'complete';
    case FAILED = 'failed';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SETUP => 'Setting up',
            self::UPLOADING => 'Content Uploading',
            self::ENCODING => 'Content Encoding',
            self::COMPLETE => 'Content Ready',
            self::FAILED => 'Setup Failed',
        };
    }

    public static function getKeys(): array
    {
        return [
            self::SETUP->value,
            self::UPLOADING->value,
            self::ENCODING->value,
            self::COMPLETE->value,
            self::FAILED->value,
        ];
    }
}