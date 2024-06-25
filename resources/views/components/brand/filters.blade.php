<div class="hidden lg:block">
    <h3 class="sr-only">{{ __('Brands') }}</h3>
    <div class="pb-6 border-b border-gray-200">
        <h3 class="flow-root -my-3">
            <!-- Expand/collapse section button -->
            <button x-on:click="brandMenu = ! brandMenu" type="button"
                class="flex items-center justify-between w-full py-3 text-sm text-gray-400 hover:text-gray-500"
                aria-controls="filter-section-1" aria-expanded="false">
                <span class="font-medium text-gray-900"> {{ __('Brands') }} </span>
                <span class="flex items-center mr-6">
                    <svg x-show="!brandMenu" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <svg x-show="brandMenu" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </button>
        </h3>
        <!-- Filter section, show/hide based on section state. -->
        <div x-cloak x-show="brandMenu" class="pt-6" id="filter-section-1">
            <div class="space-y-4">
                @foreach ($brands as $brand)
                    <div class="flex items-center">
                        <input id="filter-brand-0" name="brand[]" type="checkbox" value="{{ $brand->id }}"
                            wire:model="f_brands"
                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        <label for="filter-brand-0" class=" rtl:mr-3 ltr:ml-3 text-sm text-gray-600">
                            {{ $brand->getTranslation('name', App::getLocale()) }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="py-6 border-b border-gray-200">
        <h3 class="flow-root -my-3">
            <!-- Expand/collapse section button -->
            <button x-on:click="categoryMenu = ! categoryMenu" type="button"
                class="flex items-center justify-between w-full py-3 text-sm text-gray-400 hover:text-gray-500"
                aria-controls="filter-section-1" aria-expanded="false">
                <span class="font-medium text-gray-900"> {{ __('Categories') }} </span>
                <span class="flex items-center mr-6">
                    <svg x-show="!categoryMenu" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <svg x-show="categoryMenu" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </button>
        </h3>
        <!-- Filter section, show/hide based on section state. -->
        <div x-show="categoryMenu" x-cloak class="pt-6" id="filter-section-2">
            <div class="space-y-4">
                @foreach ($categories as $category)
                    <div class="flex items-center">
                        <input id="filter-category-{{ $category->id }}" name="category[]" value="{{ $category->id }}"
                            type="checkbox" wire:model="f_categories"
                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        <label for="filter-category-{{ $category->id }}"
                            class=" rtl:mr-3 ltr:ml-3 text-sm text-gray-600">
                            {{ $category->getTranslation('name', App::getLocale()) }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
