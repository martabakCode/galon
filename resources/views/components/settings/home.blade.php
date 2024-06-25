<div>


    <form id="home_settings_form" class="relative" wire:submit.prevent="saveHome">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-2" x-data="{ mySlides: @entangle('slides') }">
            <label for="slides" class="block text-sm font-medium text-gray-900 dark:text-gray-400">
                {{ __('No. of Slides in slider') }}
            </label>
            <select id="slides" wire:model="slides"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @for ($no = 1; $no <= 10; $no++)
                    <option wire:click="setSlides({{ $no }})">
                        {{ $no }}
                    </option>
                @endfor
            </select>
            <div class="sm:col-span-2">
                <div>
                    @for ($i = 0; $i < $this->slides; $i++)
                        <div>
                            <h1>Slide <span>{{ $i + 1 }}</span></h1>
                            <x-upload-slider :image="$this->slider_images[$i]" :index="$i" :width="'full'" />
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <div class="mt-4 grid grid-cols-1 lg:grid-cols-3 gap-2 w-full">
            <div class="flex justify-center items-center">
                <label for="category_max_items" class="text-sm font-medium text-gray-700 w-1/2">
                    {{ __('Max category items') }}
                </label>
                <div class="w-1/2">
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <input type="number" wire:model.defer="settings.category_max_items" required
                            class="w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="1" aria-describedby="category_max_items">
                        <div
                            class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                            <span class="text-gray-500 sm:text-xs" id="category_max_items">
                                {{ __('Required') }}
                            </span>
                        </div>
                    </div>
                    @error('settings.category_max_items')
                        <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex justify-center items-center">
                <label for="category_row_cells" class="text-sm font-medium text-gray-700 w-1/2">
                    {{ __('Max category row cells') }}
                </label>
                <div class="w-1/2">
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <input type="number" wire:model.defer="settings.category_row_cells" required
                            class="w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="1" aria-describedby="category_row_cells">
                        <div
                            class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                            <span class="text-gray-500 sm:text-xs" id="category_row_cells">
                                {{ __('Required') }}
                            </span>
                        </div>
                    </div>
                    @error('settings.category_row_cells')
                        <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mt-4 grid grid-cols-1 lg:grid-cols-3 gap-2 w-full">
            <div class="flex justify-center items-center">
                <label for="trending_max_items" class="text-sm font-medium text-gray-700 w-1/2">
                    {{ __('Trending products items') }}
                </label>
                <div class="w-1/2">
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <input type="number" wire:model.defer="settings.trending_max_items" required
                            class="w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="1" aria-describedby="trending_max_items">
                        <div
                            class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                            <span class="text-gray-500 sm:text-xs">
                                {{ __('Required') }}
                            </span>
                        </div>
                    </div>
                    @error('settings.trending_max_items')
                        <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="sm:col-span-2 sm:flex sm:justify-end border-t pt-2 mt-4">
            <div class="flex justify-end">
                <x-session-msg2 />
                {{-- <button type="button" class="btn-cancel">
                    {{ __('Cancel') }}
                </button> --}}
                <button type="submit" class="ltr:ml-3 rtl:mr-3 btn">
                    {{ __('Save') }}
                </button>
            </div>
        </div>
    </form>
</div>
