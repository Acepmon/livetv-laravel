<?php
use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{state, rules};

name('movie');
?>

<x-layouts.movie>
  @volt('movie')
    <div class="relative flex flex-col items-center justify-center w-full h-auto overflow-hidden" x-cloak>
      <x-ui.frontend.skeleton-promo />
      <x-ui.frontend.skeleton-subheader />
      <x-ui.frontend.skeleton-collection items="4" content="movie" />
      <x-ui.frontend.skeleton-subheader />
      <x-ui.frontend.skeleton-collection items="4" content="movie" />
    </div>
  @endvolt
</x-layouts.movie>
