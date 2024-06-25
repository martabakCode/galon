    <div class="bg-gray-50" x-data="{ categoryMenu: false, brandMenu: false, mobileFilter: false, categoryMobileFilter: false, brandMobileFilter: false }">
        <x-mobile-filters />
        <main class="screen">
            <div class="sm:hidden pt-6">
                <x-search-box />
            </div>
            <div class="flex items-center justify-between pt-2 sm:pt-6 pb-2 border-b border-gray-200">
                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ __('All Products') }}
                    </h1>
                    <p class="text-xs text-gray-500">
                        {{ __('Total') }} {{ $products->count() }}+ {{ __('products') }}
                    </p>
                </div>
                <div class="hidden sm:block w-full max-w-sm mx-auto">
                    <x-search-box />
                </div>
                <!-- Sort Menu -->
                <x-sort />
            </div>
            <section aria-labelledby="products-heading" class="pt-6 pb-24">
                <h2 id="products-heading" class="sr-only">{{ __('Products') }}</h2>
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-x-8 gap-y-10">
                    <!-- Filters -->
                    <x-product.filters />
                    <!-- Product grid -->
                    <div class="lg:col-span-4">
                        <div class="bg-gray-50">
                            <div class="grid grid-cols-2 gap-y-10 gap-x-3 md:grid-cols-3 lg:grid-cols-4 lg:gap-x-4">
                                @foreach ($products as $product)
                                    <x-product.card1 :product="$product" />
                                @endforeach
                                <!-- More products... -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
