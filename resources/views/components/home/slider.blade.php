<div class="swiper mainSwiper">
    <div class="swiper-wrapper">
        @foreach ($slides as $slide)
            <div class="swiper-slide">
                <img class="object-fill w-full h-52 sm:h-[30rem]" src="{{ asset('storage/' . $slide) }}" alt="" />
            </div>
        @endforeach
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>
