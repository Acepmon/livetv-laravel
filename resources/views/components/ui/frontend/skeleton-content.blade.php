@props([
  'content' => 'vod'
])

@if ($content === 'vod' || $content === 'live')
  <div class="w-full animate-pulse flex flex-col space-y-4">
    <div class="aspect-w-16 aspect-h-9 bg-slate-300 rounded-lg"></div>
    <div class="flex flex-row space-x-4">
      <div class="rounded-full bg-slate-300 h-10 w-10"></div>
      <div class="flex-1 space-y-4 py-1">
        <div class="h-2 bg-slate-300 rounded"></div>
        <div class="space-y-2">
          <div class="grid grid-cols-3 gap-4">
            <div class="h-2 bg-slate-300 rounded col-span-1"></div>
            <div class="h-2 bg-slate-300 rounded col-span-1"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@elseif ($content === 'short')
  <div class="w-full animate-pulse flex flex-col space-y-4">
    <div class="aspect-w-9 aspect-h-16 bg-slate-300 rounded-lg"></div>
  </div>
@elseif ($content === 'movie')
  <div class="w-full animate-pulse flex flex-col space-y-4">
    <div class="aspect-w-2 aspect-h-3 bg-slate-300 rounded-lg"></div>
    <div class="flex flex-row space-x-4">
      <div class="flex-1 space-y-4 py-1">
        <div class="h-2 bg-slate-300 rounded"></div>
        <div class="space-y-2">
          <div class="grid grid-cols-3 gap-4">
            <div class="h-2 bg-slate-300 rounded col-span-1"></div>
            <div class="h-2 bg-slate-300 rounded col-span-1"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif