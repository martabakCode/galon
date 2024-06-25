<div class="bg-gray-50">
    <main class="min-h-screen pt-2 pb-2 screen sm:pt-6">
        @if ($favourites && count($favourites) > 0)
            <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ __('Favourites') }}</h1>
            <div class="mt-6">
                <section aria-labelledby="cart-heading" class="lg:col-span-7">

                    <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
                        @foreach ($favourites as $item)
                            <li class="flex py-6 sm:py-10">
                                <div class="flex-shrink-0">
                                    <img src="{{ $item->product->image() }}"
                                        alt="{{ $item->product->getTranslation('name', App::getLocale()) }}"
                                        class="object-cover object-center w-24 h-24 rounded-md sm:w-32 sm:h-32">
                                </div>
                                <div class="flex flex-col justify-between flex-1 ltr:ml-4 rtl:mr-4">
                                    <div class="relative sm:grid sm:grid-cols-2 sm:gap-x-6">
                                        <div>
                                            <div class="flex justify-between">
                                                <h3 class="text-sm">
                                                    <a href="{{ route('product.view', $item->product->getTranslation('slug', App::getLocale())) }}"
                                                        class="font-medium text-gray-700 hover:text-gray-800">
                                                        {{ $item->product->getTranslation('name', App::getLocale()) }}
                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="mt-4 sm:mt-0">
                                            <div class="absolute top-0 rtl:left-0 ltr:right-0">
                                                <button type="button" wire:click="removeFavourite({{ $item->id }})"
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
                                    <div class="flex italic items-center mt-4 text-sm text-gray-700">
                                        <a
                                            href="{{ route('category', $item->product->category->getTranslation('slug', App::getLocale())) }}">{{ $item->product->category->getTranslation('name', App::getLocale()) }}</a>
                                    </div>
                                    <x-currency :amount="$item->product->price" />
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </section>
            </div>
        @else
            <p class="flex justify-center mt-10">{{ __('Favourites is empty') }}</p>
        @endif
    </main>
</div>
