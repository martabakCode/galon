<div class="hidden bg-white border-b shadow sm:block font-droidBold">
    <div class="mx-auto screen">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <a href="/" class="flex items-center flex-shrink-0">
                <img class="block w-auto h-8" src="{{ asset('storage/' . config('global.logo_'.App::getLocale())) }}"
                    alt="{{ config('global.name_' . App::getLocale()) }}" />
            </a>
            <div class="flex mr-6 space-x-8 rtl:space-x-reverse">

                <a href="/"
                    class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500
                    {{ Route::is('home') ? 'activeMenuClass' : 'inactiveMenuClass' }}">
                    {{ __('Home') }}
                </a>
                <a href="{{ route('products') }}"
                    class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500
                    {!! Route::is('products') ? 'activeMenuClass' : 'inactiveMenuClass' !!}">
                    {{ __('Products') }}
                </a>
                <a href="{{ route('categories') }}"
                    class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500
                    {!! Route::is('categories') ? 'activeMenuClass' : 'inactiveMenuClass' !!}">
                    {{ __('Categories') }}
                </a>
                <a href="{{ route('brands') }}"
                    class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500
                    {!! Route::is('brands') ? 'activeMenuClass' : 'inactiveMenuClass' !!}">
                    {{ __('Brands') }}
                </a>

                <a href="{{ route('pages.about') }}"
                    class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500
                    {!! Route::is('pages.about') ? 'activeMenuClass' : 'inactiveMenuClass' !!}">
                    {{ __('About') }}
                </a>
                <a href="{{ route('pages.contact') }}"
                    class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500
                    {!! Route::is('pages.contact') ? 'activeMenuClass' : 'inactiveMenuClass' !!}">
                    {{ __('Contact') }}
                </a>
                <!-- Current: "border-indigo-500 text-gray-900", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                <div class="flex space-x-1 rtl:space-x-reverse">
                    @auth
                        <a href="{{ route('favourites') }}" class="flex items-center p-2 -m-2 group">
                            <svg class="flex-shrink-0 w-6 h-6 text-gray-400 group-hover:text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            <span class="text-sm font-medium text-gray-700 rtl:mr-1 ltr:ml-1 group-hover:text-gray-800">
                                @livewire('favourites-count')
                            </span>
                            {{-- <span class="sr-only">items in cart, view bag</span> --}}
                        </a>
                    @endauth
                    <button x-on:click="cartOpen = ! cartOpen" class="flex items-center p-2 -m-2 group"
                        x-on:click.away="cartOpen = false" x-on:keyup.escape="cartOpen = false">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-400 group-hover:text-gray-500" fill="none"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <span class="text-sm font-medium text-gray-700 rtl:mr-1 ltr:ml-1 group-hover:text-gray-800">
                            @livewire('cart-count')
                        </span>
                        {{-- <span class="sr-only">items in cart, view bag</span> --}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
