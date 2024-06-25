<div class="flex items-center justify-start" x-data="{ sortMenu: false }">
    <div class="relative inline-block rtl:text-right ltr:text-left">
        <div>
            <button x-on:click="sortMenu = !sortMenu" type="button"
                class="inline-flex justify-center text-sm font-medium text-gray-700 group hover:text-gray-900"
                id="menu-button" aria-expanded="false" aria-haspopup="true">
                {{ __('Sort') }}
                <!-- Heroicon name: solid/chevron-down -->
                <svg x-show="!sortMenu" x-cloak
                    class="flex-shrink-0 w-5 h-5 text-gray-400 ltr:ml-1 ltr:-mr-1 rtl:mr-1 rtl:-ml-1 group-hover:text-gray-500"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
                <svg x-show="sortMenu" x-cloak
                    class="flex-shrink-0 w-5 h-5 text-gray-400 ltr:ml-1 ltr:-mr-1 rtl:mr-1 rtl:-ml-1 group-hover:text-gray-500"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <div x-show="sortMenu" x-cloak x-on:click.away="sortMenu=false"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95" style="display:none"
            class="z-10 absolute right-0 w-40 mt-2 origin-top-right bg-white rounded-md shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none"
            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
            <div class="py-1" role="none">
                <!--
    Active: "bg-gray-100", Not Active: ""

    Selected: "font-medium text-gray-900", Not Selected: "text-gray-500"
  -->
                {{-- <button wire:click="sort(1)" class="block px-4 py-2 text-sm font-medium text-gray-900" role="menuitem"
                    tabindex="-1" id="menu-item-0"> {{ __('Most Popular') }} </button>

                <button wire:click="sort(2)" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                    tabindex="-1" id="menu-item-1">
                    {{ __('Best Rating') }} </button> --}}

                <button wire:click="sort(3)" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                    tabindex="-1" id="menu-item-2">
                    {{ __('Newest') }} </button>

                <button wire:click="sort(4)" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                    tabindex="-1" id="menu-item-3">
                    {{ __('Price: Low to High') }} </button>

                <button wire:click="sort(5)" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                    tabindex="-1" id="menu-item-4">
                    {{ __('Price: High to Low') }} </button>
            </div>
        </div>
    </div>
    <button type="button" class="p-2 rtl:mr-2 ltr:ml-2 -m-2 text-gray-400 hover:text-gray-500">
        <span class="sr-only">View list</span>
        <!-- Heroicon name: solid/view-list -->
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
            fill="currentColor">
            <path
                d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
        </svg>
    </button>
    <button type="button" class="p-2 -m-2 text-gray-400 hover:text-gray-500">
        <span class="sr-only">View grid</span>
        <!-- Heroicon name: solid/view-grid -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd" />
        </svg>
    </button>
    <button x-on:click="mobileFilter = ! mobileFilter" type="button"
        class="sm:p-2 text-gray-400 hover:text-gray-500 lg:hidden">
        <span class="sr-only">Filters</span>
        <!-- Heroicon name: solid/filter -->
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd"
                d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                clip-rule="evenodd" />
        </svg>
    </button>
</div>
