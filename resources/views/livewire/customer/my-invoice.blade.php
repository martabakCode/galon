<!-- This example requires Tailwind CSS v2.0+ -->
<div class="min-h-screen py-10 bg-gray-50 screen">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <div class="flex sm:items-baseline sm:space-x-4 rtl:space-x-reverse">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:tracking-tight sm:text-3xl">
                    {{ __('Invoice') }}
                </h1>
                <span class="text-2xl font-bold tracking-tight text-gray-900 sm:tracking-tight sm:text-3xl">
                    #{{ $invoice->code }}
                </span>
            </div>
            <p class="mt-2 text-sm text-gray-700">
                {{ __('Invoice generated on') }}
                <time datetime="{{ $invoice->created_at->format('d-m-Y') }}">
                    {{ $invoice->created_at->format('F d, Y') }}
                </time>
            </p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <button type="button" class="px-4 py-2 sm:w-auto btn">
                {{ __('Print') }}
            </button>
        </div>
    </div>
    <div class="mt-8 sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <dt class="font-semibold text-gray-900 uppercase">{{ __('Bill to') }}</dt>
            <dd class="mt-2 italic text-gray-500">
                <span class="block">{{ $invoice->order->customer_name ?? $invoice->order->user->name }}</span>
                <span class="block">{{ $invoice->order->shipping_address()->street }}</span>
                <span class="block">
                    {{ $invoice->order->shipping_address()->city }},{{ $invoice->order->shipping_address()->post_code }},
                    {{ $invoice->order->shipping_address()->country }}
                </span>
            </dd>
        </div>
    </div>
    <div class="flex flex-col mt-8">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr class="text-sm font-medium text-gray-500 uppercase ltr:text-left rtl:text-right">
                    <th scope="col" class="px-2 py-3">
                        {{ __('Item') }}
                    </th>
                    <th scope="col" class="px-2 py-3 ltr:text-right rtl:text-left">
                        {{ __('Price') }}
                    </th>
                    <th scope="col" class="px-2 py-3 ltr:text-right rtl:text-left">
                        {{ __('Qty.') }}
                    </th>
                    <th scope="col" class="px-2 py-3 capitalize ltr:text-right rtl:text-left">
                        {{ __('total') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice->order->orderDetails as $order)
                    <tr class="text-sm text-gray-500 border-b border-gray-200">
                        <td class="px-2 py-3 text-gray-900">
                            {{ $order->product->getTranslation('name', App::getLocale()) }}
                        </td>
                        <td class="px-2 py-3 ltr:text-right rtl:text-left sm:table-cell">
                            <span class="rtl:mr-1 rtl:order-last">
                                {{ config('global.currency_' . App::getLocale()) }}
                            </span>
                            <span class="">{{ sprintf('%.2f', $order->price) }}</span>
                        </td>
                        <td class="px-2 py-3 ltr:text-right rtl:text-left sm:table-cell">{{ $order->quantity }}</td>
                        <td class="px-2 py-3 ltr:text-right rtl:text-left sm:table-cell">
                            <span class="rtl:mr-1 rtl:order-last">
                                {{ config('global.currency_' . App::getLocale()) }}
                            </span>
                            <span class="">{{ sprintf('%.2f', $order->price * $order->quantity) }}</span>
                        </td>
                    </tr>
                @endforeach
                <!-- More projects... -->
            </tbody>
            <tfoot>
                <tr class="text-sm font-semibold text-gray-600 uppercase">
                    <th scope="row" colspan="3" class="hidden px-2 pt-6 text-right sm:table-cell ">
                        {{ __('Subtotal') }}
                    </th>
                    <th scope="row" colspan="2" class="px-2 pt-6 text-right sm:hidden">
                        {{ __('Subtotal') }}
                    </th>
                    <td class="hidden px-2 pt-6 text-right sm:table-cell">
                        <span class="rtl:mr-1 rtl:order-last">
                            {{ config('global.currency_' . App::getLocale()) }}
                        </span>
                        <span class="">{{ sprintf('%.2f', $invoice->order->subtotal) }}</span>
                    </td>
                    <td colspan="2" class="px-2 pt-6 text-right sm:hidden">
                        <span class="rtl:mr-1 rtl:order-last">
                            {{ config('global.currency_' . App::getLocale()) }}
                        </span>
                        <span class="">{{ sprintf('%.2f', $invoice->order->subtotal) }}</span>
                    </td>
                </tr>
                <tr class="text-sm font-semibold text-gray-600 uppercase">
                    <th scope="row" colspan="3" class="hidden px-2 pt-6 text-right sm:table-cell ">
                        {{ __('Shipping') }}
                    </th>
                    <th scope="row" colspan="2" class="px-2 pt-6 text-right sm:hidden">
                        {{ __('Shipping') }}
                    </th>
                    <td class="hidden px-2 pt-6 text-right sm:table-cell">
                        <span class="rtl:mr-1 rtl:order-last">
                            {{ config('global.currency_' . App::getLocale()) }}
                        </span>
                        <span class="">{{ sprintf('%.2f', $invoice->order->shipping_cost) }}</span>
                    </td>
                    <td colspan="2" class="px-2 pt-6 text-right sm:hidden">
                        <span class="rtl:mr-1 rtl:order-last">
                            {{ config('global.currency_' . App::getLocale()) }}
                        </span>
                        <span class="">{{ sprintf('%.2f', $invoice->order->shipping_cost) }}</span>
                    </td>
                </tr>
                <tr class="text-sm font-semibold text-gray-600 uppercase">
                    <th scope="row" colspan="3" class="hidden px-2 pt-6 text-right sm:table-cell ">
                        {{ __('Tax') }}
                    </th>
                    <th scope="row" colspan="2" class="px-2 pt-6 text-right sm:hidden">
                        {{ __('Tax') }}
                    </th>
                    <td class="hidden px-2 pt-6 text-right sm:table-cell">
                        <span class="rtl:mr-1 rtl:order-last">
                            {{ config('global.currency_' . App::getLocale()) }}
                        </span>
                        <span class="">{{ sprintf('%.2f', $invoice->order->tax) }}</span>
                    </td>
                    <td colspan="2" class="px-2 pt-6 text-right sm:hidden">
                        <span class="rtl:mr-1 rtl:order-last">
                            {{ config('global.currency_' . App::getLocale()) }}
                        </span>
                        <span class="">{{ sprintf('%.2f', $invoice->order->tax) }}</span>
                    </td>
                </tr>

                <tr class="text-sm font-semibold text-gray-600 uppercase">
                    <th scope="row" colspan="3" class="hidden px-2 pt-6 text-right sm:table-cell ">
                        {{ __('Total') }}
                    </th>
                    <th scope="row" colspan="2" class="px-2 pt-6 text-right sm:hidden">
                        {{ __('Total') }}
                    </th>
                    <td class="hidden px-2 pt-6 text-right sm:table-cell">
                        <span class="rtl:mr-1 rtl:order-last">
                            {{ config('global.currency_' . App::getLocale()) }}
                        </span>
                        <span class="">{{ sprintf('%.2f', $invoice->order->total) }}</span>
                    </td>
                    <td colspan="2" class="px-2 pt-6 text-right sm:hidden">
                        <span class="rtl:mr-1 rtl:order-last">
                            {{ config('global.currency_' . App::getLocale()) }}
                        </span>
                        <span class="">{{ sprintf('%.2f', $invoice->order->total) }}</span>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
