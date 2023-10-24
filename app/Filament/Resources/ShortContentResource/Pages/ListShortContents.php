<?php

namespace App\Filament\Resources\ShortContentResource\Pages;

use App\Filament\Resources\ShortContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShortContents extends ListRecords
{
    protected static string $resource = ShortContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Upload Short'),
        ];
    }
}
