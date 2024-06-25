<div class="bg-gray-50">
    <main class="min-h-screen pt-2 pb-2 screen sm:pt-6">
        <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ __('My Reviews') }}</h1>

        {{-- Products to Review --}}
        @if ($productsToReview && count($productsToReview) > 0)
            <div class="mt-6">
                <h2 class="text-xl font-semibold text-gray-900">{{ __('Products to Review') }}</h2>
                <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">

                    @foreach ($productsToReview as $item)

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
                                            <button type="button" wire:click="showModal({{ $item->product->id }})"
                                                class="inline-flex p-2 -m-2 text-gray-400 hover:text-gray-500">
                                                {{ __('Add Review') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex italic items-center mt-4 text-sm text-gray-700">
                                    <a
                                        href="{{ route('category', $item->product->category->getTranslation('slug', App::getLocale())) }}">{{ $item->product->category->getTranslation('name', App::getLocale()) }}</a>
                                </div>
                                <x-currency :amount="$item->price" />
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <p class="flex justify-center mt-10">{{ __('You have no products to review.') }}</p>
        @endif

        {{-- Reviewed Products --}}
        @if ($reviewedProducts && count($reviewedProducts) > 0)
            <div class="mt-6">
                <h2 class="text-xl font-semibold text-gray-900">{{ __('Reviewed Products') }}</h2>
                <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
                    @foreach ($reviewedProducts as $item)
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
                                    </div>
                                    <div class="flex italic items-center mt-4 text-sm text-gray-700">
                                        <a
                                            href="{{ route('category', $item->product->category->getTranslation('slug', App::getLocale())) }}">{{ $item->product->category->getTranslation('name', App::getLocale()) }}</a>
                                    </div>
                                    <x-currency :amount="$item->product->price" />
                                        <div class="mt-4 sm:mt-0">
                                            <p class="text-sm text-gray-500">{{ __('Reviewed on') }}: {{ $item->product->reviews->first()->created_at->format('F d, Y') }}</p>
                                            <p class="mt-2 text-sm text-gray-700">{{ $item->product->reviews->first()->comment }} </p>
                                            <div class="flex items-center">

                                                @for ($i = 1; $i <= 5; $i++)
                                                    <svg class="w-6 h-6 {{ $item->product->reviews->first()->stars >= $i ? 'text-yellow-400' : 'text-gray-400' }}" xmlns="http://www.w3.org/2000/svg" fill="{{ $item->product->reviews->first()->stars >= $i ? 'currentColor' : 'none' }}" viewBox="0 0 34 34" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l2.519 7.775a1 1 0 00.95.69h8.165c.97 0 1.371 1.24.588 1.81l-6.6 4.795a1 1 0 00-.36 1.118l2.519 7.775c.3.921-.755 1.688-1.538 1.118l-6.6-4.795a1 1 0 00-1.176 0l-6.6 4.795c-.783.57-1.838-.197-1.538-1.118l2.519-7.775a1 1 0 00-.36-1.118L2.341 13.2c-.783-.57-.382-1.81.588-1.81h8.165a1 1 0 00.95-.69l2.519-7.775z" />
                                                    </svg>
                                                @endfor
                                            </div>
                                        </div>
                                </div>
                            </li>
                    @endforeach
                </ul>
            </div>
        @else
            <p class="flex justify-center mt-10">{{ __('No products have been reviewed.') }}</p>
        @endif
    </main>

    {{-- Modal for Adding Review --}}
    <div x-data="{ open: @entangle('showModal') }">
        <div x-show="open" class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="open" class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div x-show="open" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <form wire:submit.prevent="addReview">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                        {{ __('Add Review') }}
                                    </h3>
                                    <div class="mt-2">
                                        <textarea wire:model="reviewContent" class="w-full p-2 border border-gray-300 rounded mb-4" rows="4" placeholder="{{ __('Write your review...') }}"></textarea>
                                        @error('reviewContent') <span class="text-red-600">{{ $message }}</span> @enderror

                                        <div class="flex items-center mb-4">
                                            <label class="mr-2">{{ __('Rating') }}:</label>
                                            <div class="flex">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <svg wire:click="$set('rating', {{ $i }})" class="w-5 h-5 cursor-pointer {{ $rating >= $i ? 'text-yellow-400' : 'text-gray-400' }}" xmlns="http://www.w3.org/2000/svg" fill="{{ $rating >= $i ? 'currentColor' : 'none' }}" viewBox="0 0 34 34" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l2.519 7.775a1 1 0 00.95.69h8.165c.97 0 1.371 1.24.588 1.81l-6.6 4.795a1 1 0 00-.36 1.118l2.519 7.775c.3.921-.755 1.688-1.538 1.118l-6.6-4.795a1 1 0 00-1.176 0l-6.6 4.795c-.783.57-1.838-.197-1.538-1.118l2.519-7.775a1 1 0 00-.36-1.118L2.341 13.2c-.783-.57-.382-1.81.588-1.81h8.165a1 1 0 00.95-.69l2.519-7.775z" />
                                                    </svg>
                                                @endfor
                                            </div>
                                        </div>
                                        @error('rating') <span class="text-red-600">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button" @click="open = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                {{ __('Cancel') }}
                            </button>
                            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                {{ __('Submit Review') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
