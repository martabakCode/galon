<div class="bg-gray-100 mt-10">
    <div class="py-10 screen">
        <h2 class="pb-2 text-2xl font-bold tracking-tight text-center text-gray-900 uppercase sm:text-3xl">
            {{ __('Brands') }}
        </h2>
        <p class="text-base tracking-wide text-center text-gray-500">{{ __('Trusted by many branded markets.') }}</p>
        <div class="grid grid-cols-2 gap-8 mt-6 md:grid-cols-6 lg:grid-cols-5">
            @foreach ($brands as $brand)
                <a href="{{ route('brand', $brand->getTranslation('slug', App::getLocale())) }}"
                    class="flex justify-center col-span-1 md:col-span-2 md:col-start-2 lg:col-span-1">
                    <img class="h-12 hover:shadow-xl" src="{{ $brand->image() }}"
                        alt="{{ $brand->getTranslation('name', App::getLocale()) }}">
                </a>
            @endforeach
        </div>
    </div>
</div>
