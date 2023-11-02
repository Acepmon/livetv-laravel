<?php
 
namespace App\Filament\Pages;

use App\Filament\Resources\NoResource\Widgets\FrontendRedirect;
use Filament\Pages\Dashboard as FilamentDashboard;

class Dashboard extends FilamentDashboard
{
    protected static string $routePath = '/';
    protected static ?string $title = 'Dashboard';
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';

    protected function getFooterWidgets(): array
    {
        return [
            FrontendRedirect::class
        ];
    }
}