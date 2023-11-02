@props([
    'href' => '/'
])

<a 
    {{ $attributes }} class="text-gray-700 transition-colors duration-200 ease-out bg-transparent hover:bg-gray-200/75 w-full group flex items-center gap-x-4 rounded-lg px-2 py-1 sm:py-2 lg:py-3 text-base leading-6 sm:leading-8 font-semibold" 
    href="{{ $href }}"
>
    {{ $slot }}
</a>