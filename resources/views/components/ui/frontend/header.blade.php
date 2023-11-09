@php
  $navLinks = [
    'HOME' => 'home',
    'LIVE' => 'live',
    'VOD' => 'vod',
    'MOVIE' => 'movie',
  ];
  $currentRoute = Route::getCurrentRoute();
@endphp

<nav class="z-20 bg-white shadow fixed top-0 left-0 right-0">
  <div class="mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 justify-between">
      <div class="flex flex-shrink-0 items-center ml-12 sm:ml-0">
        <a href="{{ route('home') }}" class="flex items-center shrink-0">
          <x-ui.logo class="block w-auto text-gray-800 fill-current h-8 dark:text-gray-200" />
        </a>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch">
        <div class="hidden sm:ml-6 sm:flex sm:space-x-8"> 
          @foreach($navLinks as $title => $route)
            <a href="{{ route($route) }}" class="inline-flex items-center group border-b-2 {{ $currentRoute->getName() == $route ? 'border-primary-500' : 'border-transparent' }} px-1 pt-1">
              <span class="rounded-lg p-3 text-base font-medium {{ $currentRoute->getName() == $route ? 'text-primary-600' : 'group-hover:bg-gray-100 group-focus:bg-gray-200 text-gray-900' }}">{{ $title }}</span>
            </a>
          @endforeach
        </div>
      </div>

      @auth
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          {{-- <button type="button" class="relative rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
          </button> --}}

          <!-- Profile dropdown -->
          <div class="flex items-center">
            <div class="hidden w-[38px] h-[38px] overflow-hidden rounded-full sm:block" x-cloak>
              <x-ui.light-dark-switch></x-ui.light-dark-switch>
            </div>

            <!-- User Dropdown -->
            <div x-data="{ dropdownOpen: false }"
              :class="{ 'block z-50 w-full sm:p-4 bg-white dark:bg-gray-900 dark:border-gray-800' : open, 'hidden': ! open }"
              class="relative flex-shrink-0 sm:p-0 sm:flex sm:w-auto sm:bg-transparent sm:items-center sm:ml-1.5"
              x-cloak
            >
              <button @click="dropdownOpen=!dropdownOpen" class="group inline-flex items-center justify-between w-full sm:px-3.5 sm:py-2 py-1 px-4 text-sm font-medium text-gray-500 transition duration-0 bg-white border-transparent sm:border rounded-full dark:text-white/70 dark:hover:text-gray-100 dark:bg-transparent dark:hover:bg-gray-800/70 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                {{-- <div>{{ Auth::user()->name }}</div>
                <div class="ml-1">
                  <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                </div> --}}
                <img src="{{ Auth::user()->avatar_url }}" alt="" class="h-8 w-auto group-hover:contrast-125 transition">
              </button>
              <div x-show="dropdownOpen" @click.away="dropdownOpen=false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 sm:scale-95" x-transition:enter-end="transform opacity-100 sm:scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 sm:scale-100" x-transition:leave-end="transform opacity-0 sm:scale-95" 
                class="absolute top-0 right-0 z-50 w-full mt-16 sm:mt-12 sm:origin-top-right sm:w-40" x-cloak>
                <div class="p-4 pt-0 mt-1 space-y-3 text-gray-600 bg-white dark:text-white/70 dark:bg-gray-900 dark:shadow-xl sm:p-2 sm:space-y-0.5 sm:border sm:shadow-md sm:rounded-lg border-gray-200/70 dark:border-white/10">
                  @if (Auth::user()->isAdmin())
                  <a href="{{ route('filament.admin.pages.dashboard') }}" class="relative flex cursor-pointer hover:text-gray-700 dark:hover:text-white/70 select-none hover:bg-gray-100/70 dark:hover:bg-gray-800/80 items-center rounded-full py-2 px-4 sm:px-2.5 sm:py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z" />
                    </svg>                    
                    <span>Admin Panel</span>
                  </a>
                  @endif
                  <a href="{{ route('profile.edit') }}" class="relative flex cursor-pointer hover:text-gray-700 dark:hover:text-white/70 select-none hover:bg-gray-100/70 dark:hover:bg-gray-800/80 items-center rounded-full py-2 px-4 sm:px-2.5 sm:py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    <span>Edit Profile</span>
                  </a>
                  <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button onclick="event.preventDefault(); this.closest('form').submit();" class="relative w-full flex cursor-pointer hover:text-gray-700 dark:hover:text-white/70 select-none hover:bg-gray-100/70 dark:hover:bg-gray-800/80 items-center rounded-full py-2 px-4 sm:px-2.5 sm:py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" x2="9" y1="12" y2="12"></line></svg>
                      <span>Log out</span>
                    </button>
                  </form>
                </div>
              </div>
            </div>

            <!-- Mobile Switch and Hamburger -->
            <div :class="{ 'right-4' : open, 'right-0' : !open }" class="absolute top-0 flex items-center mt-3 space-x-2 sm:right-0 sm:hidden">
              <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                  <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                  <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
          </div>
        </div>
      @else
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0 gap-2">
          <x-ui.button type="secondary" tag="a" href="{{ route('login') }}">Sign in</x-ui.button>
          <x-ui.button type="primary" tag="a" href="{{ route('register') }}">Register</x-ui.button>
        </div>
      @endauth
    </div>
  </div>

  <div class="sm:hidden flex items-center justify-center mx-auto px-2">
    <div class="flex w-full justify-between"> 
      @foreach($navLinks as $title => $route)
        <a href="{{ route($route) }}" class="inline-flex items-center group border-b-2 {{ $currentRoute->getName() == $route ? 'border-primary-500' : 'border-transparent' }} px-1 pt-1">
          <span class="rounded-lg py-2 px-6 text-base font-medium {{ $currentRoute->getName() == $route ? 'text-primary-600' : 'group-hover:bg-gray-100 group-focus:bg-gray-200 text-gray-900' }}">{{ $title }}</span>
        </a>
      @endforeach
    </div>
  </div>
</nav>
