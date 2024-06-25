<div x-data="{ storeMenu: false, settingsMenu: false, blogMenu: false }">
    <nav class="flex-1 px-2 py-4 space-y-1">
        <a href="{{ route('dashboard') }}"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md {!! Route::is('dashboard') ? 'text-white bg-cyan-800 group' : 'text-cyan-100' !!} hover:bg-cyan-600 hover:text-white group">
            <svg class="flex-shrink-0 w-6 h-6 rtl:ml-3 ltr:mr-3 text-cyan-100" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            {{ __('Dashboard') }}
        </a>
        <a href="#" x-on:click="storeMenu = ! storeMenu"
            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-6 rounded-md text-cyan-100 hover:bg-cyan-600 hover:text-white group">
            <!-- Heroicon name: outline/users -->
            <div class="flex">
                <svg class="flex-shrink-0 w-6 h-6 rtl:ml-3 ltr:mr-3 text-cyan-100 group-hover:text-cyan-200"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                {{ __('Store') }}
            </div>
            <svg x-show="!storeMenu" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
            <svg x-show="storeMenu" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                    clip-rule="evenodd" />
            </svg>
        </a>
        <ul x-show="storeMenu" class="text-sm text-cyan-100" :class="storeMenu ? 'rounded-md bg-cyan-600' : ''">
            <li class="px-2 py-2 pr-10 hover:bg-cyan-500 hover:rounded-md hover:text-white {!! Route::is('app.products') ? 'text-white bg-cyan-800 group' : 'text-cyan-100' !!}">
                <a href="{{ route('app.products') }}" class="flex">
                    <svg class="flex-shrink-0 w-5 h-5 rtl:ml-3 ltr:mr-3 text-cyan-100 group-hover:text-cyan-200"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    {{ __('Products') }}
                </a>

            </li>
            <li class="px-2 py-2 pr-10 hover:bg-cyan-500 hover:rounded-md hover:text-white">
                <a href="{{ route('app.categories') }}" class="flex">
                    <svg class="flex-shrink-0 w-5 h-5 rtl:ml-3 ltr:mr-3 text-cyan-100 group-hover:text-cyan-200"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    {{ __('Categories') }}
                </a>
            </li>
            <li class="px-2 py-2 pr-10 hover:bg-cyan-500 hover:rounded-md hover:text-white">
                <a href="{{ route('app.brands') }}" class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 lex-shrink-0 rtl:ml-3 ltr:mr-3 text-cyan-100 group-hover:text-cyan-200"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    {{ __('Brands') }}
                </a>
            </li>
            {{-- <li class="px-2 py-2 pr-10 hover:bg-cyan-500 hover:rounded-md hover:text-white">
                <a href="./filters.php" class="flex">
                    <svg class="flex-shrink-0 w-5 h-5 rtl:ml-3 ltr:mr-3 text-cyan-100 group-hover:text-cyan-200"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    {{ __('Filters') }}
                </a>
            </li> --}}
        </ul>
        <a href="{{ route('app.customers') }}"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md {!! Route::is('app.customers') ? 'text-white bg-cyan-800 group' : 'text-cyan-100' !!} hover:bg-cyan-600 hover:text-white group">
            <!-- Heroicon name: outline/folder -->
            <svg class="flex-shrink-0 w-6 h-6 rtl:ml-3 ltr:mr-3 text-cyan-100 group-hover:text-cyan-200"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            {{ __('Customers') }}
        </a>
        <a href="{{ route('orders') }}"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md {!! Route::is('orders') ? 'text-white bg-cyan-800 group' : 'text-cyan-100' !!} hover:bg-cyan-600 hover:text-white group">
            <svg class="flex-shrink-0 w-6 h-6 rtl:ml-3 ltr:mr-3 text-cyan-200 group-hover:text-cyan-100"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            {{ __('Orders') }}
        </a>
        <a href="{{ route('invoices') }}"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-cyan-100 hover:bg-cyan-600 hover:text-white group">
            <!-- Heroicon name: outline/inbox -->
            <svg class="flex-shrink-0 w-6 h-6 rtl:ml-3 ltr:mr-3 text-cyan-200 group-hover:text-cyan-100"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
            </svg>
            {{ __('Invoices') }}
        </a>
        <a href="{{ route('app.contacts') }}"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-cyan-100 hover:bg-cyan-600 hover:text-white group">
            <svg class="flex-shrink-0 w-6 h-6 rtl:ml-3 ltr:mr-3 text-cyan-200 group-hover:text-cyan-100"
                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
            </svg>

            {{ __('Messages') }}
        </a>
        {{-- <a href="#"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-cyan-100 hover:bg-cyan-600 hover:text-white group">
            <!-- Heroicon name: outline/chart-bar -->
            <svg class="flex-shrink-0 w-6 h-6 rtl:ml-3 ltr:mr-3 text-cyan-200 group-hover:text-cyan-100"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
            {{ __('Reports') }}
        </a>

        <a href="#"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-cyan-100 hover:bg-cyan-600 hover:text-white group">
            <!-- Heroicon name: outline/calendar -->
            <svg class="flex-shrink-0 w-6 h-6 rtl:ml-3 ltr:mr-3 text-cyan-200 group-hover:text-cyan-100"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
            </svg>
            {{ __('Reviews') }}
        </a>
        <a href="#"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-cyan-100 hover:bg-cyan-600 hover:text-white group">
            <!-- Heroicon name: outline/calendar -->
            <svg class="flex-shrink-0 w-6 h-6 rtl:ml-3 ltr:mr-3 text-cyan-200 group-hover:text-cyan-100"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            {{ __('Media') }}
        </a>

        <a href="#"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-cyan-100 hover:bg-cyan-600 hover:text-white group">
            <!-- Heroicon name: outline/calendar -->
            <svg class="flex-shrink-0 w-6 h-6 rtl:ml-3 ltr:mr-3 text-cyan-200 group-hover:text-cyan-100"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
            </svg>
            {{ __('Pages') }}
        </a> --}}
        <a href="#" x-on:click="blogMenu = ! blogMenu"
            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-6 rounded-md text-cyan-100 hover:bg-cyan-600 hover:text-white group">
            <div class="flex">
                <svg class="flex-shrink-0 w-6 h-6 rtl:ml-3 ltr:mr-3 text-cyan-100 group-hover:text-cyan-200"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                </svg>
                {{ __('Blog') }}
            </div>
            <svg x-show="!blogMenu" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
            <svg x-show="blogMenu" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                    clip-rule="evenodd" />
            </svg>
        </a>
        <ul x-show="blogMenu" class="text-sm text-cyan-100" :class="blogMenu ? 'rounded-md bg-cyan-600' : ''">
            <li class="px-2 py-2 pr-10 hover:bg-cyan-500 hover:rounded-md hover:text-white">
                <a href="{{ route('blog.posts') }}" class="flex">
                    <svg class="flex-shrink-0 w-6 h-6 rtl:ml-3 ltr:mr-3 text-cyan-100 group-hover:text-cyan-200"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    {{ __('Posts') }}
                </a>

            </li>
            <li class="px-2 py-2 pr-10 hover:bg-cyan-500 hover:rounded-md hover:text-white">
                <a href="{{ route('blog.categories') }}" class="flex">
                    <svg class="flex-shrink-0 w-6 h-6 rtl:ml-3 ltr:mr-3 text-cyan-100 group-hover:text-cyan-200"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    {{ __('Categories') }}
                </a>
            </li>
        </ul>
        <a href="#" x-on:click="settingsMenu = ! settingsMenu"
            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-6 rounded-md text-cyan-100 hover:bg-cyan-600 hover:text-white group">
            <!-- Heroicon name: outline/users -->
            <div class="flex">
                <svg class="flex-shrink-0 w-6 h-6 rtl:ml-3 ltr:mr-3 text-cyan-200 group-hover:text-cyan-100"
                    x-description="Heroicon name: outline/cog" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                    </path>
                </svg>
                {{ __('Settings') }}
            </div>
            <svg x-show="!settingsMenu" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
            <svg x-show="settingsMenu" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                    clip-rule="evenodd" />
            </svg>
        </a>
        <ul x-show="settingsMenu" class="text-sm text-cyan-100" :class="settingsMenu ? 'rounded-md bg-cyan-600' : ''">
            <li class="px-2 py-2 pr-10 hover:bg-cyan-500 hover:rounded-md hover:text-white">
                <a href="{{ route('settings.general') }}" class="flex">

                    <svg class="flex-shrink-0 w-5 h-5 rtl:ml-3 ltr:mr-3 text-cyan-100 group-hover:text-cyan-200"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    {{ __('General') }}
                </a>
            </li>
            <li class="px-2 py-2 pr-10 hover:bg-cyan-500 hover:rounded-md hover:text-white">
                <a href="{{ route('settings.roles') }}" class="flex">
                    <svg class="flex-shrink-0 w-5 h-5 rtl:ml-3 ltr:mr-3 text-cyan-100 group-hover:text-cyan-200"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                    </svg>
                    {{ __('Roles') }}
                </a>
            </li>
            <li class="px-2 py-2 pr-10 hover:bg-cyan-500 hover:rounded-md hover:text-white">
                <a href="{{ route('settings.appearance') }}" class="flex">
                    <svg class="flex-shrink-0 w-5 h-5 rtl:ml-3 ltr:mr-3 text-cyan-100 group-hover:text-cyan-200"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    {{ __('Appearance') }}
                </a>
            </li>
            <li class="px-2 py-2 pr-10 hover:bg-cyan-500 hover:rounded-md hover:text-white">
                <a href="#" class="flex">
                    <svg class="flex-shrink-0 w-5 h-5 rtl:ml-3 ltr:mr-3 text-cyan-100 group-hover:text-cyan-200"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    {{ __('Payments') }}
                </a>
            </li>
            <li class="px-2 py-2 pr-10 hover:bg-cyan-500 hover:rounded-md hover:text-white">
                <a href="#" class="flex">
                    <svg class="flex-shrink-0 w-5 h-5 rtl:ml-3 ltr:mr-3 text-cyan-100 group-hover:text-cyan-200"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    {{ __('Shippings') }}
                </a>
            </li>
        </ul>
    </nav>
</div>
