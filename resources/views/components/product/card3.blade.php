<div class="relative overflow-hidden group">
    <div class="w-full h-56 overflow-hidden rounded-md group-hover:opacity-75 lg:h-72 xl:h-80">
        <img src="{{ $product->image() }}" alt=""
            class="object-cover object-center w-full h-full">
    </div>
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
    <h3 class="mt-4 text-sm text-gray-700">
        <a href="{{ route('product.view', $product->getTranslation('slug', App::getLocale())) }}">
            <span class="absolute inset-0"></span>
            {{ $product->getTranslation('name', App::getLocale()) }}
        </a>
    </h3>
    <p class="mt-1 text-sm italic text-gray-500">{{ $product->category->getTranslation('name', App::getLocale()) }}</p>
    {{-- <p class="mt-1 text-sm font-medium text-gray-900">${{ $product->price }}</p> --}}
</div>
