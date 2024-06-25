<div class="py-10 bg-gray-100 screen">
    <h2 class="sr-only">Add product</h2>
    <div class="flex justify-between pb-2 border-b">
        <h3 class="text-lg font-medium text-gray-900">{{ __('Add Product') }}</h3>
        <a href="{{ route('app.products') }}" class="btn-cancel">
            {{ __('Back') }}
        </a>
    </div>
    <form id="new_product_form" class="relative" wire:submit.prevent="save">

        <div class="grid grid-cols-1 gap-2 divide-x-2 lg:grid-cols-3 rtl:divide-x-reverse">
            <!-- Contact form -->
            <div class="mt-6 lg:col-span-2">
                <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                    <div class="sm:col-span-2">
                        <label for="name_en"
                            class="block text-sm font-medium text-gray-700">{{ __('Name') }}&nbsp;{{ __('English') }}</label>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="text" wire:model.defer="name" {{ $readOnly ? 'disabled' : '' }}
                                    required
                                    class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="Name" aria-describedby="name_en">
                                <div
                                    class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                    <span class="text-gray-500 sm:text-xs" id="name">
                                        {{ __('Required') }}
                                    </span>
                                </div>
                            </div>
                            @error('name')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="name_id"
                            class="block text-sm font-medium text-gray-700">{{ __('Name') }}&nbsp;{{ __('Indonesia') }}</label>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="text" wire:model.defer="name_id" {{ $readOnly ? 'disabled' : '' }}
                                    required
                                    class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="{{ __('Name') }}" aria-describedby="name_id">
                                <div
                                    class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                    <span class="text-gray-500 sm:text-xs" id="name_id">
                                        {{ __('Required') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        @error('name_id')
                            <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                        @enderror
                    </div>
                    <div x-cloak class="sm:col-span-2" x-data="{ content: '', limit: $el.dataset.limit }" data-limit="255">
                        <div class="flex justify-between">
                            <label for="excerpt" class="block text-sm font-medium text-gray-700">{{ __('Excerpt') }}
                                <span class="text-xs text-gray-500">({{ __('Max. 255 characters') }})

                                </span>
                            </label>
                            <p class="text-xs text-gray-500 peer-optional:hidden">{{ __('Required') }}</p>
                        </div>
                        <p x-ref="remaining" class="text-xs text-gray-500">
                            {{ __('Remaining') }} <span class="font-bold" x-text="limit - content.length"></span>
                            {{ __('characters') }}.
                        </p>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <textarea ref="content" x-model="content" x-bind:maxlength="limit" rows="3" wire:model.defer="excerpt"
                                    {{ $readOnly ? 'disabled' : '' }} required
                                    class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="{{ __('Short description') }}" aria-describedby="excerpt">
                                </textarea>
                            </div>

                            @error('excerpt')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="sm:col-span-2">
                        {{-- <div>
                            <div class="flex justify-between">
                                <label for="description" class="block text-sm font-medium text-gray-900">
                                    {{ __('Description') }}
                                </label>
                                <p class="text-xs text-gray-500 peer-optional:hidden">{{ __('Required') }}</p>
                            </div>
                            <div class="mt-1">
                                <textarea id="description1" wire:model.defer="description1" name="message" rows="4" required
                                    class="block w-full px-2 py-2 text-gray-900 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                    aria-describedby="message-max">
                            </textarea>
                            </div>
                            @error('description')
                                <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                            @enderror
                        </div> --}}
                    {{-- <div x-data x-init="ClassicEditor.create($refs.description1)
                            .then(function(editor) {
                                editor.model.document.on('change:data', () => {
                                    $dispatch('input', editor.getData())
                                })
                            })
                            .catch(error => {

                            });" wire:ignore wire:key="description1" x-ref="description1"
                            wire:model.defer="description">
                        </div>

                    </div> --}}
                    <div class="sm:col-span-2">
                        <div wire:ignore>
                            {{-- <div class="flex justify-between"> --}}
                            <label for="description" class="block text-sm font-medium text-gray-900">
                                {{ __('Description') }}
                            </label>
                            {{-- <p class="text-xs text-gray-500 peer-optional:hidden">{{ __('Required') }}</p> --}}
                            {{-- </div> --}}
                            <div class="mt-1">
                                <textarea x-data x-ref='ckEditor' x-init="ClassicEditor
                                    .create($refs.ckEditor, {
                                        language: '{!! config('app.locale') !!}'
                                    }).then(function(editor) {
                                        editor.model.document.on('change:data', () => {
                                            @this.set('description', editor.getData());
                                        });
                                    })
                                    .catch(error => {

                                    });" wire:model='description' class="form-control" rows="5">
                            </textarea>
                            </div>
                        </div>
                        @error('description')
                            <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <label for="price"
                            class="block text-sm font-medium text-gray-700">{{ __('Sell Price') }}</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="number" wire:model.defer="price" {{ $readOnly ? 'disabled' : '' }}
                                class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="0.00" aria-describedby="price">
                            <div
                                class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                <span class="text-gray-500 sm:text-xs" id="price">
                                    {{ __('Required') }}
                                </span>
                            </div>
                        </div>
                        @error('price')
                            <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <label for="buy_price"
                            class="block text-sm font-medium text-gray-700">{{ __('Buy Price') }}</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="number" wire:model.defer="buy_price" {{ $readOnly ? 'disabled' : '' }}
                                class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="0.00" aria-describedby="buy_price">
                            <div
                                class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                <span class="text-gray-500 sm:text-xs" id="buy_price">
                                    {{ __('Required') }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="flex justify-between">
                            <label for="category" class="block text-sm font-medium text-gray-900">
                                {{ __('Category') }}
                            </label>
                            <p class="text-xs text-gray-500 peer-optional:hidden">{{ __('Required') }}</p>
                        </div>
                        <div class="mt-1">
                            <select wire:model.defer="category_id" {{ $readOnly ? 'disabled' : '' }} required
                                class="block w-full px-2 py-2 text-gray-700 border-gray-300 rounded-md shadow-sm peer focus:ring-indigo-500 focus:border-indigo-500">
                                <option value='0'>---</option>
                                @foreach ($this->categories as $category)
                                    <option value="{{ $category->id }}" wire:key="{{ $category->id }}">
                                        {{ $category->getTranslation('name', App::getLocale()) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="flex justify-between">
                            <label for="brand" class="block text-sm font-medium text-gray-900">
                                {{ __('Brand') }}
                            </label>
                            <p class="text-xs text-gray-500 peer-optional:hidden">{{ __('Required') }}</p>
                        </div>
                        <div class="mt-1">
                            <select wire:model.defer="brand_id" {{ $readOnly ? 'disabled' : '' }} required
                                class="block w-full px-2 py-2 text-gray-700 border-gray-300 rounded-md shadow-sm peer focus:ring-indigo-500 focus:border-indigo-500">
                                <option value='0'>---</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" wire:key="{{ $brand->id }}">
                                        {{ $brand->getTranslation('name', App::getLocale()) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="stock"
                            class="block text-sm font-medium text-gray-700">{{ __('Quantity') }}</label>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="number" wire:model.defer="stock" {{ $readOnly ? 'disabled' : '' }}
                                    required
                                    class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="1" aria-describedby="stock">
                                <div
                                    class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                    <span class="text-gray-500 sm:text-xs" id="stock">
                                        {{ __('Required') }}
                                    </span>
                                </div>
                            </div>
                            @error('stock')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <label for="sort"
                            class="block text-sm font-medium text-gray-700">{{ __('Sort') }}</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="number" wire:model.defer="sort" {{ $readOnly ? 'disabled' : '' }}
                                class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="0" aria-describedby="sort">
                            <div
                                class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                <span class="text-gray-500 sm:text-xs" id="sort">
                                    {{ __('Required') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <fieldset class="">
                        <label class="block text-sm font-medium text-gray-700">{{ __('Status') }}</label>
                        <div class="relative flex mt-4 space-x-4 rtl:space-x-reverse">
                            <div class="flex items-center">
                                <input id="enabled" wire:model.defer="enabled" type="radio" name="enabled"
                                    value="1"
                                    class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                <label for="enabled"
                                    class="block text-sm font-medium text-gray-700 ltr:ml-3 rtl:mr-3">
                                    {{ __('Enabled') }}
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="disabled" wire:model.defer="enabled" type="radio" name="enabled"
                                    value="0"
                                    class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                <label for="disabled"
                                    class="block text-sm font-medium text-gray-700 ltr:ml-3 rtl:mr-3">
                                    {{ __('Disabled') }}
                                </label>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="mt-6 overflow-hidden ltr:pl-2 rtl:pr-2">
                <div class="flex flex-col w-full">
                    <h2 class="pb-1 border-b">{{ __('Additional Information') }}</h2>
                    <fieldset class="py-2 space-y-5">
                        <legend class="sr-only">Featured</legend>
                        <div class="relative flex items-start">
                            <div class="flex items-center h-5">
                                <input id="featured" aria-describedby="featured-description" name="featured" wire:model.defer="featured"
                                    type="checkbox"
                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            </div>
                            <div class="text-sm ltr:ml-3 rtl:mr-3">
                                <label for="featured"
                                    class="font-medium text-gray-700">{{ __('Featured Product') }}</label>
                            </div>
                        </div>
                        <div class="relative flex items-start">
                            <div class="flex items-center h-5">
                                <input id="new" aria-describedby="new-description" name="new" wire:model.defer="new"
                                    type="checkbox"
                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            </div>
                            <div class="text-sm ltr:ml-3 rtl:mr-3">
                                <label for="new"
                                    class="font-medium text-gray-700">{{ __('New Product') }}</label>
                            </div>
                        </div>
                        <div class="relative flex items-start">
                            <div class="flex items-center h-5">
                                <input id="promotion" aria-describedby="promotion-description" name="promotion" wire:model.defer="promotion"
                                    type="checkbox"
                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            </div>
                            <div class="text-sm ltr:ml-3 rtl:mr-3">
                                <label for="promotion"
                                    class="font-medium text-gray-700">{{ __('Promotion Product') }}</label>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="flex flex-col w-full mt-4">
                    <h2 class="pb-1 border-b">{{ __('Display Options') }}</h2>
                    <fieldset class="py-2 space-y-5">
                        <legend class="sr-only">Display options</legend>
                        <div class="relative flex items-start">
                            <div class="flex items-center h-5">
                                <input id="hide-price" aria-describedby="hide-price-description" name="hide-price" wire:model.defer="hide_price"
                                    type="checkbox"
                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            </div>
                            <div class="text-sm ltr:ml-3 rtl:mr-3">
                                <label for="hide-price"
                                    class="font-medium text-gray-700">{{ __('Hide Price') }}</label>
                            </div>
                        </div>
                        <div class="relative flex items-start">
                            <div class="flex items-center h-5">
                                <input id="hide-options" aria-describedby="hide-options-description" wire:model.defer="hide_options"
                                    name="hide-options" type="checkbox"
                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            </div>
                            <div class="text-sm ltr:ml-3 rtl:mr-3">
                                <label for="hide-options"
                                    class="font-medium text-gray-700">{{ __('Hide Options') }}</label>
                            </div>
                        </div>
                        <div class="relative flex items-start">
                            <div class="flex items-center h-5">
                                <input id="hide-excerpt" aria-describedby="hide-excerpt-description" wire:model.defer="hide_excerpt"
                                    name="hide-excerpt" type="checkbox"
                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            </div>
                            <div class="text-sm ltr:ml-3 rtl:mr-3">
                                <label for="hide-excerpt"
                                    class="font-medium text-gray-700">{{ __('Hide Excerpt') }}</label>
                            </div>
                        </div>
                        <div class="relative flex items-start">
                            <div class="flex items-center h-5">
                                <input id="hide-description" aria-describedby="hide-description-description" wire:model.defer="hide_description"
                                    name="hide-description" type="checkbox"
                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            </div>
                            <div class="text-sm ltr:ml-3 rtl:mr-3">
                                <label for="hide-description"
                                    class="font-medium text-gray-700">{{ __('Hide Description') }}</label>
                            </div>
                        </div>
                        <div class="relative flex items-start">
                            <div class="flex items-center h-5">
                                <input id="hide-reviews" aria-describedby="hide-reviews-description" wire:model.defer="hide_reviews"
                                    name="hide-reviews" type="checkbox"
                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            </div>
                            <div class="text-sm ltr:ml-3 rtl:mr-3">
                                <label for="hide-preview"
                                    class="font-medium text-gray-700">{{ __('Hide Reviews') }}</label>
                            </div>
                        </div>
                        <div class="relative flex items-start">
                            <div class="flex items-center h-5">
                                <input id="show-stock" aria-describedby="show-stock-description" name="show-stock" wire:model.defer="show_stock"
                                    type="checkbox"
                                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            </div>
                            <div class="text-sm ltr:ml-3 rtl:mr-3">
                                <label for="show-stock"
                                    class="font-medium text-gray-700">{{ __('Show Stock') }}</label>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <!-- Images information -->
                <div class="py-1 my-3 border-b">
                    <h3 class="text-gray-900">{{ __('Product Images') }}</h3>
                    <p class="text-xs text-gray-500">{{ __('First image will be the product main image.') }}</p>
                </div>
                <div>
                    <div class="flex flex-col" x-data="drop_file_component()">
                        <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <label x-on:drop="dropingFile = false" x-on:drop.prevent="handleFileDrop($event)"
                                x-on:dragover.prevent="dropingFile = true"
                                x-on:dragleave.prevent="dropingFile = false"
                                class="relative inline-flex items-center w-full p-3 py-2 overflow-hidden leading-tight transition duration-500 ease-in-out bg-white border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:bg-gray-200 group hover:border-blue-400"
                                x-bind:class="dropingFile ? 'bg-gray-200 border-blue-400' : ''">
                                <div class="flex items-center justify-center flex-1 px-4 py-2 mt-10">
                                    <svg class="w-8 h-8 -mt-2 text-gray-300 transition duration-500 ease-in-out transform ltr:-mr-5 rtl:-ml-5 -rotate-6 group-hover:text-indigo-300"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                                        <rect width="256" height="256" fill="none"></rect>
                                        <g>
                                            <circle cx="99.99951" cy="92" r="12"></circle>
                                            <path
                                                d="M208.00049,31.99963h-160a16.01833,16.01833,0,0,0-16,16V175.97369l-.001.0307.001,31.99524a16.01833,16.01833,0,0,0,16,16h160a16.01833,16.01833,0,0,0,16-16v-160A16.01834,16.01834,0,0,0,208.00049,31.99963Zm-28.68653,80a16.019,16.019,0,0,0-22.62792,0l-44.68555,44.68653L91.314,135.99963a16.02161,16.02161,0,0,0-22.62792,0L48.00049,156.68457V47.99963h160l.00586,92.6922Z">
                                            </path>
                                        </g>
                                    </svg>
                                    <svg class="relative w-8 h-8 text-gray-400 transition duration-500 ease-in-out transform rotate-3 group-hover:text-indigo-500"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                                        <rect width="256" height="256" fill="none"></rect>
                                        <path
                                            d="M168.001,100.00017v.00341a12.00175,12.00175,0,1,1,0-.00341ZM232,56V200a16.01835,16.01835,0,0,1-16,16H40a16.01835,16.01835,0,0,1-16-16V56A16.01835,16.01835,0,0,1,40,40H216A16.01835,16.01835,0,0,1,232,56Zm-15.9917,108.6936L216,56H40v92.68575L76.68652,112.0002a16.01892,16.01892,0,0,1,22.62793,0L144.001,156.68685l20.68554-20.68658a16.01891,16.01891,0,0,1,22.62793,0Z">
                                        </path>
                                    </svg>

                                    <span class="text-sm text-gray-600 ltr:ml-2 rtl:mr-2">
                                        {{ __('Drop & drop or Browse images') }}
                                    </span>
                                </div>
                                <input type="file" class="hidden" wire:model.defer="images" multiple
                                    accept="image/*">
                            </label>
                            <!-- Progress Bar -->
                            <div x-show="isUploading">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                        </div>
                        @if ($images)
                            <div
                                class="grid grid-cols-1 p-2 my-10 border-2 border-blue-400 border-dashed rounded-md lg:grid-cols-3">
                                @foreach ($images as $image)
                                    <div wire:key="{{ $loop->index }}"
                                        class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none pt-[100%]">
                                        <button
                                            class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none"
                                            type="button" wire:click="removePreview({{ $loop->index }})">
                                            <svg class="w-4 h-4 text-red-700" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                        <div>
                                            <img class="absolute inset-0 z-0 object-fill w-full h-full border-2 border-white"
                                                src="{{ $image->temporaryUrl() }}" />
                                        </div>

                                        <div
                                            class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                            <span
                                                class="w-full font-bold text-gray-900 truncate">{{ $image->getClientOriginalName() }}</span>
                                            <span
                                                class="text-xs text-gray-900">{{ Helper::bytesToHuman($image->getSize()) }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-2 mt-4 border-t sm:col-span-2 sm:flex sm:justify-end">
            <div class="flex justify-end">
                <button type="button" class="btn-cancel">
                    {{ __('Cancel') }}
                </button>
                <button type="submit" class="ltr:ml-3 rtl:mr-3 btn">
                    {{ __('Save') }}
                </button>
            </div>
        </div>
    </form>
    <script>
        function drop_file_component() {
            return {
                dropingFile: false,
                handleFileDrop(e) {
                    if (event.dataTransfer.files.length > 0) {
                        const files = e.dataTransfer.files;
                        @this.uploadMultiple('images', files,
                            (uploadedFilename) => {}, () => {}, (event) => {}
                        )
                    }
                }
            };
        }
    </script>
</div>
