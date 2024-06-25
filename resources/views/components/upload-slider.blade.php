<div>
    @if (!empty($image) && is_string($image))
        <div
            class="relative z-0 inline-flex items-center w-full py-2 pl-3 pr-4 overflow-hidden transition duration-500 ease-in-out border-2 border-gray-300 border-dashed rounded-lg marker:cursor-pointer group hover:border-blue-400">
            <div
                class="relative flex flex-col items-center justify-center w-{{ $width }} h-40 overflow-hidden text-center bg-gray-100 border rounded cursor-pointer select-none">
                <button class="absolute top-0 right-0 z-10 w-5 h-5 bg-white rounded-bl focus:outline-none" type="button"
                    wire:click="removePreview({{ $index }})" x-on:click="isUploading=false">
                    <svg class="w-4 h-4 text-red-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
                <div>
                    <img class="absolute inset-0 z-0 object-fill w-{{ $width }} h-40 border-4 border-white"
                        src="{{ asset('storage/' . $image) }}" />
                </div>
            </div>
        </div>
    @elseif($image && $image->temporaryUrl())
        <div
            class="relative z-0 inline-flex items-center w-full py-2 pl-3 pr-4 overflow-hidden transition duration-500 ease-in-out border-2 border-gray-300 border-dashed rounded-lg marker:cursor-pointer group hover:border-blue-400">
            <div
                class="relative flex flex-col items-center justify-center w-{{ $width }} h-40 overflow-hidden text-center bg-gray-100 border rounded cursor-pointer select-none">
                <button class="absolute top-0 right-0 z-10 w-5 h-5 bg-white rounded-bl focus:outline-none"
                    type="button" wire:click="removePreview({{ $index }})" x-on:click="isUploading=false">
                    <svg class="w-4 h-4 text-red-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
                <div>
                    <img class="absolute inset-0 z-0 object-fill w-{{ $width }} h-40 border-4 border-white"
                        src="{{ $image->temporaryUrl() }}" />
                </div>

                <div class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
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
                x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">
                <label
                    class="relative inline-flex items-center w-full p-3 py-2 overflow-hidden leading-tight transition duration-500 ease-in-out bg-white border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:bg-gray-200 group hover:border-blue-400">
                    <div class="flex items-center justify-center flex-1 px-4 py-2 mt-10">
                        <svg class="w-8 h-8 -mt-2 text-gray-300 transition duration-500 ease-in-out transform ltr:-mr-5 rtl:-ml-5 -rotate-6 group-hover:text-indigo-300"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
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
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none">
                            </rect>
                            <path
                                d="M168.001,100.00017v.00341a12.00175,12.00175,0,1,1,0-.00341ZM232,56V200a16.01835,16.01835,0,0,1-16,16H40a16.01835,16.01835,0,0,1-16-16V56A16.01835,16.01835,0,0,1,40,40H216A16.01835,16.01835,0,0,1,232,56Zm-15.9917,108.6936L216,56H40v92.68575L76.68652,112.0002a16.01892,16.01892,0,0,1,22.62793,0L144.001,156.68685l20.68554-20.68658a16.01891,16.01891,0,0,1,22.62793,0Z">
                            </path>
                        </svg>

                        <span class="text-sm text-gray-600 ltr:ml-2 rtl:mr-2">{{ __('Drop & drop or Browse image') }}
                    </div>
                    <input type="file" class="hidden" wire:model.defer="slider_images.{{ $index }}"
                        accept="image/*">
                </label>
                @error('slider{{ $index }}')
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
