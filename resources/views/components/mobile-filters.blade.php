<div x-show="mobileFilter" x-cloak x-transition:enter="transition-opacity ease-linear duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0" class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-black bg-opacity-25"></div>
    <div x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
        class="fixed inset-0 z-40 flex">
        <div
            class="relative flex flex-col w-full h-full max-w-xs py-4 pb-12 ml-auto overflow-y-auto bg-white shadow-xl">
            <div class="flex items-center justify-between px-4">
                <h2 class="text-lg font-medium text-gray-900">{{ __('Filters') }}</h2>
                <button x-on:click="mobileFilter=false" type="button"
                    class="flex items-center justify-center w-10 h-10 p-2 -mr-2 text-gray-400 bg-white rounded-md">
                    <span class="sr-only">Close menu</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Filters -->
            <form class="mt-4 border-t border-gray-200">
                <div class="px-4 py-6 border-t border-gray-200">
                    <h3 class="flow-root -mx-2 -my-3">
                        <!-- Expand/collapse section button -->
                        <button x-on:click="categoryMobileFilter = ! categoryMobileFilter" type="button"
                            class="flex items-center justify-between w-full px-2 py-3 text-gray-400 bg-white hover:text-gray-500"
                            aria-controls="filter-section-mobile-category-1" aria-expanded="false">
                            <span class="font-medium text-gray-900"> {{ __('Categories') }} </span>
                            <span class="flex items-center  rtl:mr-6 ltr:ml-6">
                                <svg x-show="!categoryMobileFilter" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg x-show="categoryMobileFilter" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                    </h3>
                    <!-- Filter section, show/hide based on section state. -->
                    <div x-show="categoryMobileFilter" class="pt-6" id="filter-section-mobile-category-1">
                        <div class="space-y-2">
                            @foreach ($categories as $key => $category)
                                <div class="flex items-center">
                                    <input id="filter-mobile-category-{{ $key }}" name="category[]"
                                        value="{{ $category->id }}" wire:model="f_categories" type="checkbox"
                                        class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                    <label for="filter-mobile-category-{{ $key }}"
                                        class="flex-1 min-w-0 rtl:mr-3 ltr:ml-3 text-gray-500">
                                        {{ $category->getTranslation('name', App::getLocale()) }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="px-4 py-6 border-t border-gray-200">
                    <h3 class="flow-root -mx-2 -my-3">
                        <!-- Expand/collapse section button -->
                        <button x-on:click="brandMobileFilter = ! brandMobileFilter" type="button"
                            class="flex items-center justify-between w-full px-2 py-3 text-gray-400 bg-white hover:text-gray-500"
                            aria-controls="filter-section-mobile-brand-1" aria-expanded="false">
                            <span class="font-medium text-gray-900"> {{ __('Brands') }} </span>
                            <span class="flex items-center  rtl:mr-6 ltr:ml-6">
                                <svg x-show="!brandMobileFilter" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg x-show="brandMobileFilter" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                    </h3>
                    <!-- Filter section, show/hide based on section state. -->
                    <div x-show="brandMobileFilter" class="pt-6" id="filter-section-mobile-brand-1">
                        <div class="space-y-2">
                            @foreach ($brands as $key => $brand)
                                <div class="flex items-center">
                                    <input id="filter-mobile-brand-{{ $key }}" name="brand[]"
                                        value="{{ $brand->id }}" wire:model="f_brands" type="checkbox"
                                        class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                    <label for="filter-mobile-brand-{{ $key }}"
                                        class="flex-1 min-w-0 rtl:mr-3 ltr:ml-3 text-gray-500">
                                        {{ $brand->getTranslation('name', App::getLocale()) }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
