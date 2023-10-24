<?php

namespace App\Filament\Resources\VodContentResource\Pages;

use App\Filament\Resources\VodContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVodContent extends EditRecord
{
    protected static string $resource = VodContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
