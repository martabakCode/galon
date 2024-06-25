<div class="screen py-10 bg-gray-100 min-h-screen" x-data="{ openModel: false }">
    <x-session-msg />
    <div class="w-full sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">{{ __('All Categories') }}</h1>
        </div>
        <div class="mt-4 sm:mt-0 sm:flex-none">
            <button wire:click="create()"
                class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                {{ __('Add Category / Subcategory') }}
            </button>
        </div>
    </div>
    <div class="flex flex-col mt-8">
        <div class="flex justify-end w-full">
            <x-search-box />
        </div>
        <div class="-mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr class="text-sm text-gray-500 uppercase border-b ltr:text-left rtl:text-right">
                                <th scope="col" class="w-4 px-2 py-3">
                                    {{ __('Sort') }}
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    {{ __('Category') }}
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    {{ __('Sub Category') }}
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    {{ __('Slug') }}
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    {{ __('Products') }}
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    {{ __('Status') }}
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    <span class="sr-only">View</span>
                                    <span class="sr-only">Edit</span>
                                    <span class="sr-only">Delete</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if (count($categories))
                                @foreach ($this->categories as $category)
                                    <tr class="text-xs text-gray-700">
                                        <td class="px-4 py-3 whitespace-nowrap">{{ $category->sort }}</td>
                                        <td class="px-2 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div
                                                    class="relative hidden w-8 h-8 rounded-full ltr:mr-3 rtl:ml-3 md:block">
                                                    @if ($category->media())
                                                        <img class="object-cover w-full h-full rounded-sm"
                                                            src="{{ asset('storage/' . $category->media()->path) }}"
                                                            alt="" loading="lazy">
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-8 w-8 text-gray-300" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        </svg>
                                                    @endif
                                                    <div class="absolute inset-0 rounded-full shadow-inner"
                                                        aria-hidden="true">
                                                    </div>
                                                </div>
                                                <div>
                                                    <a
                                                        href="{{ route('category', $category->getTranslation('slug', App::getLocale())) }}">{{ $category->getTranslation('name', App::getLocale()) }}</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td>
                                            <a
                                                href="{{ route('category', $category->getTranslation('slug', App::getLocale())) }}">{{ $category->getTranslation('slug', App::getLocale()) }}</a>
                                        </td>
                                        <td class="px-2 py-3 whitespace-nowrap">{{ count($category->products) }}
                                        </td>
                                        <td class="px-2 py-3 whitespace-nowrap">
                                            <div class="relative">
                                                <button wire:click="enabled({{ $category->id }})" type="button"
                                                    class="{{ $category->enabled ? 'bg-indigo-600' : 'bg-gray-200' }} relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                    role="switch" aria-checked="false">
                                                    <span aria-hidden="true"
                                                        class="pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200
                                                        {{ $category->enabled ? 'ltr:translate-x-5 rtl:-translate-x-5' : '' }}"></span>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="px-2 py-3 whitespace-nowrap">
                                            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                                <button wire:click="view({{ $category->id }})"
                                                    class="text-green-600 hover:text-green-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        <path fill-rule="evenodd"
                                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <button wire:click="edit({{ $category->id }})"
                                                    class="text-indigo-600 hover:text-indigo-900">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                        </path>
                                                    </svg>
                                                </button>
                                                @if ($category->id != 1)
                                                    <button wire:click="deleteId({{ $category->id }})"
                                                        class="text-red-600 hover:text-red-900">
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @foreach ($category->sub_categories() as $subc)
                                        <tr class="text-xs text-gray-700">
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                {{ $category->sort . '-' . $subc->sort }}
                                            </td>
                                            <td></td>
                                            <td class="px-2 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <!-- Avatar with inset shadow -->
                                                    <div
                                                        class="relative hidden w-8 h-8 rounded-full ltr:mr-3 rtl:ml-3 md:block">
                                                        @if ($subc->media())
                                                            <img class="object-cover w-full h-full rounded-sm"
                                                                src="{{ asset('storage/' . $subc->media()->path) }}"
                                                                alt="" loading="lazy">
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-8 w-8 text-gray-300" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor"
                                                                stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            </svg>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <a
                                                            href="{{ route('category', $subc->getTranslation('slug', App::getLocale())) }}">{{ $subc->getTranslation('name', App::getLocale()) }}</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a
                                                    href="{{ route('category', $subc->getTranslation('slug', App::getLocale())) }}">{{ $subc->getTranslation('slug', App::getLocale()) }}</a>
                                            </td>
                                            <td class="px-2 py-3 whitespace-nowrap">{{ count($subc->products) }}
                                            </td>
                                            <td class="px-2 py-3 whitespace-nowrap">
                                                <div class="relative">
                                                    <button wire:click="enabled({{ $subc->id }})" type="button"
                                                        class="{{ $subc->enabled ? 'bg-indigo-600' : 'bg-gray-200' }} relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                        role="switch" aria-checked="false">
                                                        <span aria-hidden="true"
                                                            class="pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200
                                                            {{ $subc->enabled ? 'translate-x-5 rtl:-translate-x-5' : '' }}"></span>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="px-2 py-3 whitespace-nowrap">
                                                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                                    <button wire:click="view({{ $subc->id }})"
                                                        class="text-green-600 hover:text-green-900">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                            <path fill-rule="evenodd"
                                                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                    <button wire:click="edit({{ $subc->id }})"
                                                        class="text-indigo-600 hover:text-indigo-900">
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <button wire:click="deleteId({{ $subc->id }})"
                                                        class="text-red-600 hover:text-red-900">
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                <!-- More people... -->
                            @else
                                <tr>
                                    <td colspan="7" class="py-2 text-center">
                                        {{ __('No data available!') }}
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Category model -->
    @if ($this->isOpen)
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>
            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative overflow-hidden transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:max-w-lg sm:w-full ">
                        <div class="flex items-center justify-center w-full h-12 px-2 mx-auto text-white bg-blue-500">
                            <!-- Heroicon name: outline/check -->
                            <h1>{{ !$this->readOnly ? __('Add Category / Subcategory') : __('View Category / Subcategory') }}
                            </h1>
                        </div>
                        <button
                            class="absolute top-0 px-2 m-1 mt-3 text-gray-200 hover:text-white ltr:right-0 rtl:left-0"
                            wire:click="closeModal()">
                            <span class="sr-only">Close</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <div class="px-4 pt-5 pb-4 ltr:text-left rtl:text-right sm:p-6">
                            <div>
                                <div class="">
                                    <label for="name_en"
                                        class="block text-sm font-medium text-gray-700">{{ __('Name') }}&nbsp;{{ __('English') }}</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        {{-- <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm"> $ </span>
                                        </div> --}}
                                        <input type="text" wire:model.defer="name"
                                            {{ $readOnly ? 'disabled' : '' }} required
                                            class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            placeholder="Name" aria-describedby="name_en">
                                        <div
                                            class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                            <span class="text-gray-500 sm:text-xs" id="name_id">
                                                {{ __('Required') }}
                                            </span>
                                        </div>
                                    </div>
                                    @error('name')
                                        <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <label for="name_id"
                                        class="block text-sm font-medium text-gray-700">{{ __('Name') }}&nbsp;{{ __('Indonesia') }}</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <input type="text" wire:model.defer="name_id"
                                            {{ $readOnly ? 'disabled' : '' }} required
                                            class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            placeholder="{{ __('Name') }}" aria-describedby="name_id">
                                        <div
                                            class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                            <span class="text-gray-500 sm:text-xs" id="name_id">
                                                {{ __('Required') }}
                                            </span>
                                        </div>
                                    </div>
                                    @error('name_id')
                                        <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <label for="category" class="block text-sm font-medium text-gray-900">
                                        {{ __('Category') }}
                                    </label>
                                    <div class="mt-1">
                                        <select wire:model.defer="parent_id" id="parent_id" name="parent_id"
                                            {{ $readOnly ? 'disabled' : '' }}
                                            class="block w-full px-2 py-2 text-gray-700 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                            <option value='0'>---</option>
                                            @foreach ($this->categories as $category)
                                                @if ($category->id != $this->category->id)
                                                    <option value="{{ $category->id }}"
                                                        wire:key="{{ $category->id }}">
                                                        {{ $category->getTranslation('name', App::getLocale()) }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="flex justify-between">
                                        <label for="description_en" class="block text-sm font-medium text-gray-900">
                                            {{ __('Description') }} {{ __('English') }}
                                        </label>
                                        <span id="description_en-max"
                                            class="text-xs text-gray-500">{{ __('Max. 255 characters') }}</span>
                                    </div>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <textarea rows="4" wire:model.defer="description_en" {{ $readOnly ? 'disabled' : '' }}
                                            class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            placeholder="{{ __('Description') }} {{ __('English') }}" aria-describedby="description_en">
                                        </textarea>
                                        <div
                                            class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                            <span class="text-gray-500 sm:text-xs" id="description">
                                                {{ __('Required') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="flex justify-between">
                                        <label for="description_id" class="block text-sm font-medium text-gray-900">
                                            {{ __('Description') }} {{ __('Indonesia') }}
                                        </label>
                                        <span id="description_id-max"
                                            class="text-xs text-gray-500">{{ __('Max. 255 characters') }}</span>
                                    </div>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <textarea rows="4" wire:model.defer="description_id" {{ $readOnly ? 'disabled' : '' }}
                                            class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            placeholder="الوصف بالعربي" aria-describedby="description_id">
                                        </textarea>
                                        <div
                                            class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                            <span class="text-gray-500 sm:text-xs" id="description_id">
                                                {{ __('Required') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label for="sort"
                                        class="block text-sm font-medium text-gray-700">{{ __('Sort') }}</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <input type="number" wire:model.defer="sort"
                                            {{ $readOnly ? 'disabled' : '' }}
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

                                <div class="mt-4">
                                    @if ($this->image && isset($this->image->path))
                                        <div
                                            class="relative z-0 inline-flex items-center w-full py-2 pl-3 pr-4 overflow-hidden transition duration-500 ease-in-out border-2 border-gray-300 border-dashed rounded-lg marker:cursor-pointer group hover:border-blue-400">
                                            <div
                                                class="relative flex flex-col items-center justify-center w-40 h-40 overflow-hidden text-center bg-gray-100 border rounded cursor-pointer select-none">
                                                <button
                                                    class="absolute top-0 right-0 z-10 w-5 h-5 bg-white rounded-bl focus:outline-none"
                                                    type="button" wire:click="removePreview()"
                                                    x-on:click="isUploading=false">
                                                    <svg class="w-4 h-4 text-red-700"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                                <div>
                                                    <img class="absolute inset-0 z-0 object-fill w-40 h-40 border-4 border-white"
                                                        src="{{ asset('storage/' . $image->path) }}" />
                                                </div>

                                                <div
                                                    class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                                    <span class="w-full font-bold text-gray-900 truncate">
                                                        {{ $image->name }}
                                                    </span>
                                                    <span class="text-xs text-gray-900">
                                                        {{ Helper::bytesToHuman($image->size) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($image)
                                        <div
                                            class="relative z-0 inline-flex items-center w-full py-2 pl-3 pr-4 overflow-hidden transition duration-500 ease-in-out border-2 border-gray-300 border-dashed rounded-lg marker:cursor-pointer group hover:border-blue-400">
                                            <div
                                                class="relative flex flex-col items-center justify-center w-40 h-40 overflow-hidden text-center bg-gray-100 border rounded cursor-pointer select-none">
                                                <button
                                                    class="absolute top-0 right-0 z-10 w-5 h-5 bg-white rounded-bl focus:outline-none"
                                                    type="button" wire:click="removePreview()"
                                                    x-on:click="isUploading=false">
                                                    <svg class="w-4 h-4 text-red-700"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                                <div>
                                                    <img class="absolute inset-0 z-0 object-fill w-40 h-40 border-4 border-white"
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
                                        <div class="flex flex-col" x-data="drop_file_component()">
                                            <div x-data="{ isUploading: false, progress: 0 }"
                                                x-on:livewire-upload-start="isUploading = true"
                                                x-on:livewire-upload-finish="isUploading = false"
                                                x-on:livewire-upload-error="isUploading = false"
                                                x-on:livewire-upload-progress="progress = $event.detail.progress">
                                                <label x-on:drop="dropingFile = false"
                                                    x-on:drop.prevent="handleFileDrop($event)"
                                                    x-on:dragover.prevent="dropingFile = true"
                                                    x-on:dragleave.prevent="dropingFile = false"
                                                    class="relative inline-flex items-center w-full p-3 py-2 overflow-hidden leading-tight transition duration-500 ease-in-out bg-white border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:bg-gray-200 group hover:border-blue-400"
                                                    x-bind:class="dropingFile ? 'bg-gray-200 border-blue-400' : ''">
                                                    <div
                                                        class="flex items-center justify-center flex-1 px-4 py-2 mt-10">
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

                                                        <span
                                                            class="text-sm text-gray-600 ltr:ml-2 rtl:mr-2">{{ __('Drop & drop or Browse image') }}
                                                    </div>
                                                    <input type="file" class="hidden" wire:model.defer="image"
                                                        accept="image/*">
                                                </label>
                                                @error('image')
                                                    <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                                                @enderror
                                                <!-- Progress Bar -->
                                                <div x-show="isUploading" class="w-full">
                                                    <progress max="100" x-bind:value="progress"
                                                        class="w-full"></progress>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if (!$readOnly)
                                <div class="flex flex-row-reverse w-full mt-5 sm:mt-4">
                                    <button type="button" wire:click="save()"
                                        class="w-1/2 sm:w-auto btn ltr:ml-3 rtl:mr-3 sm:text-sm">{{ __('Save') }}</button>
                                    <button type="button" wire:click="closeModal()"
                                        class="w-1/2 sm:w-auto btn-cancel">{{ __('Cancel') }}</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($this->isDeleteOpen)
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative px-4 pt-5 pb-4 overflow-hidden transition-all transform bg-white rounded-lg shadow-xl ltr:text-left rtl:text-right sm:my-8 sm:max-w-lg sm:w-full sm:p-6">
                        <div class="absolute top-0 hidden pt-4 sm:block ltr:right-0 rtl:left-0 ltr:pr-4 rtl:pl-4">
                            <button type="button" wire:click="closeDeleteModal()"
                                class="text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="sr-only">Close</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="sm:flex sm:items-start">
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                <!-- Heroicon name: outline/exclamation -->
                                <svg class="w-6 h-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <div
                                class="mt-3 text-center sm:mt-0 ltr:sm:ml-4 ltr:sm:text-left rtl:sm:mr-4 rtl:sm:text-right">
                                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">
                                    {{ __('Delete category') }}
                                    <span
                                        class="font-semibold">{{ $this->category->getTranslation('name', App::getLocale()) }}</span>
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        {{ __('Are you sure you want to delete this category?') }}
                                    </p>
                                    <p class="text-sm text-red-500 uppercase">
                                        {{ __('All subcategories of this category will be deleted. Make sure to move sub categories into another category before delete') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row-reverse w-full mt-5 sm:mt-4">
                            <button type="button" wire:click="delete()"
                                class="w-1/2 sm:w-auto btn-danger ltr:ml-3 rtl:mr-3 sm:text-sm">{{ __('Confirm') }}</button>
                            <button type="button" wire:click="closeDeleteModal()"
                                class="w-1/2 sm:w-auto btn-cancel">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <script>
        function drop_file_component() {
            return {
                dropingFile: false,
                handleFileDrop(e) {
                    if (event.dataTransfer.files.length > 0) {
                        const files = e.dataTransfer.files;
                        @this.uploadMultiple('image', files,
                            (uploadedFilename) => {}, () => {}, (event) => {}
                        )
                    }
                }
            };
        }
    </script>
</div>
