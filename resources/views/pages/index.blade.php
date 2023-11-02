<?php

use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{state, rules};

name('home');
// middleware(['redirect-to-dashboard']);

?>

<x-layouts.home>

    @volt('home')
        <div class="relative flex flex-col items-center justify-center w-full h-auto overflow-hidden" x-cloak>

            <x-ui.frontend.section-best />

        </div>
    @endvolt

</x-layouts.home>
