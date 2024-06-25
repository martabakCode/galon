<div class="relative group">
    <div class="w-full h-56 overflow-hidden rounded-md group-hover:opacity-75 lg:h-72 xl:h-80">
        <img src="{{ $product->image() }}" alt=""
            class="object-cover object-center w-full h-full">
    </div>
    <h3 class="mt-4 text-sm text-gray-700">
        <a href="{{ route('product.view', $product->getTranslation('slug', App::getLocale())) }}">
            <span class="absolute inset-0"></span>
            {{ $product->getTranslation('name', App::getLocale()) }}
        </a>
    </h3>
    <p class="mt-1 text-sm text-gray-500">{{ $product->category->getTranslation('name', App::getLocale()) }}</p>
    <p class="mt-1 text-sm font-medium text-gray-900">${{ $product->price }}</p>
</div>
