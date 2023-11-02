<x-layouts.frontend>

    <div class="flex flex-row mt-2 sm:mt-6 lg:mt-8 gap-2 sm:gap-6">
        <div class="flex w-40 sm:w-48 pl-2 sm:pl-6">
            <x-ui.frontend.home-nav />
        </div>
        <div class="flex-1 pr-2 sm:pr-6 lg:pr-0 mx-auto max-w-6xl">
            {{ $slot }}
        </div>
    </div>

</x-layouts.frontend>