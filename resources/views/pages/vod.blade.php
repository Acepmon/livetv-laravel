<?php
use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{state, rules};

name('vod');
?>

<x-layouts.vod>
  @volt('vod')
    <div class="relative flex flex-col items-center justify-center w-full h-auto overflow-hidden" x-cloak>
      <x-ui.frontend.skeleton-promo />
      <x-ui.frontend.skeleton-subheader />
      <x-ui.frontend.skeleton-collection items="8" content="vod" />
      <x-ui.frontend.skeleton-subheader />
      <x-ui.frontend.skeleton-collection items="4" content="short" />
    </div>
  @endvolt
</x-layouts.vod>
