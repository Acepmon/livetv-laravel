<?php

namespace App\Filament\Resources\NoResource\Widgets;

use Filament\Widgets\Widget;

class FrontendRedirect extends Widget
{
    protected static string $view = 'filament.resources.no-resource.widgets.frontend-redirect';

    public function gotoFronted()
    {
        return redirect()->away(url('/'));
    }
}
