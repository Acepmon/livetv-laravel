<?php

namespace App\Filament\Resources\LiveContentResource\Pages;

use App\Filament\Resources\LiveContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLiveContent extends EditRecord
{
    protected static string $resource = LiveContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
