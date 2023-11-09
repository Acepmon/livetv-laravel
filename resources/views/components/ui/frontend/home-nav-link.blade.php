@props([
    'href' => '/'
])

<a 
    {{ $attributes }} class="text-gray-700 transition-colors duration-200 ease-out bg-transparent hover:bg-gray-200/75 w-auto sm:w-full group flex flex-row items-center gap-x-1 sm:gap-x-4 rounded-lg px-2 py-1 sm:py-2 lg:py-3 text-base leading-4 sm:leading-8 font-semibold outline-none focus:bg-gray-200" 
    href="{{ $href }}"
>
    {{ $slot }}
</a>