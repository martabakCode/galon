<!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
<div class="relative z-40 md:hidden" role="dialog" aria-modal="true" x-show="mobileMenu"
    x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    <div class="fixed inset-0 bg-opacity-75 bg-cyan-600"></div>

    <div class="fixed inset-0 z-40 flex" x-show="mobileMenu"
        x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full">

        <div class="relative flex flex-col flex-1 w-full max-w-xs pt-5 pb-4 bg-cyan-700" x-show="mobileMenu"
            x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="absolute top-0 pt-2 rtl:left-0 rtl:-ml-12 ltr:right-0 ltr:-mr-12">
                <button type="button" x-on:click="mobileMenu=false"
                    class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Close sidebar</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <a href="/" class="flex items-center flex-shrink-0 px-4">
                <img class="block w-auto h-8" src="{{ asset('storage/' . config('global.logo_'.App::getLocale())) }}"
                    alt="{{ config('global.name_' . App::getLocale()) }}" />
            </a>
            <div class="flex-1 h-0 mt-5 overflow-y-auto">
                <x-layouts.customer-nav />
            </div>
        </div>
        <div class="flex-shrink-0 w-14" aria-hidden="true">
            <!-- Dummy element to force sidebar to shrink to fit close icon -->
        </div>
    </div>
</div>
