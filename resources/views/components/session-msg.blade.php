<div>
    @php
        $flag = 0;
        if (session()->has('success') || session()->has('error')) {
            $flag = 1;
        }
    @endphp
    <!-- Global notification live region, render this permanently at the end of the document -->
    <div aria-live="assertive" id="alert" x-cloak x-data="{ show: {{ $flag }} }" x-show="show" x-init="setTimeout(() => show = false, 2000)"
        class="fixed flex inset-0 top-[12%] ltr:right-[20%] ltr:left-0 rtl:left-[20%] rtl:right-0  items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start">
        <div class="flex flex-col items-center w-full space-y-4 sm:items-end"
            x-transition:enter="transform ease-out duration-300"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">
            <div
                class="w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-lg pointer-events-auto ring-1 ring-black ring-opacity-5">
                <div class="p-3">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            @if (session()->has('success'))
                                <!-- Heroicon name: outline/check-circle -->
                                <svg class="w-6 h-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            @elseif(session()->has('error'))
                                <!-- Heroicon name: solid/exclamation -->
                                <svg class="w-5 h-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            @endif
                        </div>
                        <div class="ltr:ml-3 rtl:mr-3 w-0 flex-1 pt-0.5">
                            <p class="text-sm font-medium text-gray-900">{{ __('Successfully saved!') }}</p>
                        </div>
                        <div class="flex flex-shrink-0 ltr:ml-4 rtl:mr-4">
                            <button type="button" onclick="document.getElementById('alert').remove();"
                                class="inline-flex text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="sr-only">Close</span>
                                <!-- Heroicon name: solid/x -->
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
