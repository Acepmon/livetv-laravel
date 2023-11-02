<x-layouts.frontend>

    <div class="flex flex-row mt-2 sm:mt-6 lg:mt-8">
        <div class="w-full max-w-xs px-2 sm:px-6 lg:px-8">
            <x-ui.frontend.home-nav />
        </div>
        <div class="flex-1 pr-2 sm:pr-6 lg:pr-8">
            {{ $slot }}
        </div>
        {{-- <div class="w-full max-w-xs px-2 sm:px-6 lg:px-8"></div> --}}
    </div>

</x-layouts.frontend>