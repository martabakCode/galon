<div class="min-h-screen py-10 bg-gray-100 screen">
    <x-session-msg />
    <div class="sm:flex sm:items-center">
        <div class="sm:flex w-1/2">
            <h1 class="text-xl font-semibold text-gray-900">{{ __('All Invoices') }}</h1>
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
                                    {{ __('Order') }}
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    {{ __('Total') }}
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    {{ __('Order status') }}
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    <span class="sr-only">View</span>
                                    {{-- <span class="sr-only">Edit</span>
                                    <span class="sr-only">Delete</span> --}}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($invoices as $invoice)
                                <tr class="text-xs text-gray-700">
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        {{ $invoice->id }}</td>
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        <a href="{{ route('invoice.view', $invoice->code) }}"
                                            class="text-blue-600 hover:text-blue-500">
                                            #{{ $invoice->code }}
                                        </a>
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        <a href="{{ route('order.view', $invoice->order->code) }}"
                                            class="text-blue-600 hover:text-blue-500">
                                            #{{ $invoice->order->code }}
                                        </a>
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        <x-currency :amount="$invoice->order->total" />
                                    </td>
                                    <td class="px-2 py-1 whitespace-nowrap">
                                        {{ __($invoice->order->status->name) }}
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                            <a href="{{ route('invoice.view', $invoice->code) }}"
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
</div>
