<div class="bg-sky-700 text-white shadow">
    <div class="screen text-xs sm:text-base">
        <div class="flex h-10 items-center justify-center rtl:space-x-reverse sm:justify-between sm:space-x-6">
            @auth
                <div class="relative z-50" x-cloak>
                    <div>
                        <button type="button" x-on:click="profileMenu = ! profileMenu"
                            class="flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="">
                        </button>
                    </div>
                    <div class="absolute mt-2 w-48 rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none ltr:left-0 ltr:origin-top-left rtl:right-0 rtl:origin-top-right"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                        x-show="profileMenu" x-on:click.away="profileMenu=false"
                        x-transition:enter="transition ease-out duration-100" ,
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100" ,
                        x-transition:leave="transition ease-in duration-75" ,
                        x-transition:leave-start="transform opacity-100 scale-100" ,
                        x-transition:leave-end="transform opacity-0 scale-95">
                        <!-- Active: "bg-gray-100", Not Active: "" -->

                        <a href="/user/profile"
                            class="flex px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                            role="menuitem" tabindex="-1" id="user-menu-item-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ltr:mr-3 rtl:ml-3" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <p>{{ __('Profile') }}</p>
                        </a>

                        <a @role('Admin') href="{{ route('dashboard') }}" @else href="{{ route('customer.dashboard') }}"
                        @endrole
                            class="flex px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                            role="menuitem" tabindex="-1" id="user-menu-item-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ltr:mr-3 rtl:ml-3" fill="none"
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
                                    class="inline-flex w-full items-center px-4 py-2 text-sm font-semibold text-gray-700 transition-colors duration-150 hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <svg class="h-4 w-4 ltr:mr-3 rtl:ml-3" aria-hidden="true" fill="none"
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
                    </div>
                </div>
            @else
                <div
                    class="mt-5 mb-4 hidden items-center divide-x divide-gray-400 text-sm font-medium text-white rtl:divide-x-reverse sm:flex">
                    <a class="flex px-1 hover:text-gray-200 hover:underline"
                        href="{{ route('login') }}">{{ __('Login') }}</a>
                    <a class="flex px-1 hover:text-gray-200 hover:underline"
                        href="{{ route('register') }}">{{ __('Register') }}</a>
                </div>
            @endauth
            <div class="flex h-10 items-center justify-center text-sm rtl:space-x-reverse sm:mr-6 sm:space-x-6">
                <a href="mailto:{{ config('global.email', 'sales@domain.com') }}" class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-300 sm:h-6 sm:w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="px-1">{{ config('global.email', 'sales@domain.com') }}</span>
                </a>
                <a href="tel:{{ config('global.contact', '334343434') }}" class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-300 sm:h-6 sm:w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <span class="px-1">{{ config('global.contact', '334343434') }}</span>
                </a>
                <a href="http://wa.me/{{ config('global.whatsapp', '+62-898-555-033') }}" class="flex">
                    <svg class="h-4 w-4 fill-current text-green-400 sm:h-6 sm:w-6" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512">
                        <path
                            d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z">
                        </path>
                    </svg>
                    <span class="px-1">{{ config('global.whatsapp', '+62-898-555-033') }}</span>
                </a>
            </div>
            <div
                class="mt-5 mb-4 hidden items-center divide-x divide-gray-200 text-sm font-medium text-white rtl:divide-x-reverse sm:flex">
                <a class="{{ app()->getLocale() == 'id' ? 'underline text-gray-100 underline-offset-1' : '' }} flex px-1 hover:font-semibold hover:text-gray-200"
                    href="{{ route('language', 'id') }}">{{ __('ID') }}</a>
                <a class="{{ app()->getLocale() == 'en' ? 'underline text-gray-100 underline-offset-1' : '' }} flex px-1 hover:font-semibold hover:text-gray-200"
                    href="{{ route('language', 'en') }}">{{ __('EN') }}</a>
            </div>
        </div>
    </div>
</div>
