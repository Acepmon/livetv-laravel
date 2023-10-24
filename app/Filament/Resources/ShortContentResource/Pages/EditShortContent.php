<?php

namespace App\Filament\Resources\ShortContentResource\Pages;

use App\Filament\Resources\ShortContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShortContent extends EditRecord
{
    protected static string $resource = ShortContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
