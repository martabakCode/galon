<div class="py-10 bg-gray-100 screen">
    <h2 class="sr-only">Add post</h2>
    <div class="flex justify-between pb-2 border-b">
        <h3 class="text-lg font-medium text-gray-900">{{ __('Add Post') }}</h3>
        <a href="{{ route('blog.posts') }}" class="btn-cancel">
            {{ __('Back') }}
        </a>
    </div>
    <form id="new_product_form" class="relative" wire:submit.prevent="save">

        <div class="grid grid-cols-1 gap-2 divide-x-2 lg:grid-cols-3 rtl:divide-x-reverse">
            <!-- Contact form -->
            <div class="mt-6 lg:col-span-2">
                <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                    <div class="sm:col-span-2">
                        <div class="flex justify-between">
                            <label for="title_en" class="block text-sm font-medium text-gray-700">
                                {{ __('Title') }} {{ __('English') }}
                            </label>
                            <p class="text-xs text-gray-500 peer-optional:hidden">{{ __('Required') }}</p>
                        </div>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <textarea type="text" wire:model.defer="title_en" {{ $readOnly ? 'disabled' : '' }} required dir="ltr"
                                    class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="{{ __('Title') }}" aria-describedby="title_en">
                                </textarea>
                            </div>
                            @error('title_en')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <div class="flex justify-between">
                            <label for="title_en" class="block text-sm font-medium text-gray-700">
                                {{ __('Title') }} {{ __('Indonesia') }}
                            </label>
                            <p class="text-xs text-gray-500 peer-optional:hidden">{{ __('Required') }}</p>
                        </div>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <textarea type="text" wire:model.defer="title_id" {{ $readOnly ? 'disabled' : '' }} dir="rtl" required
                                    class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="{{ __('Title') }}" aria-describedby="title_id">
                                </textarea>
                            </div>
                        </div>
                        @error('title_id')
                            <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <div wire:ignore>
                            {{-- <div class="flex justify-between"> --}}
                            <label for="content_en" class="block text-sm font-medium text-gray-900">
                                {{ __('Content') }} {{ __('English') }}
                            </label>
                            {{-- <p class="text-xs text-gray-500 peer-optional:hidden">{{ __('Required') }}</p> --}}
                            {{-- </div> --}}
                            <div class="mt-1">
                                <textarea x-data x-ref='ckEditor' x-init="ClassicEditor
                                    .create($refs.ckEditor, {
                                        language: 'en'
                                    }).then(function(editor) {
                                        editor.model.document.on('change:data', () => {
                                            @this.set('content_en', editor.getData());
                                        });
                                    })
                                    .catch(error => {

                                    });" wire:model='content_en' class="resize-none form-control"
                                    rows="10">
                            </textarea>
                            </div>
                        </div>
                        @error('content_en')
                            <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <div wire:ignore>
                            {{-- <div class="flex justify-between"> --}}
                            <label for="content_id" class="block text-sm font-medium text-gray-900">
                                {{ __('Content') }} {{ __('Indonesia') }}
                            </label>
                            {{-- <p class="text-xs text-gray-500 peer-optional:hidden">{{ __('Required') }}</p> --}}
                            {{-- </div> --}}
                            <div class="mt-1">
                                <textarea x-data x-ref='ckEditor' x-init="ClassicEditor
                                    .create($refs.ckEditor, {
                                        language: 'id'
                                    }).then(function(editor) {
                                        editor.model.document.on('change:data', () => {
                                            @this.set('content_id', editor.getData());
                                        });
                                    })
                                    .catch(error => {

                                    });" wire:model='content_id' class="resize-none form-control"
                                    rows="10">
                            </textarea>
                            </div>
                        </div>
                        @error('content_id')
                            <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                        @enderror
                    </div>

                    <div x-cloak class="sm:col-span-2" x-data="{ content_en: '', limit: $el.dataset.limit }" data-limit="255">
                        <div class="flex justify-between">
                            <label for="excerpt_en" class="block text-sm font-medium text-gray-700">
                                {{ __('Excerpt') }} {{ __('English') }}
                                <span class="text-xs text-gray-500">
                                    ({{ __('Max. 255 characters') }})
                                </span>
                            </label>
                            {{-- <p class="text-xs text-gray-500 peer-optional:hidden">{{ __('Required') }}</p> --}}
                        </div>
                        <p x-ref="remaining" class="text-xs text-gray-500">
                            {{ __('Remaining') }}
                            <span class="font-bold" x-text="limit - content_en.length"></span>
                            {{ __('character') }}.
                        </p>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <textarea ref="content_en" x-model="content_en" x-bind:maxlength="limit" rows="3" dir="ltr"
                                    wire:model.defer="excerpt_en" {{ $readOnly ? 'disabled' : '' }}
                                    class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="{{ __('Short description') }}" aria-describedby="excerpt_en">
                                </textarea>
                            </div>

                            @error('excerpt_en')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div x-cloak class="sm:col-span-2" x-data="{ content: '', limit: $el.dataset.limit }" data-limit="255">
                        <div class="flex justify-between">
                            <label for="excerpt_id" class="block text-sm font-medium text-gray-700">
                                {{ __('Excerpt') }} {{ __('Indonesia') }}
                                <span class="text-xs text-gray-500">
                                    ({{ __('Max. 255 characters') }})
                                </span>
                            </label>
                            {{-- <p class="text-xs text-gray-500 peer-optional:hidden">{{ __('Required') }}</p> --}}
                        </div>
                        <p x-ref="remaining" class="text-xs text-gray-500">
                            {{ __('Remaining') }}
                            <span class="font-bold" x-text="limit - content.length"></span>
                            {{ __('character') }}.
                        </p>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <textarea ref="content" x-model="content" dir="rtl" x-bind:maxlength="limit" rows="3"
                                    wire:model.defer="excerpt_id" {{ $readOnly ? 'disabled' : '' }}
                                    class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="{{ __('Short description') }}" aria-describedby="excerpt_id">
                                </textarea>
                            </div>

                            @error('excerpt_id')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="flex justify-between">
                            <label for="category" class="block text-sm font-medium text-gray-900">
                                {{ __('Post category') }}
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
                        <label for="sort" class="block text-sm font-medium text-gray-700">
                            {{ __('Sort') }}
                        </label>
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
                    {{-- <div>
                        <label for="time_read"
                            class="block text-sm font-medium text-gray-700">{{ __('Time read') }}</label>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="number" wire:model.defer="time_read" {{ $readOnly ? 'disabled' : '' }}
                                    class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="1" aria-describedby="time_read">
                                <div
                                    class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                    <span class="text-gray-500 sm:text-xs" id="time_read">
                                        {{ __('Required') }}
                                    </span>
                                </div>
                            </div>
                            @error('time_read')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div> --}}

                    <!-- Tags -->
                    <div class="col-span-2">
                        <label for="tags" class="block text-sm font-medium text-gray-700">
                            {{ __('Post tags') }}
                        </label>
                        <x-tags />
                    </div>
                    <div class="">
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
                    </div>

                </div>
            </div>
            <div class="mt-6 overflow-hidden ltr:pl-2 rtl:pr-2">
                <!-- Images information -->
                <div class="py-1 my-3 border-b">
                    <h3 class="text-sm text-gray-700">{{ __('Post image') }}</h3>
                </div>
                <div class="flex flex-col">
                    @if ($image)
                        <div
                            class="relative z-0 inline-flex items-center w-full py-2 pl-3 pr-4 overflow-hidden transition duration-500 ease-in-out border-2 border-gray-300 border-dashed rounded-lg marker:cursor-pointer group hover:border-blue-400">
                            <div
                                class="relative flex flex-col items-center justify-center w-full overflow-hidden text-center bg-gray-100 border rounded cursor-pointer select-none h-60">
                                <button
                                    class="absolute top-0 right-0 z-10 w-5 h-5 bg-white rounded-bl focus:outline-none"
                                    type="button" wire:click="removePreview()" x-on:click="isUploading=false">
                                    <svg class="w-4 h-4 text-red-700" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                                <div>
                                    <img class="absolute inset-0 z-0 object-fill w-full border-4 border-white h-60"
                                        src="{{ $image->temporaryUrl() }}" />
                                </div>

                                <div
                                    class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                    <span class="w-full font-bold text-gray-900 truncate">
                                        {{ $image->getClientOriginalName() }}
                                    </span>
                                    <span class="text-xs text-gray-900">
                                        {{ Helper::bytesToHuman($image->getSize()) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="flex flex-col">
                            <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress">
                                <label
                                    class="relative inline-flex items-center w-full p-3 py-2 overflow-hidden leading-tight transition duration-500 ease-in-out bg-white border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:bg-gray-200 group hover:border-blue-400">
                                    <div class="flex items-center justify-center flex-1 px-4 py-2 mt-10">
                                        <svg class="w-8 h-8 -mt-2 text-gray-300 transition duration-500 ease-in-out transform ltr:-mr-5 rtl:-ml-5 -rotate-6 group-hover:text-indigo-300"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 256 256">
                                            <rect width="256" height="256" fill="none">
                                            </rect>
                                            <g>
                                                <circle cx="99.99951" cy="92" r="12">
                                                </circle>
                                                <path
                                                    d="M208.00049,31.99963h-160a16.01833,16.01833,0,0,0-16,16V175.97369l-.001.0307.001,31.99524a16.01833,16.01833,0,0,0,16,16h160a16.01833,16.01833,0,0,0,16-16v-160A16.01834,16.01834,0,0,0,208.00049,31.99963Zm-28.68653,80a16.019,16.019,0,0,0-22.62792,0l-44.68555,44.68653L91.314,135.99963a16.02161,16.02161,0,0,0-22.62792,0L48.00049,156.68457V47.99963h160l.00586,92.6922Z">
                                                </path>
                                            </g>
                                        </svg>
                                        <svg class="relative w-8 h-8 text-gray-400 transition duration-500 ease-in-out transform rotate-3 group-hover:text-indigo-500"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 256 256">
                                            <rect width="256" height="256" fill="none">
                                            </rect>
                                            <path
                                                d="M168.001,100.00017v.00341a12.00175,12.00175,0,1,1,0-.00341ZM232,56V200a16.01835,16.01835,0,0,1-16,16H40a16.01835,16.01835,0,0,1-16-16V56A16.01835,16.01835,0,0,1,40,40H216A16.01835,16.01835,0,0,1,232,56Zm-15.9917,108.6936L216,56H40v92.68575L76.68652,112.0002a16.01892,16.01892,0,0,1,22.62793,0L144.001,156.68685l20.68554-20.68658a16.01891,16.01891,0,0,1,22.62793,0Z">
                                            </path>
                                        </svg>

                                        <span class="text-sm text-gray-600 ltr:ml-2 rtl:mr-2">{{ __('Browse image') }}
                                    </div>
                                    <input type="file" class="hidden" wire:model.defer="image" accept="image/*">
                                </label>
                                @error('image')
                                    <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                                @enderror
                                <!-- Progress Bar -->
                                <div x-show="isUploading" class="w-full">
                                    <progress max="100" x-bind:value="progress" class="w-full"></progress>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="pt-2 mt-4 border-t sm:col-span-2 sm:flex sm:justify-end">
            <div class="flex justify-end">
                <button type="button" class="btn-cancel">
                    {{ __('Cancel') }}
                </button>
                <button type="submit" class="ltr:ml-3 rtl:mr-3 btn">
                    {{ __('Publish') }}
                </button>
            </div>
        </div>
    </form>
</div>
