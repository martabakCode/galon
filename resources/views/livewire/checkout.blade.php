<div class="bg-gray-50">
    <div class="min-h-screen px-4 py-16 screen sm:px-6 lg:px-8">
        <x-session-msg3 />
        @if ($content && count($content) > 0)
            <h2 class="sr-only">Checkout</h2>
            <div class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
                <div>
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">{{ __('Contact information') }}</h2>
                        <div class="mt-4">
                            <label for="email-address"
                                class="block text-sm font-medium text-gray-700">{{ __('Email address') }}</label>
                            <div class="relative mt-1">
                                <input type="email" id="email-address" name="email-address" autocomplete="email"
                                    wire:model="email" required
                                    class="block w-full border-gray-300 rounded-md shadow-sm peer focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <div
                                    class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                    <span class="text-gray-500 sm:text-xs" id="name">
                                        {{ __('Required') }}
                                    </span>
                                </div>
                            </div>
                            @error('email')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="pt-10 mt-10 border-t border-gray-200">
                        <h2 class="text-lg font-medium text-gray-900">{{ __('Shipping information') }}</h2>

                        <div class="grid grid-cols-1 mt-4 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                            <div class="sm:col-span-2">
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                                <div class="relative mt-1">
                                    <input type="text" id="name" name="name" autocomplete="given-name"
                                        wire:model="customer_name" required
                                        class="block w-full border-gray-300 rounded-md shadow-sm peer focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
                            <div class="sm:col-span-2">
                                <label for="address"
                                    class="block text-sm font-medium text-gray-700">{{ __('Address') }}</label>
                                <div class="relative mt-1">
                                    <input type="text" name="address" id="address" autocomplete="street-address"
                                        wire:model="street_address" required
                                        class="block w-full border-gray-300 rounded-md shadow-sm peer focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <div
                                        class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                        <span class="text-gray-500 sm:text-xs" id="name">
                                            {{ __('Required') }}
                                        </span>
                                    </div>
                                </div>
                                @error('street_address')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <div class="flex justify-between">
                                    <label for="country" class="block text-sm font-medium text-gray-700">
                                        {{ __('Country') }}
                                    </label>
                                    <span class="text-gray-500 sm:text-xs" id="name">
                                        {{ __('Required') }}
                                    </span>
                                </div>
                                <div class="mt-1">
                                    <select id="country" name="country" autocomplete="country-name"
                                        wire:model='country' required
                                        class="block w-full py-3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option>{{ __('Indonesia') }}</option>
                                        <option>{{ __('United States') }}</option>
                                    </select>
                                </div>
                                @error('country')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700">
                                    {{ __('City') }}
                                </label>
                                <div class="relative mt-1">
                                    <input type="text" name="city" id="city" autocomplete="address-level2"
                                        wire:model='city' required
                                        class="block w-full border-gray-300 rounded-md shadow-sm peer focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <div
                                        class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                        <span class="text-gray-500 sm:text-xs" id="name">
                                            {{ __('Required') }}
                                        </span>
                                    </div>
                                </div>
                                @error('city')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="region" class="block text-sm font-medium text-gray-700">
                                    {{ __('State / Province') }}
                                </label>
                                <div class="relative mt-1">
                                    <input type="text" name="region" id="region" autocomplete="address-level1"
                                        wire:model='state'
                                        class="block w-full border-gray-300 rounded-md shadow-sm peer focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <div
                                        class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                        <span class="text-gray-500 sm:text-xs" id="name">
                                            {{ __('Required') }}
                                        </span>
                                    </div>
                                </div>
                                @error('state')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="postal-code" class="block text-sm font-medium text-gray-700">
                                    {{ __('Post code') }}
                                </label>
                                <div class="relative mt-1">
                                    <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code"
                                        wire:model='post_code' required
                                        class="block w-full border-gray-300 rounded-md shadow-sm peer focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <div
                                        class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                        <span class="text-gray-500 sm:text-xs" id="name">
                                            {{ __('Required') }}
                                        </span>
                                    </div>
                                </div>
                                @error('post_code')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="phone"
                                    class="block text-sm font-medium text-gray-700">{{ __('Phone') }}</label>
                                <div class="relative mt-1">
                                    <input type="text" name="phone" id="phone" autocomplete="tel"
                                        wire:model='phone' required
                                        class="block w-full border-gray-300 rounded-md shadow-sm peer focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <div
                                        class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                        <span class="text-gray-500 sm:text-xs" id="name">
                                            {{ __('Required') }}
                                        </span>
                                    </div>
                                </div>
                                @error('phone')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="pt-10 mt-10 border-t border-gray-200">
                        <fieldset>
                            <legend class="text-lg font-medium text-gray-900">{{ __('Delivery method') }}</legend>
                            <div class="grid grid-cols-1 mt-4 gap-y-6 sm:grid-cols-2 sm:gap-x-4" x-cloak
                                x-data="{ shipping: @entangle('sh_method') }">
                                @foreach ($shipping_methods as $sh)
                                    <label wire:click="selectShipping({{ $sh->id }})"
                                        class="relative flex p-4 bg-white border rounded-lg shadow-sm cursor-pointer focus:outline-none">
                                        <input type="radio" name="delivery-method" value="{{ $sh->ame }}"
                                            class="sr-only" aria-labelledby="delivery-method-0-label"
                                            aria-describedby="delivery-method-0-description-0 delivery-method-0-description-1">
                                        <span class="flex flex-1">
                                            <span class="flex flex-col justify-center">
                                                <span class="flex text-sm font-medium text-gray-900 align-top">
                                                    {{ __($sh->name) }}
                                                </span>
                                                <span
                                                    class="flex items-center mt-1 text-sm text-gray-500 align-middle">
                                                    {{ $sh->days }} {{ __('business days') }}
                                                </span>
                                                <span class="flex text-sm font-medium text-gray-900 align-bottom">
                                                    <x-currency :amount="$sh->cost" />
                                                </span>
                                            </span>
                                        </span>
                                        <div x-show="shipping=={{ $sh->id }}">
                                            <svg class="w-5 h-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <span
                                            :class="shipping == {{ $sh->id }} ? 'border-indigo-500' :
                                                'border-transparent'"
                                            class="absolute border-2 rounded-lg pointer-events-none -inset-px"
                                            aria-hidden="true"></span>
                                    </label>
                                @endforeach
                            </div>
                        </fieldset>
                        @error('sh_method')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Payment -->
                    <div class="pt-10 mt-10 border-t border-gray-200" x-data="{ payment: @entangle('pa_method') }" x-cloak>
                        <h2 class="text-lg font-medium text-gray-900">{{ __('Payment') }}</h2>
                        <fieldset class="mt-4">
                            <legend class="sr-only">Payment type</legend>
                            <div
                                class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10 rtl:sm:space-x-reverse">
                                @foreach ($payment_methodes as $pa)
                                    <div class="flex items-center">
                                        <input id="payments_{{ $pa->id }}" name="payment-type" type="radio"
                                            value="{{ $pa->id }}" wire:model="pa_method"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                        <label for="payments"
                                            class="block text-sm font-medium text-gray-700 ltr:ml-3 rtl:mr-3">
                                            {{ __($pa->name) }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </fieldset>
                        <!-- PayPal -->
                        <div class="mt-6" x-show="payment==1">
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                {{ __('Email') }}
                            </label>
                            <div class="mt-1">
                                <input type="text" id="card-number" name="card-number" autocomplete="cc-number"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <!-- Credit card -->
                        <div class="grid grid-cols-4 mt-6 gap-y-6 gap-x-4" x-show="payment==2">
                            <div class="col-span-4">
                                <label for="card-number" class="block text-sm font-medium text-gray-700">
                                    {{ __('Card number') }}
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="card-number" name="card-number"
                                        autocomplete="cc-number"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="col-span-4">
                                <label for="name-on-card" class="block text-sm font-medium text-gray-700">
                                    {{ __('Name on card') }}
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="name-on-card" name="name-on-card"
                                        autocomplete="cc-name"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="col-span-3">
                                <label for="expiration-date" class="block text-sm font-medium text-gray-700">
                                    {{ __('Expiration date') }} (MM/YY)
                                </label>
                                <div class="mt-1">
                                    <input type="text" name="expiration-date" id="expiration-date"
                                        autocomplete="cc-exp"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="cvc" class="block text-sm font-medium text-gray-700">CVC</label>
                                <div class="mt-1">
                                    <input type="text" name="cvc" id="cvc" autocomplete="csc"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>
                        </div>
                        <!-- eTransfer -->
                        <div class="mt-6" x-show="payment==3">
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                {{ __('Receipt No.') }}
                            </label>
                            <div class="mt-1">
                                <input type="text" id="card-number" name="card-number" autocomplete="cc-number"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order summary -->
                <div class="mt-10 lg:mt-0">
                    <h2 class="text-lg font-medium text-gray-900">{{ __('Order summary') }}</h2>
                    <div class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                        <h3 class="sr-only">Items in your cart</h3>
                        <ul role="list" class="divide-y divide-gray-200">
                            @foreach ($content as $item)
                                <li class="flex px-4 py-6 sm:px-6">
                                    <div class="flex-shrink-0">
                                        <img src="{{ $item['image'] }}" alt="{{ $item['name'][App::getLocale()] }}"
                                            class="w-24 h-auto rounded-md">
                                    </div>
                                    <div class="flex flex-col flex-1 ltr:ml-4 rtl:mr-4">
                                        <div class="relative">
                                            <div class="text-sm ltr:mr-8 rtl:ml-8">
                                                <a href="{{ route('product.view', $item['slug'][App::getLocale()]) }}"
                                                    class="font-medium text-gray-700 line-clamp-3 hover:text-gray-800">
                                                    {{ $item['name'][App::getLocale()] }}
                                                </a>
                                            </div>
                                            <div class="absolute top-0 rtl:left-0 ltr:right-0">
                                                <button type="button"
                                                    wire:click="removeFromCart({{ $item['id'] }})"
                                                    class="inline-flex p-2 -m-2 text-gray-400 hover:text-gray-500">
                                                    <span class="sr-only">Remove</span>
                                                    <!-- Heroicon name: solid/x -->
                                                    <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"
                                                        aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="flex items-center mt-1">
                                            <x-currency :amount="$item['price']" />
                                        </div>
                                        <div class="flex items-center mt-4 text-sm text-gray-700">
                                            <span>{{ __('Quantity') }}:&nbsp;</span>
                                            <button class="text-gray-500 focus:outline-none focus:text-gray-600"
                                                wire:click="updateCartItem({{ $item['id'] }},'plus')">
                                                <svg class="w-5 h-5" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path
                                                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
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
                            <!-- More products... -->
                        </ul>
                        <dl class="px-4 py-6 space-y-6 border-t border-gray-200 sm:px-6">
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">{{ __('Subtotal') }}</dt>
                                <dd class="text-sm font-medium text-gray-900">
                                    <x-currency :amount="$total" />
                                </dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">{{ __('Shipping') }}</dt>
                                <dd class="text-sm font-medium text-gray-900">
                                    <x-currency :amount="$shipping_cost" />
                                </dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">{{ __('Taxes') }}</dt>
                                <dd class="text-sm font-medium text-gray-900">
                                    <x-currency :amount="0" />
                                </dd>
                            </div>
                            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                                <dt class="text-base font-medium">{{ __('Total') }}</dt>
                                <dd class="text-base font-medium text-gray-900">
                                    <x-currency :amount="$orderTotal" />
                                </dd>
                            </div>
                        </dl>
                        <div class="px-4 py-6 border-t border-gray-200 sm:px-6">
                            <button wire:click="confirmOrder" class="w-full px-4 py-3 text-base font-medium btn">
                                {{ __('Confirm order') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p class="flex justify-center mt-10">{{ __('Cart is empty') }}</p>
        @endif
    </div>
</div>
