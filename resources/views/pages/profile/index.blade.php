<?php

use function Laravel\Folio\{middleware, name};
//use function Livewire\Volt\{state};

name('profile');
middleware(['auth', 'verified']);

?>

<x-layouts.app>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    @volt('profile')
        <div class="h-full py-12">
            <div class="h-full mx-auto max-w-7xl sm:px-6 lg:px-8">
                
                <div class="relative min-h-[500px] w-full h-full">
                    <x-ui.placeholder />
                </div>

            </div>
        </div>
    @endvolt
</x-layouts.app>