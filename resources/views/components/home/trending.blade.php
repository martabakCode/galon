<div aria-labelledby="trending-heading">
    <div class="py-24 sm:py-12 lg:pt-20 screen">
        <div class="md:flex md:items-center md:justify-between">
            <h2 id="favorites-heading"
                class="text-2xl font-bold tracking-tight text-center text-gray-900 uppercase sm:text-3xl sm:text-right">
                {{ __('Trending Products') }}
            </h2>
            <a href="{{ route('products') }}"
                class="hidden text-sm font-medium text-indigo-600 hover:text-indigo-500 md:block">
                {{ __('Shop the collection') }}
                @if (App::getLocale() == 'en')
                    <span aria-hidden="true">&rarr;</span>
                @else
                    <span aria-hidden="true">&larr;</span>
                @endif
            </a>
        </div>

        <div class="grid grid-cols-2 mt-6 gap-x-4 gap-y-10 sm:gap-x-6 md:grid-cols-4 md:gap-y-6 lg:gap-x-8">
            @foreach ($products as $product)
                <x-product.card3 :product="$product" />
            @endforeach
        </div>

        {{-- <div class="mt-8 text-sm md:hidden">
            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Shop the collection<span
                    aria-hidden="true"> →</span></a>
        </div> --}}
    </div>
</div>
