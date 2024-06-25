<div class="screen py-10 bg-gray-100 min-h-screen" x-data="{ openModel: false }">
    <x-session-msg />
    <div class="w-full sm:flex sm:items-center justify-between">
        <div class="w-full sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900 w-40">{{ __('All Users') }}</h1>
        </div>
        <div class="flex justify-end w-full sm:flex-auto">
            <x-search-box />
        </div>
    </div>
    <div class="flex flex-col mt-4">
        <div class="-mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300 relative z-0">
                        <thead class="bg-gray-50">
                            <tr
                                class="text-xs text-gray-500 font-medium uppercase border-b ltr:text-left rtl:text-right">

                                <th scope="col" class="px-2 py-3">
                                    {{ __('Name') }}
                                </th>

                                <th scope="col" class="px-2 py-3">
                                    {{ __('Role') }}
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    {{ __('Created at') }}
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
                        <tbody class="bg-white divide-y divide-gray-200 pb-56">
                            @if (count($users))
                                @foreach ($users as $key => $user)
                                    <tr class="text-xs text-gray-700">
                                        <td class="px-2 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <!-- Avatar with inset shadow -->
                                                <div
                                                    class="relative hidden w-8 h-8 ltr:mr-3 rtl:ml-3 rounded-full md:block">
                                                    <img class="object-cover w-full h-full rounded-sm"
                                                        src="{{ $user->profile_photo_url }}" alt=""
                                                        loading="lazy">
                                                    <div class="absolute inset-0 shadow-inner" aria-hidden="true">
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="">{{ $user->name }}</p>
                                                    <p class="text-gray-500">{{ $user->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-2 py-3 whitespace-nowrap">
                                            {{ $user->roles->pluck('name')[0] ?? '' }}
                                        </td>
                                        <td class="px-2 py-3 whitespace-nowrap">
                                            {{ $user->created_at->format('d M Y') }}
                                        </td>
                                        <td class="px-2 py-3 whitespace-nowrap">
                                            <div class="relative">
                                                <button wire:click="enabled({{ $user->id }})" type="button"
                                                    class="{{ $user->enabled ? 'bg-indigo-600' : 'bg-gray-200' }} relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                    role="switch" aria-checked="false">
                                                    <span aria-hidden="true"
                                                        class="pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200
                                                        {{ $user->enabled ? 'ltr:translate-x-5 rtl:-translate-x-5' : '' }}"></span>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="px-2 py-3 whitespace-nowrap">
                                            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                                <button wire:click="view({{ $user->id }})"
                                                    class="text-green-600 hover:text-green-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        <path fill-rule="evenodd"
                                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <button wire:click="edit({{ $user->id }})"
                                                    class="text-indigo-600 hover:text-indigo-900">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                        </path>
                                                    </svg>
                                                </button>
                                                @if ($user->id != 1)
                                                    <button wire:click="deleteId({{ $user->id }})"
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
    <!-- user model -->
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
                            <h1>{{ !$this->readOnly ? __('Edit User') : __('View User') }}
                            </h1>
                        </div>
                        <button
                            class="absolute top-0 px-2 m-1 mt-3 text-gray-200 hover:text-white ltr:right-0 rtl:left-0"
                            wire:click="closeModal()">
                            <span class="sr-only">Close</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <div class="px-4 pt-5 pb-4 ltr:text-left rtl:text-right sm:p-6">
                            <div>
                                <div class="">
                                    <label for="name"
                                        class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        {{-- <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm"> $ </span>
                                        </div> --}}
                                        <input type="text" wire:model.defer="name"
                                            {{ $readOnly ? 'disabled' : '' }} required
                                            class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            placeholder="Name" aria-describedby="name">
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
                                <div class="mt-4">
                                    <label for="email"
                                        class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <input type="email" wire:model.defer="email"
                                            {{ $readOnly ? 'disabled' : '' }} required
                                            class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            placeholder="{{ __('Email') }}" aria-describedby="email">
                                        <div
                                            class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                            <span class="text-gray-500 sm:text-xs" id="email">
                                                {{ __('Required') }}
                                            </span>
                                        </div>
                                    </div>
                                    @error('email')
                                        <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <label for="category" class="block text-sm font-medium text-gray-900">
                                        {{ __('Role') }}
                                    </label>
                                    <div class="mt-1">
                                        <select wire:model.defer="role" id="role" name="role"
                                            {{ $readOnly ? 'disabled' : '' }}
                                            class="block w-full px-2 py-2 text-gray-700 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                            @foreach ($roles as $rol)
                                                {{-- @if ($rol->name != $this->role) --}}
                                                <option value="{{ $rol->name }}" wire:key="{{ $rol->name }}">
                                                    {{ $rol->name }}
                                                </option>
                                                {{-- @endif --}}
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="mt-4">
                                    <div class="flex justify-between">
                                        <label for="address"
                                            class="block text-sm font-medium text-gray-900">{{ __('Address') }}</label>
                                        <span id="description-max"
                                            class="text-xs text-gray-500">{{ __('Max. 255 characters') }}</span>
                                    </div>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <textarea rows="4" wire:model.defer="description" {{ $readOnly ? 'disabled' : '' }}
                                            class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            placeholder="{{ __('Description') }}" aria-describedby="description">
                                        </textarea>
                                        <div
                                            class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                            <span class="text-gray-500 sm:text-xs" id="description">
                                                {{ __('Required') }}
                                            </span>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="mt-4">
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
                                </div> --}}

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
    {{-- Delete Model --}}
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
                                    {{ __('Delete user') }}
                                    <span class="font-semibold">{{ $this->user->name }}</span>
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        {{ __('Are you sure you want to delete this user?') }}
                                    </p>
                                    <p class="text-sm text-red-500 uppercase">
                                        {{ __('All data of this user will be deleted.') }}
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
</div>
