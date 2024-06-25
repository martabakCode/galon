<div class="bg-white">
    <div class="screen min-h-[270px] py-16 sm:py-24">
        @if ($product)
            <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
                <!-- Image gallery -->
                @livewire('product.images', ['media' => $product->media()])
                <!-- Product info -->
                <div class="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
                    <h2 class="sr-only">{{ __('Product information') }}</h2>
                    <nav aria-label="Breadcrumb" class="pb-4">
                        <ol role="list" class="flex items-center space-x-2">
                            @foreach ($breadcrumb as $bread)
                                <li>
                                    <div class="flex items-center text-sm">
                                        <a href="{{ route('category', $bread->getTranslation('slug', App::getLocale())) }}"
                                            class="font-medium text-gray-500 hover:text-gray-900">
                                            {{ $bread->getTranslation('name', App::getLocale()) }} </a>
                                        @if (!$loop->last)
                                            <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" aria-hidden="true"
                                                class="h-5 w-5 flex-shrink-0 text-gray-300">
                                                <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                                            </svg>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                    </nav>
                    <h1 class="text-xl font-semibold uppercase tracking-tight text-gray-900 sm:text-2xl">
                        {{ $product->getTranslation('name', App::getLocale()) }}
                    </h1>
                    @if ($product->price > 0)
                        <div class="mt-2 flex items-center text-2xl text-gray-900">
                            <x-currency :amount="$product->price" />
                        </div>
                    @else
                        <div class="mt-3 w-40 rtl:text-right">
                            <a target="_blank"
                                href="{{ 'https://wa.me/' . config('global.whatsapp') . '?text=' . route('product.view', $product->getTranslation('slug', App::getLocale())) }}"
                                class="flex flex-row-reverse items-center justify-center rounded-md border py-1.5 px-2 text-base font-medium text-green-600 hover:border-transparent hover:bg-green-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50">
                                <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512">
                                    <path
                                        d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z">
                                    </path>
                                </svg>
                                <p class="ltr:mr-4 rtl:ml-4">{{ __('Ask Price') }}</p>
                            </a>
                        </div>
                    @endif
                    <!-- Reviews -->
                    @if ($product->reviews)
                        <div class="my-3 text-indigo-600">
                            <x-stars :stars="$product->stars()->stars" />
                        </div>
                    @endif
                    @if ($product->brand_id > 1)
                        <a href="{{ route('brand', $product->brand->getTranslation('slug', App::getLocale())) }}"
                            class="mt-3 italic text-indigo-600">
                            {{ $product->brand->getTranslation('name', App::getLocale()) }}
                        </a>
                    @endif
                    <div class="mt-6">
                        <h3 class="sr-only">{{ __('Short description') }}</h3>
                        <div class="space-y-6 text-base text-gray-700">
                            {!! $product->excerpt !!}
                        </div>
                    </div>
                    <form class="mt-6">

                        <span class="relative z-0 mt-6 inline-flex rounded-md shadow-sm">
                            @auth
                                @if (auth()->user()->favouriteProduct($product->id))
                                    <button type="button" wire:click="AddToFavourite({{ $product->id }})"
                                        class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-1 text-sm font-medium text-red-700 hover:bg-gray-50 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 ltr:rounded-l-md rtl:rounded-r-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="h-6 w-6">
                                            <path
                                                d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                        </svg>
                                    </button>
                                @else
                                    <button type="button" wire:click="AddToFavourite({{ $product->id }})"
                                        class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-1 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 ltr:rounded-l-md rtl:rounded-r-md">
                                        <svg class="h-6 w-6 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                @endif

                            @endauth
                            @if ($product->stock > 0)
                                <button type="button" wire:click="addToCart({{ $product->id }})"
                                    class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-1 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 ltr:-ml-px rtl:-mr-px">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                    </svg>
                                    <p class="ltr:ml-4 rtl:mr-4 sm:block">{{ __('Add To Cart') }}</p>
                                </button>

                                <button type="button" wire:click="buyNow({{ $product->id }})"
                                    class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 ltr:-ml-px ltr:rounded-r-md rtl:-mr-px rtl:rounded-l-md">
                                    <p class="">{{ __('Buy Now') }}</p>
                                </button>
                            @else
                                <div type="button"
                                    class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-red-700 hover:bg-gray-50 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 ltr:-ml-px ltr:rounded-r-md rtl:-mr-px rtl:rounded-l-md">
                                    <p class="">{{ __('Out of stock') }}</p>
                                </div>
                            @endif
                        </span>
                    </form>

                    {{-- @livewire('product.additional-info') --}}
                </div>
            </div>
            <div class="mt-10" x-data="{
                activeTab: 1,
                activeClass: 'border-indigo-600 text-indigo-600',
                inactiveClass: 'border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300'
            }">
                <div class="flex space-x-8 border-b border-gray-200 rtl:space-x-reverse" aria-orientation="horizontal"
                    role="tablist">
                    <button type="button" id="tab-reviews" x-on:click="activeTab = 1"
                        class="whitespace-nowrap border-b-2 py-6 text-sm font-medium"
                        :class="activeTab === 1 ? activeClass : inactiveClass">{{ __('Description') }}
                    </button>
                    {{-- <button type="button" id="tab-specifications" x-on:click="activeTab = 2"
                        class="py-6 text-sm font-medium border-b-2 whitespace-nowrap"
                        :class="activeTab === 2 ? activeClass : inactiveClass">{{ __('Specifications') }}
                    </button>
                    <button type="button" id="tab-features" x-on:click="activeTab = 3"
                        class="py-6 text-sm font-medium border-b-2 whitespace-nowrap"
                        :class="activeTab === 3 ? activeClass : inactiveClass">{{ __('Features') }}
                    </button> --}}
                    @if ($product->reviews)
                        <button type="button" id="tab-reviews" x-on:click="activeTab = 4"
                            class="whitespace-nowrap border-b-2 py-6 text-sm font-medium"
                            :class="activeTab === 4 ? activeClass : inactiveClass">{{ __('Reviews') }}
                        </button>
                    @endif
                </div>
                <div id="tab-panel-reviews" x-show="activeTab === 1" class="my-5">
                    {!! $product->description !!}
                </div>
                {{-- <div id="tab-panel-specifications" x-show="activeTab === 2" class="my-5" x-cloak>
                    <x-product.specifications />
                </div>
                <div id="tab-panel-features" x-show="activeTab === 3" class="my-5" x-cloak>
                    <x-product.features />
                </div> --}}
                <div id="tab-panel-reviews" x-show="activeTab === 4" class="my-5" x-cloak>
                    <x-product.reviews :product="$product" />
                </div>
            </div>

            <!-- Similar products -->
            <div class="mt-2 border-t">
                @if (!empty($similars) && count($similars))
                    <div class="mt-10 bg-white">
                        <h2
                            class="text-center text-xl font-semibold text-gray-900 sm:text-2xl ltr:sm:text-left rtl:sm:text-right">
                            {{ __('Similar Products') }}
                        </h2>
                        <div
                            class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 md:grid-cols-3 lg:grid-cols-5 xl:gap-x-8">
                            @foreach ($similars as $similar)
                                <x-product.card2 :product="$similar" />
                            @endforeach
                            <!-- More products... -->
                        </div>
                    </div>
                @endif
            </div>
        @else
            <div class="flex justify-center font-semibold">
                {{ __('Sorry!. This product is not Available.') }}
            </div>
        @endif
    </div>
</div>
