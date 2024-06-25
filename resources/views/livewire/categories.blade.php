<div class="bg-gray-50" x-data="{ categoryMenu: true, brandMenu: false, mobileFilter: false, categoryMobileFilter: false, brandMobileFilter: false }">
    <x-mobile-filters />
    <div class="sm:hidden pt-6 px-4">
        <x-search-box />
    </div>
    <main class="screen">
        <div class="flex items-center justify-between pt-6 pb-2 border-b border-gray-200">
            <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ __('Categories') }}</h1>
            <div class="hidden sm:block w-full max-w-sm mx-auto">
                <x-search-box />
            </div>
            <!-- Sort Menu -->
            <x-sort />
        </div>
        <section aria-labelledby="products-heading" class="pt-6 pb-24">
            <h2 id="products-heading" class="sr-only">Products</h2>
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-x-4 gap-y-10">
                <!-- Filters -->
                <x-category.filters />
                <!-- Product grid -->
                <div class="lg:col-span-4">
                    @if (count($products))
                        <div class="bg-gray-50">
                            <div class="grid grid-cols-2 gap-y-10 gap-x-3 sm:grid-cols-2 lg:grid-cols-4 lg:gap-x-4">

                                @foreach ($products as $product)
                                    <x-product.card1 :product="$product" />
                                @endforeach
                                <!-- More products... -->
                            </div>
                        </div>
                    @else
                        <div class="flex justify-center items-center">
                            {{ __('Sorry!. No products available.') }}
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </main>
</div>
