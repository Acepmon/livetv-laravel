<?php

use function Laravel\Folio\{name};

name('errors.403');

?>

<x-layouts.marketing>
    <div class="w-full">
        <main class="grid min-h-full place-items-center bg-transparent px-6 py-24 sm:py-32 lg:px-8">
            <div class="text-center">
                <p class="text-base font-semibold text-primary-600">403</p>
                <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-200 sm:text-5xl">Forbidden</h1>
                <p class="mt-6 text-base leading-7 text-gray-600 dark:text-gray-400">You are unauthorized to access this page</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="/" class="rounded-md bg-primary-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">Go back home</a>
                    <a href="/support" class="text-sm font-semibold text-gray-900 dark:text-gray-200">Contact support <span aria-hidden="true">&rarr;</span></a>
                </div>
            </div>
        </main>
    </div>
</x-layouts>
