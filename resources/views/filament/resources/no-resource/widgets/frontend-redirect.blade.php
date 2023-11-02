<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex items-center justify-between gap-x-3">
            <x-ui.logo class="block w-auto text-gray-800 fill-current h-7 dark:text-gray-200" />
            <x-filament::button wire:click="gotoFronted" color="gray">
                <span>Go to Public Web</span>
            </x-filament::button>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
