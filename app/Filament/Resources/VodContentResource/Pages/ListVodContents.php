<?php

namespace App\Filament\Resources\VodContentResource\Pages;

use App\Filament\Resources\VodContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVodContents extends ListRecords
{
    protected static string $resource = VodContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Upload VOD'),
        ];
    }
}
