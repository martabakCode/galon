<div class="w-full max-w-lg lg:max-w-xs max-auto">
    <label for="search" class="sr-only">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 rtl:left-0 ltr:right-0 flex items-center rtl:pl-3 ltr:pr-3 pointer-events-none">
            <!-- Heroicon name: solid/search -->
            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd" />
            </svg>
        </div>
        <input id="search" name="search" wire:model="search"
            class="block w-full py-2 leading-5 placeholder-gray-500 bg-white border border-gray-300 rounded-md focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            placeholder="{{ __('Search') }}" type="search">
    </div>
</div>
