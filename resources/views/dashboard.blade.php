<x-customer-layout>
    <div class="px-4 py-10 bg-gray-100 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">{{ __('Dashboard') }}</h1>
            </div>
        </div>
        <div class="mt-8">
            <!-- Replace with your content -->
            <!-- Cards -->
            <section class="grid gap-6 pt-8 mb-8 md:grid-cols-2 xl:grid-cols-4">

                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div
                        class="p-3 text-green-500 bg-green-100 rounded-full ltr:mr-4 rtl:ml-4 dark:text-green-100 dark:bg-green-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            {{ __('Expenses') }}
                        </p>
                        <div class="flex text-lg font-semibold text-gray-700 dark:text-gray-200">
                            <span class="rtl:mr-1 rtl:order-last">
                                {{ config('global.currency_' . App::getLocale()) }}
                            </span>
                            <span>
                                {{ $expenses ?? 0 }}
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div
                        class="p-3 text-blue-500 bg-blue-100 rounded-full ltr:mr-4 rtl:ml-4 dark:text-blue-100 dark:bg-blue-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            {{ __('Orders') }}
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            {{ $orders->count() ?? 0 }}
                        </p>
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div
                        class="p-3 text-orange-500 bg-orange-100 rounded-full ltr:mr-4 rtl:ml-4 dark:text-orange-100 dark:bg-orange-500">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path
                                d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                        </svg>

                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            {{ __('Favourites') }}
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            {{ $favourites ?? 0 }}
                        </p>
                    </div>

                </div>
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div
                        class="p-3 text-teal-500 bg-teal-100 rounded-full ltr:mr-4 rtl:ml-4 dark:text-teal-100 dark:bg-teal-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            {{ __('Messages') }}
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            {{ $messages ?? 0 }}
                        </p>
                    </div>
                </div>
            </section>
            <!-- Info -->
          
            <!-- Transaction -->
            <section class="flex-1 pb-8">
                <div class="mt-8">
                    <h2 class="px-2 mt-8 text-lg font-medium leading-6 text-gray-900">
                        {{ __('Recent Orders') }}</h2>

                    <!-- Activity list (smallest breakpoint only) -->
                    <div class="shadow sm:hidden">
                        <ul role="list" class="mt-2 overflow-hidden divide-y divide-gray-200 shadow sm:hidden">
                            @foreach ($orders as $order)
                            <li>
                                <a href="#" class="block px-4 py-4 bg-white hover:bg-gray-50">
                                    <span class="flex items-center space-x-4 rtl:space-x-reverse">
                                        <span class="flex flex-1 space-x-2 truncate rtl:space-x-reverse">
                                            <!-- Heroicon name: solid/cash -->
                                            
                                            <span class="flex flex-col text-sm text-gray-500 truncate">
                                                <span class="truncate">Payment to Molly Sanders</span>
                                                <span><span class="font-medium text-gray-900">$20,000</span>
                                                    USD</span>
                                                <time datetime="2020-07-11">July 11, 2020</time>
                                            </span>
                                        </span>
                                        <!-- Heroicon name: solid/chevron-right -->
                                        <svg class="flex-shrink-0 w-5 h-5 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Activity table (small breakpoint and up) -->
                    <div class="hidden sm:block">
                        <div class="flex flex-col mt-2">
                            <div class="min-w-full overflow-hidden overflow-x-auto align-middle shadow sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase rtl:text-right ltr:text-left bg-gray-50"
                                                scope="col">{{ __('Order') }}</th>
                                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase rtl:text-right ltr:text-left bg-gray-50"
                                                scope="col">{{ __('Amount') }}</th>
                                            <th class="hidden px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase rtl:text-right ltr:text-left bg-gray-50 md:block"
                                                scope="col">{{ __('Status') }}</th>
                                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase rtl:text-right ltr:text-left bg-gray-50"
                                                scope="col">{{ __('Date') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($orders as $order)
                                            <tr class="bg-white">
                                                <td
                                                    class="w-full px-6 py-4 text-sm text-gray-900 max-w-0 whitespace-nowrap">
                                                    <div class="flex">
                                                        <a href="{{ route('my.order.view',$order->code) }}"
                                                            class="inline-flex space-x-2 space-x-reverse text-sm truncate group">
                                                            <p class="text-blue-500 truncate group-hover:text-blue-900">
                                                                #{{ $order->code }}</p>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm text-gray-500 rtl:text-left ltr:text-right whitespace-nowrap">
                                                    <span class="rtl:mr-1 rtl:order-last">
                                                        {{ config('global.currency_' . App::getLocale()) }}
                                                    </span>
                                                    <span class="font-medium text-gray-900">
                                                    {{ $order->total }}    
                                                    </span>
                                                </td>
                                                <td
                                                    class="hidden px-6 py-4 text-sm text-gray-500 whitespace-nowrap md:block">
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-0.5 text-xs font-medium capitalize">
                                                        {{ __($order->status->name) }} </span>
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm text-gray-500 rtl:text-left ltr:text-right whitespace-nowrap">
                                                    <time datetime="{{ $order->created_at->format('M d, Y') }}">{{ $order->created_at->format('M d, Y') }}</time>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- More transactions... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Billing history -->
            <section aria-labelledby="billing-history-heading">
                <div class="pt-6 bg-white shadow sm:overflow-hidden sm:rounded-md">
                    <div class="px-4 sm:px-6">
                        <h2 id="billing-history-heading" class="text-lg font-medium leading-6 text-gray-900">{{ __('Billing History') }}</h2>
                    </div>
                    <div class="flex flex-col mt-6">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <div class="overflow-hidden border-t border-gray-200">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-sm font-semibold text-gray-900 ltr:text-left rtl:text-right">
                                                    {{ __('Invoice') }}</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-sm font-semibold text-gray-900 ltr:text-left rtl:text-right">
                                                    {{ __('Amount') }}</th>
                                                    <th scope="col"
                                                    class="px-6 py-3 text-sm font-semibold text-gray-900 ltr:text-left rtl:text-right">
                                                    {{__('Status')}}</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-sm font-semibold text-gray-900 ltr:text-left rtl:text-right">
                                                    {{__('Date')}}</th>
                                                <!--
                              `relative` is added here due to a weird bug in Safari that causes `sr-only` headings to introduce overflow on the body on mobile.
                            -->
                                                <th scope="col"
                                                    class="relative px-6 py-3 text-sm font-medium text-gray-500 ltr:text-left rtl:text-right">
                                                    <span class="sr-only">View receipt</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($invoices as $invoice)
                                                <tr>
                                                   
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $invoice->code }}</td>
                                                    <td
                                                    class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        <span class="rtl:mr-1 rtl:order-last">
                                                            {{ config('global.currency_' . App::getLocale()) }}
                                                        </span>
                                                        <span class="font-medium text-gray-900">
                                                        {{ $invoice->order->total }}    
                                                        </span>
                                                    </td>
                                                    <td
                                                    class="hidden px-6 py-4 text-sm text-gray-500 whitespace-nowrap md:block">
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-0.5 text-xs font-medium capitalize">
                                                        {{ __($invoice->order->status->name) }} </span>
                                                </td>
                                                    <td
                                                    class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    <time datetime="{{ $invoice->created_at->format('M d, Y') }}">{{ $invoice->created_at->format('M d, Y') }}</time>
                                                </td>
                                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                        <a href="{{ route('my.invoice.view',$invoice->code) }}"
                                                            class="text-orange-600 hover:text-orange-900">{{ __('View receipt') }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-customer-layout>
