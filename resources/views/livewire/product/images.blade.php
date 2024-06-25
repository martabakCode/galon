<div class="flex flex-col-reverse" x-data="{ activeImage: 1 }">
    <!-- Image selector -->
    @if (count($media))
        <div class="hidden w-full max-w-2xl mx-auto mt-6 sm:block lg:max-w-none">
            <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">
                @foreach ($media as $key => $thumbnail)
                    <button x-on:click="activeImage = {{ $key + 1 }}" id="image-{{ $key + 1 }}"
                        class="relative flex items-center justify-center h-24 text-sm font-medium text-gray-900 uppercase bg-white rounded-md cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-4 focus:ring-opacity-50"
                        aria-controls="tabs-{{ $key + 1 }}-panel-{{ $key + 1 }}" role="tab" type="button">
                        <span class="sr-only"> Angled view </span>
                        <span class="absolute inset-0 overflow-hidden rounded-md">
                            <img src="{{ asset('storage/' . $thumbnail->path) }}" alt=""
                                class="object-cover object-center w-full h-full" />
                        </span>
                        <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
                        <span
                            class="absolute inset-0 rounded-md pointer-events-none ring-transparent ring-2 ring-offset-2"
                            aria-hidden="true"></span>
                    </button>
                @endforeach
                <!-- More images... -->
            </div>
        </div>

        <div class="w-full aspect-w-1 aspect-h-1">
            <!-- Tab panel, show/hide based on tab state. -->
            @foreach ($media as $key => $preview)
                <div x-show="activeImage === {{ $key + 1 }}" id="image-panel-{{ $key + 1 }}"
                    aria-labelledby="tabs-1-tab-1" role="tabpanel">
                    <img src="{{ asset('storage/' . $preview->path) }}"
                        alt=""
                        class="object-cover object-center w-full h-full sm:rounded-lg" />
                </div>
            @endforeach
            <!-- More images... -->
        </div>
    @endif
</div>
