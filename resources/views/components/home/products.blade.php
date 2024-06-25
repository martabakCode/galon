<div class="py-10 bg-white">
    <div class="pt-4 sm:pt-6 screen">
        <h2 class="mb-8 text-2xl font-bold text-center uppercase sm:text-3xl sm:rtl:text-right sm:ltr:text-left">
            {{ __('From Our Products') }}
        </h2>
        <div class="swiper productsSwiper">
            <div class="swiper-wrapper">
                @foreach ($from_products as $product)
                    <div class="swiper-slide">
                        <a href="{{ route('product.view', $product->getTranslation('slug', App::getLocale())) }}">
                            <img class="object-cover w-full h-40" src="{{ $product->image() }}"
                                alt="{{ $product->getTranslation('name', App::getLocale()) }}" />
                        </a>
                    </div>
                @endforeach

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
