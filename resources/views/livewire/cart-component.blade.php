<div x-cloak
    :class="cartOpen ? 'ltr:translate-x-0 rtl:-translate-x-0 ease-out' :
        'ltr:translate-x-full rtl:-translate-x-full ease-in'"
    class="fixed top-0 z-10 w-full h-full max-w-xs px-6 py-4 overflow-y-auto transition duration-300 transform bg-white border-gray-300 ltr:right-0 rtl:left-0 ltr:border-l-2 rtl:border-r-2">
    <div class="flex items-center justify-between">
        <h3 class="text-lg font-medium text-gray-700">{{ __('Shopping cart') }}</h3>
        <button x-on:click="cartOpen = ! cartOpen" class="text-gray-600 focus:outline-none">
            <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" stroke="currentColor">
                <path d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    <hr class="my-3">
    @if (count($content) > 0)

        @foreach ($content as $item)
            {{-- {{ dd($item) }} --}}
            <div class="flex justify-between mt-6">
                <div class="flex">
                    <img class="object-cover w-20 h-20 rounded" src="{{ $item['image'] }}" alt="">
                    <div class="flex flex-col justify-between mx-3">
                        <h3 class="flex items-center text-xs text-gray-600 line-clamp-3">
                            {{ $item['name'][App::getLocale()] }}</h3>
                        <div class="flex items-center">
                            <button class="text-gray-500 focus:outline-none focus:text-gray-600"
                                wire:click="updateCartItem({{ $item['id'] }},'plus')">
                                <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                            <span class="mx-2 text-gray-700">{{ $item['quantity'] }}</span>
                            <button class="text-gray-500 focus:outline-none focus:text-gray-600"
                                wire:click="updateCartItem({{ $item['id'] }},'minus')">
                                <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-between">
                    <div class="flex items-center justify-end -mt-1 text-sm">
                        <x-currency :amount="$item['price']" />
                    </div>
                    <button class="flex justify-end pb-1 text-gray-600"
                        wire:click="removeFromCart({{ $item['id'] }})">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 rtl:mr-2 ltr:ml-2"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </div>
        @endforeach
        <div class="flex items-center justify-center pt-4 mt-4 border-t">
            <p class="block w-full">{{ __('Total') }}</p>
            <x-currency :amount="$total" />
        </div>
        {{-- <div class="mt-8">
        <form class="flex items-center justify-center">
            <input type="text" placeholder="Add promocode" name="promo-code" id="promo-code"
                autocomplete="promo-code"
                class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <button
                class="flex items-center px-3 py-2 text-sm font-medium text-white uppercase bg-blue-600 rounded rtl:mr-3 ltr:ml-3 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                <span>Apply</span>
            </button>
        </form>
    </div> --}}
        <a href="{{ route('shopping.cart') }}"
            class="flex items-center justify-center px-3 py-2 mt-4 text-sm font-medium text-white uppercase bg-green-600 rounded hover:bg-green-500 focus:outline-none focus:bg-green-400 hover:cursor-pointer">
            <span>{{ __('Open Cart') }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:mr-2 ltr:ml-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
            </svg>
        </a>
        <a class="flex items-center justify-center w-full px-3 py-2 mt-4 text-sm font-medium btn"
            href="{{ route('checkout') }}">
            <span class="uppercase">{{ __('Checkout') }}</span>
            @if (App::getLocale() == 'en')
                <svg class="w-5 h-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            @else
                <svg class="w-5 h-5 mx-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
            @endif
        </a>
        <button wire:click="clearCart()"
            class="flex items-center justify-center w-full px-3 py-2 mt-4 text-sm font-medium text-gray-800 uppercase bg-gray-100 rounded hover:cursor-pointer hover:bg-gray-200 focus:outline-none focus:bg-gray-300">
            <span>{{ __('Clear Cart') }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 rtl:mr-2 ltr:ml-2" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </button>
    @else
        <p class="flex justify-center">{{ __('Cart is empty') }}</p>
    @endif

</div>
