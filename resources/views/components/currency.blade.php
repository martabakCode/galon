<div class="flex items-center mt-1">
    <span class="flex font-medium text-green-600 rtl:mr-1 rtl:order-last">
        {{ config('global.currency_' . App::getLocale()) }}
    </span>
    <span class="flex text-gray-900">{{ $amount }}</span>
</div>
