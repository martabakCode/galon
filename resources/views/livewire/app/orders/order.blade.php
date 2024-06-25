<div>
    <div class="min-h-screen py-10 bg-gray-50 screen">
        <div class="px-4 space-y-2 sm:px-0 sm:flex sm:items-baseline sm:justify-between sm:space-y-0">
            <div class="flex sm:items-baseline sm:space-x-4 rtl:space-x-reverse">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:tracking-tight sm:text-3xl">
                    {{ __('Order') }}
                </h1>
                <span class="text-2xl font-bold tracking-tight text-gray-900 sm:tracking-tight sm:text-3xl ">
                    #{{ $order->code }}
                </span>
                <a href="{{ route('invoice.view', $order->invoice()->code) }}"
                    class="hidden text-sm font-medium text-indigo-600 hover:text-indigo-500 sm:block">
                    {{ __('View invoice') }}
                    <span class="rtl:hidden" aria-hidden="true"> &rarr;</span>
                    <span class="ltr:hidden" aria-hidden="true"> &larr;</span>
                </a>
            </div>
            <p class="text-sm text-gray-600">{{ __('Order placed') }} <time datetime="2021-03-22"
                    class="font-medium text-gray-900">{{ $order->created_at->format('F d, Y') }}</time></p>
            <a href="{{ route('invoice.view', $order->invoice()->code) }}"
                class="text-sm font-medium text-indigo-600 hover:text-indigo-500 sm:hidden">
                {{ __('View invoice') }}
                <span class="rtl:hidden" aria-hidden="true"> &rarr;</span>
                <span class="ltr:hidden" aria-hidden="true"> &larr;</span>
            </a>
        </div>

        <!-- Products -->
        <div class="mt-6">
            <h2 class="sr-only">Products purchased</h2>
            <div class="space-y-8">
                <div class="bg-white border-t border-b border-gray-200 shadow-sm sm:border sm:rounded-lg">
                    <div class="px-4 py-6 sm:px-6 lg:p-8">
                        <h4 class="sr-only">Status</h4>
                        <p class="text-sm font-medium text-gray-900">
                            {{ __($order->status->name) }}
                            <time
                                datetime="{{ $order->updated_at->format('d-m-Y') }}">{{ $order->updated_at->format('F d, Y') }}
                            </time>
                        </p>
                        <div class="mt-6" aria-hidden="true">
                            <div class="overflow-hidden bg-gray-200 rounded-full">
                                <div class="h-2 bg-indigo-600 rounded-full" style="width: calc((1 * 2 + 1) / 8 * 100%)">
                                </div>
                            </div>
                            <div class="hidden grid-cols-4 mt-6 text-sm font-medium text-gray-600 sm:grid">
                                <div class="text-indigo-600">{{ __('Order placed') }}</div>
                                <div class="text-center text-indigo-600">{{ __('Processing') }}</div>
                                <div class="text-center">{{ __('Shipped') }}</div>
                                <div class="text-right">{{ __('Delivered') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white border-t border-b border-gray-200 shadow-sm sm:border sm:rounded-lg">
                    <div class="px-4 py-6 sm:px-6 lg:grid lg:grid-cols-2 lg:gap-x-8 lg:p-8 lg:gap-y-8">
                        @foreach ($order->orderDetails as $myOrder)
                            <div class="flex space-x-6 rtl:space-x-reverse">
                                <img src="{{ $myOrder->product->image() }}"
                                    alt="{{ $myOrder->product->getTranslation('name', App::getLocale()) }}"
                                    class="flex-none object-cover object-center w-20 h-20 bg-gray-100 rounded-lg sm:w-40 sm:h-40">
                                <div class="flex flex-col flex-auto">
                                    <div>
                                        <h4 class="font-medium text-gray-900">
                                            <a class="line-clamp-3"
                                                href="{{ route('product.view', $myOrder->product->getTranslation('slug', App::getLocale())) }}">
                                                {{ $myOrder->product->getTranslation('name', App::getLocale()) }}
                                            </a>
                                        </h4>
                                        <p class="mt-2 text-sm text-gray-600 line-clamp-4">
                                            {!! $myOrder->product->excerpt !!}
                                        </p>
                                    </div>
                                    <div class="flex items-end flex-1 mt-6">
                                        <dl
                                            class="flex space-x-4 rtl:space-x-reverse rtl:divide-x-reverse text-sm divide-x divide-gray-200 sm:space-x-6">
                                            <div class="flex">
                                                <dt class="font-medium text-gray-900">{{ __('Quantity') }}</dt>
                                                <dd class="ltr:ml-2 rtl:mr-2 text-gray-700">{{ $myOrder->quantity }}
                                                </dd>
                                            </div>
                                            <div class="flex ltr:pl-4 rtl:pr-4 ltr:sm:pl-6 rtl:sm:pr-6">
                                                <dt class="font-medium text-gray-900">{{ __('Price') }}</dt>
                                                <dd class="ltr:ml-2 rtl:mr-2 ml-2 -mt-1 text-gray-700">
                                                    <x-currency :amount="$myOrder->price" />
                                                </dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Billing -->
        <div class="mt-16">
            <h2 class="sr-only">Billing Summary</h2>

            <div class="px-4 py-6 bg-gray-100 sm:px-6 sm:rounded-lg lg:px-8 lg:py-8 lg:grid lg:grid-cols-12 lg:gap-x-8">
                <dl class="grid grid-cols-2 gap-6 text-sm sm:grid-cols-2 md:gap-x-8 lg:col-span-7">
                    <div>
                        <dt class="font-medium text-gray-900">{{ __('Shipping address') }}</dt>
                        <dd class="mt-3 text-gray-500 italic">
                            <span class="block">{{ $order->customer_name ?? $order->user->name }}</span>
                            <span class="block">{{ $order->shipping_address()->street }}</span>
                            <span class="block">
                                {{ $order->shipping_address()->city }},{{ $order->shipping_address()->post_code }},
                                {{ $order->shipping_address()->country }}
                            </span>
                        </dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900">{{ __('Payment information') }}</dt>
                        <dd class="flex flex-wrap -mt-1 -ml-4">
                            <div class="flex-shrink-0 mt-4 ml-4">
                                <svg aria-hidden="true" width="36" height="24" viewBox="0 0 36 24"
                                    xmlns="http://www.w3.org/2000/svg" class="w-auto h-6">
                                    <rect width="36" height="24" rx="4" fill="#224DBA" />
                                    <path
                                        d="M10.925 15.673H8.874l-1.538-6c-.073-.276-.228-.52-.456-.635A6.575 6.575 0 005 8.403v-.231h3.304c.456 0 .798.347.855.75l.798 4.328 2.05-5.078h1.994l-3.076 7.5zm4.216 0h-1.937L14.8 8.172h1.937l-1.595 7.5zm4.101-5.422c.057-.404.399-.635.798-.635a3.54 3.54 0 011.88.346l.342-1.615A4.808 4.808 0 0020.496 8c-1.88 0-3.248 1.039-3.248 2.481 0 1.097.969 1.673 1.653 2.02.74.346 1.025.577.968.923 0 .519-.57.75-1.139.75a4.795 4.795 0 01-1.994-.462l-.342 1.616a5.48 5.48 0 002.108.404c2.108.057 3.418-.981 3.418-2.539 0-1.962-2.678-2.077-2.678-2.942zm9.457 5.422L27.16 8.172h-1.652a.858.858 0 00-.798.577l-2.848 6.924h1.994l.398-1.096h2.45l.228 1.096h1.766zm-2.905-5.482l.57 2.827h-1.596l1.026-2.827z"
                                        fill="#fff" />
                                </svg>
                                <p class="sr-only">Visa</p>
                            </div>
                            <div class="mt-4 ml-4">
                                <p class="text-gray-900">Ending with 4242</p>
                                <p class="text-gray-600">Expires 02 / 24</p>
                            </div>
                        </dd>
                    </div>
                </dl>

                <dl class="mt-8 text-sm divide-y divide-gray-200 lg:mt-0 lg:col-span-5">
                    <div class="flex items-center justify-between pb-4">
                        <dt class="text-gray-600">{{ __('Subtotal') }}</dt>
                        <dd class="font-medium text-gray-900">
                            <x-currency :amount="$order->subtotal" />
                        </dd>
                    </div>
                    <div class="flex items-center justify-between py-4">
                        <dt class="text-gray-600">{{ __('Shipping') }}</dt>
                        <dd class="font-medium text-gray-900">
                            <x-currency :amount="$order->shipping_cost" />
                        </dd>
                    </div>
                    <div class="flex items-center justify-between py-4">
                        <dt class="text-gray-600">{{ __('Tax') }}</dt>
                        <dd class="font-medium text-gray-900">
                            <x-currency :amount="$order->tax" />
                        </dd>
                    </div>
                    <div class="flex items-center justify-between pt-4">
                        <dt class="font-medium text-gray-900">{{ __('Order total') }}</dt>
                        <dd class="font-medium text-indigo-600">
                            <x-currency :amount="$order->total" />
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>
