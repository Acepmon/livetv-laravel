<x-layouts.frontend>
  <div class="flex flex-col sm:flex-row gap-2 sm:gap-6 px-0 sm:px-6 lg:px-8">
    <div class="flex w-full sm:w-32 md:w-48 lg:w-56">
      <x-ui.frontend.home-nav />
    </div>
    <div class="flex-1 mx-auto max-w-5xl px-2 sm:px-0">
      {{ $slot }}
    </div>
  </div>
</x-layouts.frontend>