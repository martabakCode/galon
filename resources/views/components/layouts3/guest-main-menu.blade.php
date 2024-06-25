<div class="font-droidBold hidden border-b border-gray-200 bg-white shadow sm:block">
    <!-- bg-[#ed1c24] -->
    <div class="screen">
        <div class="flex flex-col pb-1">
            <div class="flex items-center justify-between py-2">
                <!-- Logo -->
                <a href="/" class="flex flex-shrink-0 items-center">
                    <img class="block h-10 w-auto"
                        src="{{ asset('storage/' . config('global.logo_' . App::getLocale())) }}"
                        alt="{{ config('global.name_' . App::getLocale()) }}" />
                </a>
                <div class="flex justify-center pt-3">
                    <div
                        class="flex w-full justify-between font-medium rtl:space-x-reverse sm:space-x-2 md:space-x-4 lg:space-x-6">

                        <a href="/" class="{!! Route::is('home') ? 'border-b border-sky-700' : 'border-b border-white hover:border-gray-200' !!} inline-flex items-center justify-center pb-2">
                            {{ __('Shop') }}
                        </a>

                        <a href="{{ route('categories') }}"
                            class="{!! Route::is('categories') ? 'border-b border-sky-700' : 'border-b border-white hover:border-gray-200' !!} inline-flex items-center justify-center pb-2">
                            {{ __('Categories') }}
                        </a>
                        <a href="{{ route('brands') }}"
                            class="{!! Route::is('brands') ? 'border-b border-sky-700' : 'border-b border-white hover:border-gray-200' !!} inline-flex items-center justify-center pb-2">
                            {{ __('Brands') }}
                        </a>
                        <a href="{{ route('products') }}"
                            class="{!! Route::is('products') ? 'border-b border-sky-700' : 'border-b border-white hover:border-gray-200' !!} inline-flex items-center justify-center pb-2">
                            {{ __('Products') }}
                        </a>
                        {{-- <a href="{{ route('featured') }}" x-on:click="activeMenu = 4"
                        class="inline-flex items-center justify-center py-4 text-sm font-medium ltr:border-r rtl:border-l hover:bg-gray-100"
                        :class="activeMenu === 4 ? activeMenuClass : inactiveMenuClass"> {{ __('Featured') }}
                    </a> --}}
                        <a href="{{ route('promotions') }}"
                            class="{!! Route::is('promotions') ? 'border-b border-sky-700' : 'border-b border-white hover:border-gray-200' !!} inline-flex items-center justify-center pb-2 text-sm font-medium">
                            {{ __('Promotions') }}
                        </a>
                    </div>
                </div>

                <div class="flex space-x-1 rtl:space-x-reverse">
                    @auth
                        <a href="{{ route('favourites') }}" class="group -m-2 flex items-center p-2">
                            <svg class="h-6 w-6 flex-shrink-0 text-gray-700 group-hover:text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            <span class="text-sm font-medium text-gray-700 group-hover:text-gray-500 ltr:ml-1 rtl:mr-1">
                                @livewire('favourites-count')
                            </span>
                            {{-- <span class="sr-only">items in cart, view bag</span> --}}
                        </a>
                    @endauth
                    <button x-on:click="cartOpen = ! cartOpen" class="group -m-2 flex items-center p-2"
                        x-on:click.away="cartOpen = false" x-on:keyup.escape="cartOpen = false">
                        <svg class="h-6 w-6 flex-shrink-0 text-gray-700 group-hover:text-gray-500" fill="none"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-500 ltr:ml-1 rtl:mr-1">
                            @livewire('cart-count')
                        </span>
                        {{-- <span class="sr-only">items in cart, view bag</span> --}}
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
