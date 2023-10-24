<?php

namespace App\Filament\Resources\LiveContentResource\Pages;

use App\Filament\Resources\LiveContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLiveContents extends ListRecords
{
    protected static string $resource = LiveContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // 
        ];
    }
}
