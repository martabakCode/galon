<div>
    <div class="relative overflow-hidden">
        <div class="relative w-full overflow-hidden rounded-lg h-72">
            <img src="{{ $product->image() }}"
                alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls."
                class="object-cover object-center w-full h-full">
        </div>
        <div class="absolute top-0 left-0 w-16 h-16">
            <div
            class="absolute w-24 py-1 text-xs text-center text-gray-800 transform -rotate-45 bg-yellow-400 -left-7 top-2">
            {{ __('New') }}
            </div>
        </div>
        <div class="relative flex flex-col mt-4">
            <a href="{{ route('product.view', $product->getTranslation('slug', App::getLocale())) }}"
                class="text-sm text-gray-900 capitalize line-clamp-2">
                {{ $product->getTranslation('name', App::getLocale()) }}
            </a>
        </div>
        <div class="absolute inset-x-0 top-0 flex items-end p-4 overflow-hidden rounded-lg h-72">
            <div aria-hidden="true" class="absolute inset-x-0 bottom-0 opacity-50 h-36 bg-gradient-to-t from-black">
            </div>
            <div class="relative flex items-center justify-between w-full">
                <div
                    class="flex items-center justify-center px-1 bg-opacity-40 text-lg font-semibold text-white rounded-lg bg-white hover:bg-opacity-70">
                    @if ($product->price > 0)
                        <x-currency :amount="$product->price" />
                    @endif
                </div>
                @if ($product->stock > 0)
                    <button wire:click="addToCart({{ $product->id }})"
                        class="p-2 text-lg font-semibold text-white rounded-full hover:bg-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                        </svg>
                    </button>
                @endif
            </div>
        </div>
    </div>

</div>
