<div x-data="{ storeMenu: false, settingsMenu: false, blogMenu: false }">
    <nav class="flex-1 px-2 py-4 space-y-1">
        <a href="{{ route('customer.dashboard') }}"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md {!! Route::is('dashboard') ? 'text-white bg-cyan-800 group' : 'text-cyan-100' !!} hover:bg-cyan-600 hover:text-white group">
            <svg class="flex-shrink-0 w-6 h-6 rtl:ml-3 ltr:mr-3 text-cyan-100" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            {{ __('Dashboard') }}
        </a>

        <a href="{{ route('my.orders') }}"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md {!! Route::is('orders') ? 'text-white bg-cyan-800 group' : 'text-cyan-100' !!} hover:bg-cyan-600 hover:text-white group">
            <svg class="flex-shrink-0 w-6 h-6 rtl:ml-3 ltr:mr-3 text-cyan-200 group-hover:text-cyan-100"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            {{ __('Orders') }}
        </a>
        <a href="{{ route('my.invoices') }}"
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
        <a href="{{ route('my.messages') }}"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-cyan-100 hover:bg-cyan-600 hover:text-white group">
            <svg class="flex-shrink-0 w-6 h-6 rtl:ml-3 ltr:mr-3 text-cyan-200 group-hover:text-cyan-100" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
            </svg>

            {{ __('Messages') }}
        </a>
        <a href="{{ route('my.favourites') }}"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-cyan-100 hover:bg-cyan-600 hover:text-white group">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor"
                class="flex-shrink-0 w-6 h-6 rtl:ml-3 ltr:mr-3 text-cyan-200 group-hover:text-cyan-100">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
            </svg>

            {{ __('Favourites') }}
        </a>
        <a href="#"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-cyan-100 hover:bg-cyan-600 hover:text-white group">
            <!-- Heroicon name: outline/calendar -->
            <svg class="flex-shrink-0 w-6 h-6 rtl:ml-3 ltr:mr-3 text-cyan-200 group-hover:text-cyan-100" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
            </svg>
            {{ __('Reviews') }}
        </a>
        <a href="#"
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
    </nav>
</div>
