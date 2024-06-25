<div class="min-h-screen py-10 bg-gray-100 screen">
    <x-session-msg />
    <div class="sm:flex sm:items-center">
        <div class="sm:flex w-1/2">
            <h1 class="text-xl font-semibold text-gray-900">{{ __('All Messages') }}</h1>
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
                                    {{ __('Subject') }}
                                </th>

                                <th scope="col" class="px-2 py-3">
                                    {{ __('Send Date') }}
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    <span class="sr-only">View</span>
                                    {{-- <span class="sr-only">Edit</span>
                                    <span class="sr-only">Delete</span> --}}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($messages as $message)
                                <tr class="text-xs text-gray-700">
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        {{ $message->id }}
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        <div wire:click="view({{ $message->id }})"
                                            class="text-blue-600 hover:text-blue-500 hover:cursor-pointer">
                                            {{ $message->subject }}
                                        </div>
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        {{ $message->created_at->format('d M, Y') }}
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                            @if ($message->is_read)
                                                <button wire:click="view({{ $message->id }})"
                                                    class="text-green-600 hover:text-green-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        <path fill-rule="evenodd"
                                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            @else
                                                <button wire:click="view({{ $message->id }})"
                                                    class="text-yellow-600 hover:text-yellow-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        <path fill-rule="evenodd"
                                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            @endif
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
    @if ($this->isOpen)
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>
            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative overflow-hidden transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:max-w-lg sm:w-full ">
                        <div class="flex items-center justify-center w-full h-12 px-2 mx-auto text-white bg-blue-500">
                            <!-- Heroicon name: outline/check -->
                            <h1>{{ __('View Message') }}
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
                                    <label for="subject" class="block text-sm font-medium text-gray-900">
                                        {{ __('Subject') }}
                                    </label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <textarea wire:model.defer="subject" disabled
                                            class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            aria-describedby="subject">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label for="message" class="block text-sm font-medium text-gray-900">
                                        {{ __('Message') }}
                                    </label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <textarea wire:model.defer="content" disabled rows='5'
                                            class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            aria-describedby="content">
                                    </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
