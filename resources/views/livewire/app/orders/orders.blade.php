<div class="min-h-screen py-10 bg-gray-100 screen">
    <x-session-msg />
    <div class="sm:flex sm:items-center">
        <div class="sm:flex w-1/2">
            <h1 class="text-xl font-semibold text-gray-900">{{ __('All Orders') }}</h1>
        </div>
        <div class="flex justify-end w-1/2">
            <x-search-box />
        </div>
    </div>
    <div class="flex flex-col mt-8">

        <div class="my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr
                                class="text-sm font-medium text-gray-500 uppercase border-b ltr:text-left rtl:text-right">
                                <th scope="col" class="px-2 py-3">
                                    {{ __('Id') }}
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    {{ __('Code') }}
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    {{ __('Customer name') }}
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    {{ __('Email') }}
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    {{ __('Phone') }}
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    {{ __('Total') }}
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    {{ __('Status') }}
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    <span class="sr-only">View</span>
                                    {{-- <span class="sr-only">Edit</span>
                                    <span class="sr-only">Delete</span> --}}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($orders as $order)
                                <tr class="text-xs text-gray-700">
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        {{ $order->id }}
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        <a href="{{ route('order.view', $order->code) }}"
                                            class="text-blue-600 hover:text-blue-500">
                                            #{{ $order->code }}
                                        </a>
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        {{ $order->customer_name ?? $order->user->name }}
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap">{{ $order->email }}
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap">{{ $order->phone }}
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        <x-currency :amount="$order->total" />
                                    </td>
                                    <td class="px-2 py-1 whitespace-nowrap">
                                        <div>
                                            <select id="status" name="status"
                                                wire:model.defer="order_status.{{ $order->id }}"
                                                wire:change="updateStatus({{ $order->id }})"
                                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                @foreach ($status as $st)
                                                    <option value="{{ $st->id }}">{{ __($st->name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                            <a href="{{ route('order.view', $order->code) }}"
                                                class="text-green-600 hover:text-green-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    <path fill-rule="evenodd"
                                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                            {{-- <a href="{{ route('app.edit.product', $order->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <button wire:click="deleteId({{ $order->id }})"
                                                class="text-red-600 hover:text-red-900">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

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
                                    {{ __('Delete order') }}
                                    <span class="font-semibold">{{ $this->order->code }}</span>
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        {{ __('Are you sure you want to delete this order?') }}
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
