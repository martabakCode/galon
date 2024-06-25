<div aria-labelledby="collection-heading" class="pt-4 mt-16 sm:pt-6 screen">
    <h2 class="mb-4 text-2xl font-bold text-center uppercase sm:text-3xl sm:rtl:text-right sm:ltr:text-left">
        {{ __('Shop by Categories') }}
    </h2>
    <p class="mt-2 text-base text-center text-gray-500 sm:rtl:text-right sm:ltr:text-left">
        {{ __('We provide a collection of products to satisfy our customers.') }}
    </p>
    <div
        class="mt-10 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-{{ config('global.category_row_cells') }} lg:gap-x-8 gap-y-4">
        @php
            $desc='description_'.App::getLocale();
        @endphp
        @foreach ($categories as $category)
            <a href="{{ route('category', $category->getTranslation('slug', App::getLocale())) }}" class="block group">
                <div aria-hidden="true" class="overflow-hidden rounded-lg aspect-w-1 aspect-h-1 group-hover:opacity-75">
                    <img src="{{ $category->image() }}"
                        alt="{{ $category->$desc }}"
                        class="object-cover object-center w-full h-full">
                </div>
                <h3 class="mt-4 text-base font-semibold text-gray-900 capitalize">
                    {{ $category->getTranslation('name', App::getLocale()) }}</h3>
                @php $desc='description_' . App::getLocale() @endphp
                <p class="mt-2 text-sm text-gray-500">{{ $category->$desc }}</p>
            </a>
        @endforeach
    </div>
</div>
