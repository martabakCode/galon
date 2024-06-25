<div class="sticky top-0 z-10 flex flex-shrink-0 h-16 bg-white shadow" x-cloak>
    <button type="button" x-on:click="mobileMenu = ! mobileMenu"
        class="px-4 text-gray-500 border-l border-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
        <span class="sr-only">Open sidebar</span>
        <!-- Heroicon name: outline/menu-alt-2 -->
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
            stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
        </svg>
    </button>
    <div class="flex justify-between flex-1 px-4">
        <div class="flex flex-1">

        </div>
        <div class="flex items-center mr-4 md:rtl:mr-6 md:ltr:ml-6">
            <div class="flex">
                <a href="{{ route('language', 'id') }}"
                    class="flex px-1 rtl:border-l ltr:border-r">{{ __('id') }}</a>
                <a href="{{ route('language', 'en') }}" class="flex px-1">{{ __('EN') }}</a>
            </div>
            <button type="button"
                class=" rtl:mr-3 ltr:ml-3 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="sr-only">View notifications</span>
                <!-- Heroicon name: outline/bell -->
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </button>

            <!-- Profile dropdown -->
            <div class="relative rtl:mr-3 ltr:ml-3">
                <div>
                    <button type="button" x-on:click="profileMenu = ! profileMenu"
                        class="flex items-center max-w-xs text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="">
                    </button>
                </div>
                <div class="absolute ltr:right-0 rtl:left-0 w-48 py-1 mt-2 rtl:origin-top-left ltr:origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 rtl:ml-3 ltr:mr-3" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <p>{{ __('Profile') }}</p>
                    </a>
                    {{-- <a href="#"
                        class="flex px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        role="menuitem" tabindex="-1" id="user-menu-item-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 rtl:ml-3 ltr:mr-3" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <p>{{ __('Settings') }}</p>
                    </a> --}}
                    <div class="border-t border-gray-100"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <li class="flex">
                            <a data-turbolinks-action="replace"
                                class="inline-flex items-center w-full px-4 py-2 text-sm font-semibold transition-colors duration-150 hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
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
                </div>
            </div>
        </div>
    </div>
</div>
