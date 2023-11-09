<?php
use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{state, rules};

name('live');
?>

<x-layouts.live>
  @volt('live')
    <div class="relative flex flex-col items-center justify-center w-full h-auto overflow-hidden" x-cloak>
      <x-ui.frontend.skeleton-subheader />
      <x-ui.frontend.skeleton-collection items="8" content="live" />
      <x-ui.frontend.skeleton-promo />
      <x-ui.frontend.skeleton-collection items="8" content="live" />
    </div>
  @endvolt
</x-layouts.live>
