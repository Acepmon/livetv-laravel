@props([
  'items' => 4,
  'content' => 'vod'
])

<div class="w-full mt-6 mb-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-1 gap-y-10 sm:gap-x-2 lg:gap-x-4">
  @for ($i = 0; $i < $items; $i++)
    <x-ui.frontend.skeleton-content content="{{$content}}" />
  @endfor
</div>