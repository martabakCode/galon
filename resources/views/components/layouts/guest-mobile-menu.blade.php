<div>
    <div class="px-4 bg-white border-b shadow sm:hidden">
        <div class="flex justify-between h-16">
            <div class="flex items-center justify-between w-full -mr-2">
                <!-- Mobile menu button -->
                <button x-on:click="mobileMenu = ! mobileMenu" type="button"
                    class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg x-show="!mobileMenu" class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileMenu" style="display:none" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <button x-on:click="cartOpen = ! cartOpen" class="flex items-center p-2 -m-2 group">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-400 group-hover:text-gray-500" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    <span
                        class="mr-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">@livewire('cart-count')</span>
                    <span class="sr-only">items in cart, view bag</span>
                </button>
                <a href="/" class="flex items-center flex-shrink-0">
                    <img class="block w-auto h-8" src="{{ asset('storage/' . config('global.logo_'.App::getLocale())) }}"
                        alt="{{ config('global.name_' . App::getLocale()) }}" />
                </a>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="mobileMenu" style="display:none" class="sm:hidden" id="mobile-menu">
        <div class="pt-2 pb-3 space-y-1 text-base font-medium text-gray-500">
            <!-- Current: "bg-indigo-50 border-indigo-500 text-indigo-700", Default: "border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700" -->
            <a href="/"
                class="block py-2 text-base font-medium text-indigo-700 border-indigo-500 ltr:pl-3 ltr:pr-4 ltr:border-l-4 rtl:pl-4 rtl:pr-3 rtl:border-r-4 bg-indigo-50">
                {{ __('Home') }}
            </a>
            <a href="{{ route('products') }}"
                class="block py-2 border-transparent ltr:pl-3 ltr:pr-4 ltr:border-l-4 rtl:pl-4 rtl:pr-3 rtl:border-r-4 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700">
                {{ __('Products') }}
            </a>
            <a href="{{ route('categories') }}"
                class="block py-2 border-transparent ltr:pl-3 ltr:pr-4 ltr:border-l-4 rtl:pl-4 rtl:pr-3 rtl:border-r-4 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700">
                {{ __('Categories') }}
            </a>
            <a href="{{ route('brands') }}"
                class="block py-2 border-transparent ltr:pl-3 ltr:pr-4 ltr:border-l-4 rtl:pl-4 rtl:pr-3 rtl:border-r-4 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700">
                {{ __('Brands') }}
            </a>
            <a href="{{ route('pages.about') }}"
                class="block py-2 border-transparent ltr:pl-3 ltr:pr-4 ltr:border-l-4 rtl:pl-4 rtl:pr-3 rtl:border-r-4 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700">
                {{ __('About') }}
            </a>
            <a href="{{ route('pages.contact') }}"
                class="block py-2 border-transparent ltr:pl-3 ltr:pr-4 ltr:border-l-4 rtl:pl-4 rtl:pr-3 rtl:border-r-4 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700">
                {{ __('Contact') }}
            </a>
            <div class="flex px-3 pt-2 mt-1 space-x-4 border-t divide-x-2 rtl:divide-x-reverse rtl:space-x-reverse">
                <a href="{{ route('language', 'id') }}" class="border-b-4 btn-cancel">{{ __('id') }}</a>
                <a href="{{ route('language', 'en') }}" class="border-b-4 btn-cancel">{{ __('EN') }}</a>
            </div>
            @auth
                <a href="/user/profile"
                    class="flex px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                    role="menuitem" tabindex="-1" id="user-menu-item-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 rtl:ml-3 ltr:mr-3" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <p>{{ __('Profile') }}</p>
                </a>
                <a href="{{ route('dashboard') }}"
                    class="flex px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                    role="menuitem" tabindex="-1" id="user-menu-item-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 rtl:ml-3 ltr:mr-3" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <p>{{ __('Dashboard') }}</p>
                </a>
                <div class="border-t border-gray-100"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <li class="flex">
                        <a data-turbolinks-action="replace"
                            class="inline-flex items-center w-full px-4 py-2 text-sm font-semibold text-gray-700 transition-colors duration-150 hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            <svg class="w-4 h-4 rtl:ml-3 ltr:mr-3" aria-hidden="true" fill="none"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                </path>
                            </svg>
                            <span>{{ __('Logout') }}</span>
                        </a>
                    </li>
                </form>
            @else
                <div class="grid w-full grid-cols-2 gap-4 px-3 pt-2 mt-1 border-t">
                    <a href="{{ route('login') }}" class="btn">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="btn">{{ __('Register') }}</a>
                </div>
            @endauth

            {{-- <a class="{{ app()->getLocale() == 'id' ? 'underline text-gray-900 underline-offset-1' : '' }} flex px-1 hover:text-gray-900 hover:font-semibold"
                href="{{ route('language', 'id') }}">AR</a>
            <a class="{{ app()->getLocale() == 'en' ? 'underline text-gray-900 underline-offset-1' : '' }} flex px-1 hover:text-gray-900 hover:font-semibold"
                href="{{ route('language', 'en') }}">EN</a> --}}
        </div>
    </div>
</div>
