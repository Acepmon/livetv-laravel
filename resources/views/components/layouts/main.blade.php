<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Used to add dark mode right away, adding here prevents any flicker -->
        <script>
            if (typeof(Storage) !== "undefined") {
                if(localStorage.getItem('dark_mode') && localStorage.getItem('dark_mode') == 'true'){
                    document.documentElement.classList.add('dark');
                }
            }
        </script>


        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <title>{{ $title ?? 'Genesis' }}</title>
    </head>
    <body class="min-h-screen antialiased bg-gray-50 dark:bg-gradient-to-b dark:from-gray-950 dark:to-gray-900 overflow-y-scroll overflow-x-hidden">
        {{ $slot }}
        <livewire:toast />
    </body>
</html>
