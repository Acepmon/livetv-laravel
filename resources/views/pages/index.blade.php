<?php

use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{state, rules};

name('home');
?>

<x-layouts.home>
  @volt('home')
    <div class="relative flex flex-col items-center justify-center w-full h-auto overflow-hidden" x-cloak>
      <x-ui.frontend.skeleton-promo />
      <x-ui.frontend.skeleton-subheader />
      <x-ui.frontend.skeleton-collection items="4" content="live" />
      <x-ui.frontend.skeleton-subheader />
      <x-ui.frontend.skeleton-collection items="4" content="movie" />
      <x-ui.frontend.skeleton-subheader />
      <x-ui.frontend.skeleton-collection items="4" content="short" />
      <x-ui.frontend.skeleton-subheader />
      <x-ui.frontend.skeleton-collection items="8" content="vod" />

      <x-ui.frontend.section-best />
      <x-ui.frontend.section-promo />
      <x-ui.frontend.section-best-live />
      <x-ui.frontend.section-best-vod />
    </div>
  @endvolt
</x-layouts.home>
