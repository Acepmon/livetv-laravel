@props([
    'type' => 'default', 
    'size' => 'md', 
    'tag' => 'button',
    'href' => '/',
    'submit' => false,
    'rounded' => 'full'
])

@php
switch ($tag ?? 'button') {
    case 'button':
        $tagAttr = ($submit) ? 'button type="submit"' : 'button type="button"';
        $tagClose = 'button';
        break;
    case 'a':
        $link = $href ?? '';
        $tagAttr = 'a  href="' . $link . '"';
        $tagClose = 'a';
        break;
    default:
        $tagAttr = 'button type="button"';
        $tagClose = 'button';
        break;
}
@endphp

<{!! $tagAttr !!} {!! $attributes->except(['class']) !!} class="text-gray-700 hover:bg-gray-200/75 w-full group flex items-center gap-x-4 rounded-lg px-2 py-1 sm:py-2 lg:py-3 text-base leading-6 sm:leading-8 font-semibold">
    {{ $slot }}
</{{ $tagClose }}>