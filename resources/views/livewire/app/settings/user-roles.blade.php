<div class="screen py-10 bg-gray-100 min-h-screen" x-data="{ openModel: false }">
    <x-session-msg />
    <div class="w-full sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">{{ __('All Roles') }}</h1>
        </div>
        <div class="mt-4 sm:mt-0 sm:flex-none">
            <button wire:click="create()"
                class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                {{ __('Add Role') }}
            </button>
        </div>
    </div>
    <div class="flex flex-col mt-8">
        <div class="-mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr class="text-sm text-gray-500 uppercase border-b ltr:text-left rtl:text-right">
                                <th scope="col" class="w-4 px-4 py-3">
                                    {{ __('#') }}
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    {{ __('Role') }}
                                </th>
                                {{-- <th scope="col" class="px-2 py-3">
                                    {{ __('Users') }}
                                </th> --}}
                                <th scope="col" class="px-2 py-3">
                                    <span class="sr-only">View</span>
                                    <span class="sr-only">Edit</span>
                                    <span class="sr-only">Delete</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if (count($roles))
                                @foreach ($this->roles as $key => $role)
                                    <tr class="text-xs text-gray-700">
                                        <td class="px-4 py-3 whitespace-nowrap">{{ $key + 1 }}</td>
                                        <td class="px-2 py-3 whitespace-nowrap">{{ $role->name }}</td>
                                        {{-- <td class="px-2 py-3 whitespace-nowrap">4</td> --}}
                                        <td class="px-2 py-3 whitespace-nowrap">
                                            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                                <button wire:click="view({{ $role->id }})"
                                                    class="text-green-600 hover:text-green-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        <path fill-rule="evenodd"
                                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <button wire:click="edit({{ $role->id }})"
                                                    class="text-indigo-600 hover:text-indigo-900">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                        </path>
                                                    </svg>
                                                </button>
                                                @if ($role->id != 1)
                                                    <button wire:click="deleteId({{ $role->id }})"
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
    <!-- role model -->
    @if ($this->isOpen)
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>
            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative overflow-hidden transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:max-w-lg sm:w-full ">
                        <div class="flex items-center justify-center w-full h-12 px-2 mx-auto text-white bg-blue-500">
                            <!-- Heroicon name: outline/check -->
                            <h1>{{ !$this->readOnly ? __('Add Role') : __('View Role') }}
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

                            <div class="">
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <input type="text" wire:model.defer="name" {{ $readOnly ? 'disabled' : '' }}
                                        required
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
                                    {{ __('Delete Role') }}
                                    <span class="font-semibold">{{ $this->role->name }}</span>
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        {{ __('Are you sure you want to delete this role?') }}
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
