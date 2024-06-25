<div class="bg-gray-50">
    <main class="min-h-screen pt-2 pb-2 screen sm:pt-6">
        @if ($content && count($content) > 0)
            <h1 class="text-xl font-semibold tracking-tight text-gray-900 sm:text-2xl">{{ __('Shopping cart') }}</h1>
            <div class="mt-6 lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start xl:gap-x-16">
                <h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>
                <section aria-labelledby="cart-heading" class="lg:col-span-7">

                    <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
                        @foreach ($content as $item)
                            <li class="flex py-6 sm:py-10">
                                <div class="flex-shrink-0">
                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'][App::getLocale()] }}"
                                        class="object-cover object-center w-24 h-24 rounded-md sm:w-48 sm:h-48">
                                </div>
                                <div class="flex flex-col justify-between flex-1 ltr:ml-4 rtl:mr-4">
                                    <div class="relative sm:grid sm:grid-cols-2 sm:gap-x-6">
                                        <div>
                                            <div class="flex justify-between">
                                                <h3 class="text-sm">
                                                    <a href="#"
                                                        class="font-medium text-gray-700 hover:text-gray-800">
                                                        {{ $item['name'][App::getLocale()] }}
                                                    </a>
                                                </h3>
                                            </div>
                                            {{-- <div class="flex mt-1 text-sm">
                                                <p class="text-gray-500">Sienna</p>

                                                <p class="pl-4 mr-4 text-gray-500 border-l border-gray-200">Large</p>
                                            </div> --}}
                                        </div>
                                        <div class="mt-4 sm:mt-0">
                                            <div class="absolute top-0 rtl:left-0 ltr:right-0">
                                                <button type="button" wire:click="removeFromCart({{ $item['id'] }})"
                                                    class="inline-flex p-2 -m-2 text-gray-400 hover:text-gray-500">
                                                    <span class="sr-only">Remove</span>
                                                    <!-- Heroicon name: solid/x -->
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <x-currency :amount="$item['price']" />
                                    <div class="flex items-center mt-4 text-sm text-gray-700">
                                        <span>{{ __('Quantity') }}:&nbsp;</span>
                                        <button class="text-gray-500 focus:outline-none focus:text-gray-600"
                                            wire:click="updateCartItem({{ $item['id'] }},'plus')">
                                            <svg class="w-5 h-5" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>
                                        </button>
                                        <span class="mx-2 text-gray-700">{{ $item['quantity'] }}</span>
                                        <button class="text-gray-500 focus:outline-none focus:text-gray-600"
                                            wire:click="updateCartItem({{ $item['id'] }},'minus')">
                                            <svg class="w-5 h-5" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </section>

                <!-- Order summary -->
                <section aria-labelledby="summary-heading"
                    class="px-4 py-6 mt-16 rounded-lg bg-gray-50 sm:p-6 lg:p-8 lg:mt-0 lg:col-span-5">
                    <h2 id="summary-heading" class="text-lg font-medium text-gray-900">{{ __('Order summary') }}</h2>

                    <dl class="mt-6 space-y-4">
                        <div class="flex items-center justify-between">
                            <dt class="text-sm text-gray-600">{{ __('Subtotal') }}</dt>
                            <dd class="text-sm font-medium text-gray-900">
                                <x-currency :amount="$total" />
                            </dd>
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                            <dt class="flex items-center text-sm text-gray-600">
                                <span>{{ __('Shipping estimate') }}</span>
                                {{-- <a href="#" class="flex-shrink-0 mr-2 text-gray-400 hover:text-gray-500">
                                <span class="sr-only">shipping</span>
                                <!-- Heroicon name: solid/question-mark-circle -->
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a> --}}
                            </dt>
                            <dd class="text-sm font-medium text-gray-900">
                                <x-currency :amount="0.0" />
                            </dd>
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                            <dt class="flex text-sm text-gray-600">
                                <span>{{ __('Tax estimate') }}</span>
                                {{-- <a href="#" class="flex-shrink-0 mr-2 text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Learn more about how tax is calculated</span>
                                <!-- Heroicon name: solid/question-mark-circle -->
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a> --}}
                            </dt>
                            <dd class="text-sm font-medium text-gray-900">
                                <x-currency :amount="0.0" />
                            </dd>
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                            <dt class="text-base font-medium text-gray-900">{{ __('Order total') }}</dt>
                            <dd class="text-base font-medium text-gray-900">
                                <x-currency :amount="$orderTotal" />
                            </dd>
                        </div>
                    </dl>
                    <div class="mt-6">
                        <a class="w-full px-4 py-3 text-base font-medium btn" href="{{ route('checkout') }}">
                            {{ __('Checkout') }}
                        </a>
                    </div>
                </section>
            </div>

            @if (!empty($similars) && count($similars))
                <!-- Related products -->
                <section aria-labelledby="related-heading" class="mt-16">
                    <h2 id="related-heading"
                        class="text-xl font-semibold text-center text-gray-900 ltr:sm:text-left rtl:sm:text-right sm:text-2xl">
                        {{ __('You may also like') }}
                    </h2>
                    <!-- Product grid -->
                    <div
                        class="grid grid-cols-2 mt-4 gap-y-10 gap-x-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 lg:gap-x-4">
                        @foreach ($similars as $similar)
                            <x-product.card1 :product="$similar" />
                        @endforeach
                        <!-- More products... -->
                    </div>
                </section>
            @endif
        @else
            <p class="flex justify-center mt-10">{{ __('Cart is empty') }}</p>
        @endif
    </main>
</div>
