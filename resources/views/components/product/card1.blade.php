<div class="relative overflow-hidden">
    <a href="{{ route('product.view', $product->getTranslation('slug', App::getLocale())) }}" class="text-sm group">
        <div class="w-full overflow-hidden bg-gray-100 rounded-lg apect-w-3 aspect-h-4 group-hover:opacity-75">
            <img src="{{ $product->image() }}" alt="{{ $product->getTranslation('name', App::getLocale()) }}"
                class="object-cover object-center w-full h-[230px]">
        </div>
    </a>
    @if($product->display->new)
        <div class="absolute top-0 left-0 w-16 h-16">
            <div
            class="absolute w-24 py-1 text-xs text-center text-gray-800 transform -rotate-45 bg-yellow-400 -left-7 top-2">
            {{ __('New') }}
            </div>
        </div>
    @elseif($product->display->featured)
        <div class="absolute top-0 left-0 w-16 h-16">
            <div
            class="absolute w-24 py-1 text-xs font-normal text-center text-gray-800 transform -rotate-45 bg-green-400 -left-7 top-2">
            {{ __('Featured') }}
            </div>
        </div>
    @elseif($product->display->promotion)
        <div class="absolute top-0 left-0 w-16 h-16">
            <div
            class="absolute w-24 py-1 text-xs font-normal text-center text-gray-800 transform -rotate-45 bg-red-400 -left-7 top-2">
            {{ __('Discount') }}
            </div>
        </div>
    @endif
    <div class="flex justify-end -mt-5">
        @if ($product->stock > 0)
            <button wire:click="addToCart({{ $product->id }})"
                class="relative inset-0 p-2 mx-5 -mb-4 text-white bg-blue-600 rounded-full hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                <!-- cart icon -->
                <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
            </button>
        @else
            <div class="relative inset-0 p-2 mx-5">
            </div>
        @endif
    </div>
    <div class="flex flex-col text-sm font-normal">
        <a href="{{ route('product.view', $product->getTranslation('slug', App::getLocale())) }}"
            class="mt-4 text-gray-900 line-clamp-2">
            {{ $product->getTranslation('name', App::getLocale()) }}
        </a>
        <a href="{{ route('category', $product->category->getTranslation('name', App::getLocale())) }}"
            class="italic text-gray-500 line-clamp-1">
            {{ $product->category->getTranslation('name', App::getLocale()) }}
        </a>
        <div class="flex items-center justify-between">
            @if ($product->price > 0)
                <x-currency :amount="$product->price" />
            @else
                <div class="w-40 mt-3 rtl:text-right">
                    <a target="_blank"
                        href="{{ 'https://wa.me/' . config('global.whatsapp') . '?text=' . route('product.view', $product->getTranslation('slug', App::getLocale())) }}"
                        class="py-1.5 flex flex-row-reverse items-center justify-center px-2 text-green-600 text-base font-medium hover:text-white border rounded-md hover:bg-green-700  hover:border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">
                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path
                                d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z">
                            </path>
                        </svg>
                        <p class="rtl:ml-4 ltr:mr-4">{{ __('Ask Price') }}</p>
                    </a>
                </div>
            @endif
            @if ($product->stock <= 0)
                <div class="flex mt-1 text-red-700">
                    <p>{{ __('Out of stock') }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
