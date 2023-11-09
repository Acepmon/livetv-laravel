@props([
  'slides' => []
])

<div class="mx-auto w-full max-w-lg sm:max-w-xl md:max-w-3xl lg:max-w-5xl xl:max-w-7xl">
  <swiper-container slides-per-view="1" autoplay="true" speed="500" loop="true" effect="coverflow" navigation="true">
    @foreach ($slides as $slide)
      <swiper-slide>
        <div class="group aspect-w-16 aspect-h-9 overflow-hidden rounded-lg relative">
          <img src="{{ $slide['image'] }}" alt="Cover Image" class="object-cover object-center transition-opacity group-hover:opacity-75">
          <div aria-hidden="true" class="bg-gradient-to-b from-transparent to-black opacity-50"></div>
          <div class="flex items-end p-6">
            <div>
              <h3 class="font-semibold text-white">
                <a href="{{ route('movie') }}">
                  <span class="absolute inset-0"></span>
                  {{ $slide['title'] }}
                </a>
              </h3>
              <div class="flex flex-row gap-1.5 items-center mt-1">
                <p aria-hidden="true" class="text-base text-white">{{ $slide['name'] }}</p>
                <span class="text-white text-sm">•</span>
                <p aria-hidden="true" class="text-sm text-white">{{ $slide['desc'] }}</p>
              </div>
            </div>
          </div>
        </div>
      </swiper-slide>
    @endforeach
  </swiper-container>
</div>