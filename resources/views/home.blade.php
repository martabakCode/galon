<x-guest-layout>

@if(config('global.layout')==='basic')
    <x-home.slider />
    <x-home.about />
    <x-home.categories />
    <x-home.trending />
    {{-- <x-home.features /> --}}
    <x-home.products />
    <x-home.brands />
    <x-home.branches />
     <div class="relative w-full h-96">
        <iframe class="absolute top-0 left-0 w-full h-full"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126646.25766458834!2d112.63028236673853!3d-7.275441719017681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf8381ac47f%3A0x3027a76e352be40!2sSurabaya%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1719286637259!5m2!1sid!2sid"
            frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
        </iframe>
    </div>
@else
    <x-home.slider />
    <x-home.trending />
    <x-home.about />
    {{-- <x-home.features /> --}}
    <x-home.products />
     <x-home.categories />
    <x-home.brands />
    <div class="relative w-full h-96">
        <iframe class="absolute top-0 left-0 w-full h-full"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126646.25766458834!2d112.63028236673853!3d-7.275441719017681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf8381ac47f%3A0x3027a76e352be40!2sSurabaya%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1719286637259!5m2!1sid!2sid"
            frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
        </iframe>
    </div>
@endif
    <!-- Swiper JS -->
    <script>
        var mainSwiper = new Swiper(".mainSwiper", {
            init: true,
            speed: 3000,
            // direction: 'horizontal',
            // loop: true,
            preloadImages: true,

            cssMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            mousewheel: true,
            keyboard: true,
            slidesPerView: 'auto'
        });
        mainSwiper.autoplay.start();

        var productsSwiper = new Swiper(".productsSwiper", {
            init: true,
            speed: 3000,
            // direction: 'horizontal',
            // loop: true,
            preloadImages: true,

            cssMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            mousewheel: true,
            keyboard: true,
            slidesPerView: 1,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 4,

                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 4,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 4,
                },
            }
        });
        productsSwiper.autoplay.start();
    </script>
</x-guest-layout>
