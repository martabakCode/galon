<div>
    <h3 class="sr-only">Customer Reviews</h3>
    <div class="bg-white">
        <div class="lg:grid lg:grid-cols-12 lg:gap-x-8">
            <div class="lg:col-span-4">
                <h2 class="text-lg font-medium tracking-tight text-gray-900">{{ __('Reviews') }}</h2>

                <div class="flex items-center mt-3 text-yellow-400">
                    <x-stars :stars="$product->stars()->stars" />
                    <p class="ltr:ml-2 rtl:mr-2 text-sm text-gray-900">{{ __('Based on') }} {{ count($product->reviews) }} {{ __('reviews') }}</p>
                </div>

                <div class="mt-6">
                    <h3 class="sr-only">Review data</h3>

                    <dl class="space-y-3">
                        <div class="flex items-center text-sm">
                            <dt class="flex items-center flex-1">
                                <p class="w-3 font-medium text-gray-900">5<span class="sr-only"> star
                                        reviews</span></p>
                                <div aria-hidden="true" class="flex items-center flex-1 ml-1">
                                    <!-- Heroicon name: solid/star -->
                                    <svg class="flex-shrink-0 w-5 h-5 text-yellow-400"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>

                                    <div class="relative flex-1 ml-3">
                                        <div class="h-3 bg-gray-100 border border-gray-200 rounded-full">
                                        </div>

                                        <div style="width: calc({{ $product->stars()->per['5'] }}%)"
                                            class="absolute inset-y-0 bg-yellow-400 border border-yellow-400 rounded-full">
                                        </div>
                                    </div>
                                </div>
                            </dt>
                            <dd class="w-10 ml-3 text-sm text-right text-gray-900 tabular-nums">{{ $product->stars()->per['5'] }}%
                            </dd>
                        </div>

                        <div class="flex items-center text-sm">
                            <dt class="flex items-center flex-1">
                                <p class="w-3 font-medium text-gray-900">4<span class="sr-only"> star
                                        reviews</span></p>
                                <div aria-hidden="true" class="flex items-center flex-1 ml-1">
                                    <!-- Heroicon name: solid/star -->
                                    <svg class="flex-shrink-0 w-5 h-5 text-yellow-400"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>

                                    <div class="relative flex-1 ml-3">
                                        <div class="h-3 bg-gray-100 border border-gray-200 rounded-full">
                                        </div>

                                        <div style="width: calc({{ $product->stars()->per['4'] }}%)"
                                            class="absolute inset-y-0 bg-yellow-400 border border-yellow-400 rounded-full">
                                        </div>
                                    </div>
                                </div>
                            </dt>
                            <dd class="w-10 ml-3 text-sm text-right text-gray-900 tabular-nums">{{ $product->stars()->per['4'] }}%
                            </dd>
                        </div>

                        <div class="flex items-center text-sm">
                            <dt class="flex items-center flex-1">
                                <p class="w-3 font-medium text-gray-900">3<span class="sr-only"> star
                                        reviews</span></p>
                                <div aria-hidden="true" class="flex items-center flex-1 ml-1">
                                    <!-- Heroicon name: solid/star -->
                                    <svg class="flex-shrink-0 w-5 h-5 text-yellow-400"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>

                                    <div class="relative flex-1 ml-3">
                                        <div class="h-3 bg-gray-100 border border-gray-200 rounded-full">
                                        </div>

                                        <div style="width: calc({{ $product->stars()->per['3'] }}%)"
                                            class="absolute inset-y-0 bg-yellow-400 border border-yellow-400 rounded-full">
                                        </div>
                                    </div>
                                </div>
                            </dt>
                            <dd class="w-10 ml-3 text-sm text-right text-gray-900 tabular-nums">{{ $product->stars()->per['3'] }}%</dd>
                        </div>

                        <div class="flex items-center text-sm">
                            <dt class="flex items-center flex-1">
                                <p class="w-3 font-medium text-gray-900">2<span class="sr-only"> star
                                        reviews</span></p>
                                <div aria-hidden="true" class="flex items-center flex-1 ml-1">
                                    <!-- Heroicon name: solid/star -->
                                    <svg class="flex-shrink-0 w-5 h-5 text-yellow-400"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>

                                    <div class="relative flex-1 ml-3">
                                        <div class="h-3 bg-gray-100 border border-gray-200 rounded-full">
                                        </div>

                                        <div style="width: calc({{ $product->stars()->per['2'] }}%)"
                                            class="absolute inset-y-0 bg-yellow-400 border border-yellow-400 rounded-full">
                                        </div>
                                    </div>
                                </div>
                            </dt>
                            <dd class="w-10 ml-3 text-sm text-right text-gray-900 tabular-nums">{{ $product->stars()->per['2'] }}%
                            </dd>
                        </div>

                        <div class="flex items-center text-sm">
                            <dt class="flex items-center flex-1">
                                <p class="w-3 font-medium text-gray-900">1<span class="sr-only"> star
                                        reviews</span></p>
                                <div aria-hidden="true" class="flex items-center flex-1 ml-1">
                                    <!-- Heroicon name: solid/star -->
                                    <svg class="flex-shrink-0 w-5 h-5 text-yellow-400"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>

                                    <div class="relative flex-1 ml-3">
                                        <div class="h-3 bg-gray-100 border border-gray-200 rounded-full">
                                        </div>

                                       <div style="width: calc({{ $product->stars()->per['1'] }}%)"
                                            class="absolute inset-y-0 bg-yellow-400 border border-yellow-400 rounded-full">
                                        </div>
                                    </div>
                                </div>
                            </dt>
                            <dd class="w-10 ml-3 text-sm text-right text-gray-900 tabular-nums">{{ $product->stars()->per['1'] }}%</dd>
                        </div>
                    </dl>
                </div>

                {{-- <div class="mt-10">
                    <h3 class="text-lg font-medium text-gray-900">Share your thoughts</h3>
                    <p class="mt-1 text-sm text-gray-600">If you’ve used this product, share your
                        thoughts
                        with other customers</p>

                    <a href="#"
                        class="inline-flex items-center justify-center w-full px-8 py-2 mt-6 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-md hover:bg-gray-50 sm:w-auto lg:w-full">Write
                        a review</a>
                </div> --}}
            </div>

            <div class="mt-16 lg:mt-0 lg:col-start-6 lg:col-span-7">
                <h3 class="sr-only">Recent reviews</h3>
                @foreach($product->reviews as $review)
                    <div class="flex space-x-4 rtl:space-x-reverse text-sm text-gray-500">
                        <div class="flex-none py-10">
                            <img src="{{ $review->user->profile_photo_url }}"
                                alt="" class="w-10 h-10 bg-gray-100 rounded-full" />
                        </div>
                        <div class="py-10">
                            <h3 class="font-medium text-gray-900">{{ $review->user->name }}</h3>
                            <p><time datetime="2021-07-16">{{ $review->created_at->format('M d, Y') }}</time></p>

                            <div class="flex items-center mt-4 text-yellow-400">
                                <x-stars :stars="$review->stars" />
                            </div>

                            <div class="mt-4 prose-sm prose text-gray-500 max-w-none">
                                <p>
                                    {{ $review->comment }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
