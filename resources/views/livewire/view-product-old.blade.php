<div class="bg-white">
    <div class="py-16 sm:py-24 screen min-h-[270px]">
        @if ($product)
            <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
                <!-- Image gallery -->
                <div class="flex flex-col-reverse" x-data="{ activeImage: 1 }">
                    <!-- Image selector -->
                    <div class="hidden w-full max-w-2xl mx-auto mt-6 sm:block lg:max-w-none">
                        <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">
                            <button x-on:click="activeImage = 1" id="image-1"
                                class="relative flex items-center justify-center h-24 text-sm font-medium text-gray-900 uppercase bg-white rounded-md cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-4 focus:ring-opacity-50"
                                aria-controls="tabs-1-panel-1" role="tab" type="button">
                                <span class="sr-only"> Angled view </span>
                                <span class="absolute inset-0 overflow-hidden rounded-md">
                                    <img src="{{ $product->image() }}" alt=""
                                        class="object-cover object-center w-full h-full" />
                                </span>
                                <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
                                <span
                                    class="absolute inset-0 rounded-md pointer-events-none ring-transparent ring-2 ring-offset-2"
                                    aria-hidden="true"></span>
                            </button>
                            <button x-on:click="activeImage = 2" id="image-2"
                                class="relative flex items-center justify-center h-24 text-sm font-medium text-gray-900 uppercase bg-white rounded-md cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-4 focus:ring-opacity-50"
                                aria-controls="tabs-1-panel-1" role="tab" type="button">
                                <span class="sr-only"> Angled view </span>
                                <span class="absolute inset-0 overflow-hidden rounded-md">
                                    <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-product-02.jpg"
                                        alt="" class="object-cover object-center w-full h-full" />
                                </span>
                                <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
                                <span
                                    class="absolute inset-0 rounded-md pointer-events-none ring-transparent ring-2 ring-offset-2"
                                    aria-hidden="true"></span>
                            </button>
                            <button x-on:click="activeImage = 3" id="image-3"
                                class="relative flex items-center justify-center h-24 text-sm font-medium text-gray-900 uppercase bg-white rounded-md cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-4 focus:ring-opacity-50"
                                aria-controls="tabs-1-panel-1" role="tab" type="button">
                                <span class="sr-only"> Angled view </span>
                                <span class="absolute inset-0 overflow-hidden rounded-md">
                                    <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-product-03.jpg"
                                        alt="" class="object-cover object-center w-full h-full" />
                                </span>
                                <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
                                <span
                                    class="absolute inset-0 rounded-md pointer-events-none ring-transparent ring-2 ring-offset-2"
                                    aria-hidden="true"></span>
                            </button>
                            <button x-on:click="activeImage = 4" id="image-4"
                                class="relative flex items-center justify-center h-24 text-sm font-medium text-gray-900 uppercase bg-white rounded-md cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-4 focus:ring-opacity-50"
                                aria-controls="tabs-1-panel-1" role="tab" type="button">
                                <span class="sr-only"> Angled view </span>
                                <span class="absolute inset-0 overflow-hidden rounded-md">
                                    <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-product-04.jpg"
                                        alt="" class="object-cover object-center w-full h-full" />
                                </span>
                                <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
                                <span
                                    class="absolute inset-0 rounded-md pointer-events-none ring-transparent ring-2 ring-offset-2"
                                    aria-hidden="true"></span>
                            </button>
                            <!-- More images... -->
                        </div>
                    </div>

                    <div class="w-full aspect-w-3 aspect-h-4">
                        <!-- Tab panel, show/hide based on tab state. -->
                        <div x-show="activeImage === 1" id="image-panel-1" aria-labelledby="tabs-1-tab-1"
                            role="tabpanel">
                            <img src="{{ $product->image() }}"
                                alt="Angled front view with bag zipped and handles upright."
                                class="object-cover object-center w-full h-full sm:rounded-lg" />
                        </div>
                        <div x-show="activeImage === 2" id="image-panel-2" aria-labelledby="tabs-1-tab-2"
                            role="tabpanel">
                            <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-product-02.jpg"
                                alt="Angled front view with bag zipped and handles upright."
                                class="object-cover object-center w-full h-full sm:rounded-lg" />
                        </div>
                        <div x-show="activeImage === 3" id="image-panel-3" aria-labelledby="tabs-1-tab-3"
                            role="tabpanel">
                            <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-product-03.jpg"
                                alt="Angled front view with bag zipped and handles upright."
                                class="object-cover object-center w-full h-full sm:rounded-lg" />
                        </div>
                        <div x-show="activeImage === 4" id="image-panel-4" aria-labelledby="tabs-1-tab-4"
                            role="tabpanel">
                            <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-product-04.jpg"
                                alt="Angled front view with bag zipped and handles upright."
                                class="object-cover object-center w-full h-full sm:rounded-lg" />
                        </div>

                        <!-- More images... -->
                    </div>
                </div>

                <!-- Product info -->
                <div class="px-4 mt-10 sm:px-0 sm:mt-16 lg:mt-0">
                    <nav aria-label="Breadcrumb" class="pb-4">
                        <ol role="list" class="flex items-center space-x-2">
                            <li>
                                <div class="flex items-center text-sm">
                                    <a href="#" class="font-medium text-gray-500 hover:text-gray-900">
                                        {{ $product->category->getTranslation('name', App::getLocale()) }} </a>

                                    {{-- <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    aria-hidden="true" class="flex-shrink-0 w-5 h-5 ml-2 text-gray-300">
                                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                                </svg> --}}
                                </div>
                            </li>

                            {{-- <li>
                            <div class="flex items-center text-sm">
                                <a href="#" class="font-medium text-gray-500 hover:text-gray-900"> Bags </a>
                            </div>
                        </li> --}}
                        </ol>
                    </nav>
                    <h1 class="text-xl font-semibold tracking-tight text-gray-900 sm:text-2xl uppercase">
                        {{ $product->getTranslation('name', App::getLocale()) }}
                    </h1>

                    <div class="mt-3">
                        <h2 class="sr-only">{{ __('Product information') }}</h2>
                        <p class="text-3xl text-gray-900">${{ $product->price }}</p>
                    </div>

                    <!-- Reviews -->
                    <div class="mt-3 text-indigo-600">

                        @php
                            $stars = 4;
                        @endphp
                        <x-stars :stars="$stars" />
                    </div>

                    <div class="mt-6">
                        <h3 class="sr-only">Description</h3>

                        <div class="space-y-6 text-base text-gray-700">
                            {!! $product->description !!}
                        </div>
                    </div>

                    <form class="mt-6">

                        <div class="sm:flex sm:justify-between">
                            <!-- Size selector -->
                            <fieldset>
                                <legend class="block text-sm font-medium text-gray-700">Size</legend>
                                <div class="grid grid-cols-1 gap-4 mt-1 sm:grid-cols-2">
                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                    <div
                                        class="relative block p-4 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                                        <input type="radio" name="size-choice" value="18L" class="sr-only"
                                            aria-labelledby="size-choice-0-label"
                                            aria-describedby="size-choice-0-description">
                                        <p id="size-choice-0-label" class="text-base font-medium text-gray-900">18L
                                        </p>

                                        <!--
                                    Active: "border", Not Active: "border-2"
                                    Checked: "border-indigo-500", Not Checked: "border-transparent"
                                    -->
                                        <div class="absolute border-2 rounded-lg pointer-events-none -inset-px"
                                            aria-hidden="true"></div>
                                    </div>

                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                    <div
                                        class="relative block p-4 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                                        <input type="radio" name="size-choice" value="20L" class="sr-only"
                                            aria-labelledby="size-choice-1-label"
                                            aria-describedby="size-choice-1-description">
                                        <p id="size-choice-1-label" class="text-base font-medium text-gray-900">20L
                                        </p>

                                        <!--
                                        Active: "border", Not Active: "border-2"
                                        Checked: "border-indigo-500", Not Checked: "border-transparent"
                                        -->
                                        <div class="absolute border-2 rounded-lg pointer-events-none -inset-px"
                                            aria-hidden="true"></div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <!-- Colors -->
                        <div>
                            <h3 class="text-sm text-gray-600">Color</h3>

                            <fieldset class="mt-2">
                                <legend class="sr-only">Choose a color</legend>
                                <span class="flex items-center space-x-3 space-x-reverse">
                                    <!--
                            Active and Checked: "ring ring-offset-1"
                            Not Active and Checked: "ring-2"
                        -->
                                    <label
                                        class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-700">
                                        <input type="radio" name="color-choice" value="Washed Black"
                                            class="sr-only" aria-labelledby="color-choice-0-label" />
                                        <span id="color-choice-0-label" class="sr-only">
                                            Washed Black
                                        </span>
                                        <span aria-hidden="true"
                                            class="w-8 h-8 bg-gray-700 border border-black rounded-full border-opacity-10"></span>
                                    </label>

                                    <!--
                            Active and Checked: "ring ring-offset-1"
                            Not Active and Checked: "ring-2"
                        -->
                                    <label
                                        class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-400">
                                        <input type="radio" name="color-choice" value="White" class="sr-only"
                                            aria-labelledby="color-choice-1-label" />
                                        <span id="color-choice-1-label" class="sr-only">
                                            White
                                        </span>
                                        <span aria-hidden="true"
                                            class="w-8 h-8 bg-white border border-black rounded-full border-opacity-10"></span>
                                    </label>

                                    <!--
                            Active and Checked: "ring ring-offset-1"
                            Not Active and Checked: "ring-2"
                        -->
                                    <label
                                        class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-500">
                                        <input type="radio" name="color-choice" value="Washed Gray"
                                            class="sr-only" aria-labelledby="color-choice-2-label" />
                                        <span id="color-choice-2-label" class="sr-only">
                                            Washed Gray
                                        </span>
                                        <span aria-hidden="true"
                                            class="w-8 h-8 bg-gray-500 border border-black rounded-full border-opacity-10"></span>
                                    </label>
                                </span>
                            </fieldset>
                        </div>
                        <div class="mt-4">
                            <a href="#" class="inline-flex text-sm text-gray-500 group hover:text-gray-700">
                                <span>What size should I buy?</span>
                                <!-- Heroicon name: solid/question-mark-circle -->
                                <svg class="flex-shrink-0 w-5 h-5 ml-2 text-gray-400 group-hover:text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                        <div class="mt-6 rtl:text-right">
                            <a href="#" class="inline-flex text-base font-medium group">
                                <!-- Heroicon name: outline/shield-check -->
                                <svg class="flex-shrink-0 w-6 h-6 rtl:ml-2 ltr:mr-2 text-gray-400 group-hover:text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                <span class="text-gray-500 hover:text-gray-700">Lifetime Guarantee</span>
                            </a>
                        </div>


                        <div class="flex mt-10 space-x-8 rtl:space-x-reverse">
                            <button type="submit"
                                class="flex items-center justify-center px-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                </svg>
                                <p class="hidden mr-4 sm:block">Add to cart</p>
                            </button>
                            <button type="submit"
                                class="flex items-center justify-center px-2 text-base font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-green-500">
                                <p class="">Buy Now</p>
                            </button>
                            <button type="button"
                                class="flex items-center justify-center px-2 py-1 mr-4 text-gray-400 rounded-md hover:bg-gray-100 hover:text-gray-500">
                                <!-- Heroicon name: outline/heart -->
                                <svg class="flex-shrink-0 w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                <span class="sr-only">Add to favorites</span>
                            </button>
                        </div>
                        <div class="pt-5 mt-5 border-t border-gray-200">
                            <h3 class="text-sm font-medium text-gray-900">{{ __('Share') }}</h3>
                            <ul role="list" class="flex items-center mt-4 space-x-6 rtl:space-x-reverse">
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center w-6 h-6 text-blue-600 hover:text-blue-500">
                                        <span class="sr-only">Share on Facebook</span>
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center w-6 h-6 text-yellow-600 hover:text-yellow-500">
                                        <span class="sr-only">Share on Instagram</span>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center w-6 h-6 text-sky-600 hover:text-sky-500">
                                        <span class="sr-only">Share on Twitter</span>
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            aria-hidden="true">
                                            <path
                                                d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84">
                                            </path>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center w-6 h-6 text-green-600 hover:text-green-500">
                                        <span class="sr-only">Share on Whatsapp</span>
                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z">
                                            </path>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </form>

                    <section aria-labelledby="details-heading" class="mt-5" x-data="{ specificationsMenu: false, featuresMenu: false }">
                        <h2 id="details-heading" class="sr-only">Additional details</h2>

                        <div class="border-t divide-y divide-gray-200">
                            <div>
                                <h3>
                                    <!-- Expand/collapse question button -->
                                    <button x-on:click="specificationsMenu = ! specificationsMenu" type="button"
                                        class="relative flex items-center justify-between w-full py-6 text-left group"
                                        aria-controls="disclosure-1" aria-expanded="false">
                                        <!-- Open: "text-indigo-600", Closed: "text-gray-900" -->
                                        <span class="text-sm font-medium text-gray-900">
                                            Specifications
                                        </span>
                                        <span class="flex items-center ml-6">
                                            <!--
                                Heroicon name: outline/plus-sm
        
                                Open: "hidden", Closed: "block"
                            -->
                                            <svg x-show="!specificationsMenu"
                                                class="block w-6 h-6 text-gray-400 group-hover:text-gray-500"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                            <!--
                                Heroicon name: outline/minus-sm
        
                                Open: "block", Closed: "hidden"
                            -->
                                            <svg x-show="specificationsMenu" style="display: none"
                                                class="w-6 h-6 text-indigo-400 group-hover:text-indigo-500"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M18 12H6" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <div x-show="specificationsMenu" style="display: none" class="pb-6 prose-sm prose"
                                    id="disclosure-1">
                                    <ul role="list">
                                        <li>Multiple strap configurations</li>

                                        <li>Spacious interior with top zip</li>

                                        <li>Leather handle and tabs</li>

                                        <li>Interior dividers</li>

                                        <li>Stainless strap loops</li>

                                        <li>Double stitched construction</li>

                                        <li>Water-resistant</li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <h3>
                                    <!-- Expand/collapse question button -->
                                    <button x-on:click="featuresMenu = ! featuresMenu" type="button"
                                        class="relative flex items-center justify-between w-full py-6 text-left group"
                                        aria-controls="disclosure-1" aria-expanded="false">
                                        <!-- Open: "text-indigo-600", Closed: "text-gray-900" -->
                                        <span class="text-sm font-medium text-gray-900">
                                            Features
                                        </span>
                                        <span class="flex items-center ml-6">
                                            <!--
                                Heroicon name: outline/plus-sm
        
                                Open: "hidden", Closed: "block"
                            -->
                                            <svg x-show="!featuresMenu"
                                                class="block w-6 h-6 text-gray-400 group-hover:text-gray-500"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                            <!--
                                Heroicon name: outline/minus-sm
        
                                Open: "block", Closed: "hidden"
                            -->
                                            <svg x-show="featuresMenu" style="display: none"
                                                class="w-6 h-6 text-indigo-400 group-hover:text-indigo-500"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M18 12H6" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <div x-show="featuresMenu" style="display: none" class="pb-6 prose-sm prose"
                                    id="disclosure-1">
                                    <ul role="list">
                                        <li>Multiple strap configurations</li>

                                        <li>Spacious interior with top zip</li>

                                        <li>Leather handle and tabs</li>

                                        <li>Interior dividers</li>

                                        <li>Stainless strap loops</li>

                                        <li>Double stitched construction</li>

                                        <li>Water-resistant</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- More sections... -->
                        </div>
                    </section>
                </div>
            </div>
            <div class="mt-10" x-data="{
                activeTab: 1,
                activeClass: 'border-indigo-600 text-indigo-600',
                inactiveClass: 'border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300'
            }">

                <div class="flex space-x-8 rtl:space-x-reverse border-b border-gray-200" aria-orientation="horizontal"
                    role="tablist">
                    <button type="button" id="tab-reviews" x-on:click="activeTab = 1"
                        class="py-6 text-sm font-medium border-b-2 whitespace-nowrap"
                        :class="activeTab === 1 ? activeClass : inactiveClass">Customer reviews</button>

                    <button type="button" id="tab-faq" x-on:click="activeTab = 2"
                        class="py-6 text-sm font-medium border-b-2 whitespace-nowrap"
                        :class="activeTab === 2 ? activeClass : inactiveClass">FAQ</button>

                    <button type="button" id="tab-license" x-on:click="activeTab = 3"
                        class="py-6 text-sm font-medium border-b-2 whitespace-nowrap"
                        :class="activeTab === 3 ? activeClass : inactiveClass">Specifications</button>
                </div>
                <div id="tab-panel-reviews" x-show="activeTab === 1" class="">
                    <h3 class="sr-only">Customer Reviews</h3>
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white">
                        <div class="mt-5 lg:grid lg:grid-cols-12 lg:gap-x-8">
                            <div class="lg:col-span-4">
                                <h2 class="text-lg font-medium tracking-tight text-gray-900">Customer Reviews</h2>

                                <div class="flex items-center mt-3 text-yellow-400">
                                    <x-stars :stars="4" />
                                    <p class="ml-2 text-sm text-gray-900">Based on 1624 reviews</p>
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
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>

                                                    <div class="relative flex-1 ml-3">
                                                        <div
                                                            class="h-3 bg-gray-100 border border-gray-200 rounded-full">
                                                        </div>

                                                        <div style="width: calc(1019 / 1624 * 100%)"
                                                            class="absolute inset-y-0 bg-yellow-400 border border-yellow-400 rounded-full">
                                                        </div>
                                                    </div>
                                                </div>
                                            </dt>
                                            <dd class="w-10 ml-3 text-sm text-right text-gray-900 tabular-nums">63%
                                            </dd>
                                        </div>

                                        <div class="flex items-center text-sm">
                                            <dt class="flex items-center flex-1">
                                                <p class="w-3 font-medium text-gray-900">4<span class="sr-only"> star
                                                        reviews</span></p>
                                                <div aria-hidden="true" class="flex items-center flex-1 ml-1">
                                                    <!-- Heroicon name: solid/star -->
                                                    <svg class="flex-shrink-0 w-5 h-5 text-yellow-400"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>

                                                    <div class="relative flex-1 ml-3">
                                                        <div
                                                            class="h-3 bg-gray-100 border border-gray-200 rounded-full">
                                                        </div>

                                                        <div style="width: calc(162 / 1624 * 100%)"
                                                            class="absolute inset-y-0 bg-yellow-400 border border-yellow-400 rounded-full">
                                                        </div>
                                                    </div>
                                                </div>
                                            </dt>
                                            <dd class="w-10 ml-3 text-sm text-right text-gray-900 tabular-nums">10%
                                            </dd>
                                        </div>

                                        <div class="flex items-center text-sm">
                                            <dt class="flex items-center flex-1">
                                                <p class="w-3 font-medium text-gray-900">3<span class="sr-only"> star
                                                        reviews</span></p>
                                                <div aria-hidden="true" class="flex items-center flex-1 ml-1">
                                                    <!-- Heroicon name: solid/star -->
                                                    <svg class="flex-shrink-0 w-5 h-5 text-yellow-400"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>

                                                    <div class="relative flex-1 ml-3">
                                                        <div
                                                            class="h-3 bg-gray-100 border border-gray-200 rounded-full">
                                                        </div>

                                                        <div style="width: calc(97 / 1624 * 100%)"
                                                            class="absolute inset-y-0 bg-yellow-400 border border-yellow-400 rounded-full">
                                                        </div>
                                                    </div>
                                                </div>
                                            </dt>
                                            <dd class="w-10 ml-3 text-sm text-right text-gray-900 tabular-nums">6%</dd>
                                        </div>

                                        <div class="flex items-center text-sm">
                                            <dt class="flex items-center flex-1">
                                                <p class="w-3 font-medium text-gray-900">2<span class="sr-only"> star
                                                        reviews</span></p>
                                                <div aria-hidden="true" class="flex items-center flex-1 ml-1">
                                                    <!-- Heroicon name: solid/star -->
                                                    <svg class="flex-shrink-0 w-5 h-5 text-yellow-400"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>

                                                    <div class="relative flex-1 ml-3">
                                                        <div
                                                            class="h-3 bg-gray-100 border border-gray-200 rounded-full">
                                                        </div>

                                                        <div style="width: calc(199 / 1624 * 100%)"
                                                            class="absolute inset-y-0 bg-yellow-400 border border-yellow-400 rounded-full">
                                                        </div>
                                                    </div>
                                                </div>
                                            </dt>
                                            <dd class="w-10 ml-3 text-sm text-right text-gray-900 tabular-nums">12%
                                            </dd>
                                        </div>

                                        <div class="flex items-center text-sm">
                                            <dt class="flex items-center flex-1">
                                                <p class="w-3 font-medium text-gray-900">1<span class="sr-only"> star
                                                        reviews</span></p>
                                                <div aria-hidden="true" class="flex items-center flex-1 ml-1">
                                                    <!-- Heroicon name: solid/star -->
                                                    <svg class="flex-shrink-0 w-5 h-5 text-yellow-400"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>

                                                    <div class="relative flex-1 ml-3">
                                                        <div
                                                            class="h-3 bg-gray-100 border border-gray-200 rounded-full">
                                                        </div>

                                                        <div style="width: calc(147 / 1624 * 100%)"
                                                            class="absolute inset-y-0 bg-yellow-400 border border-yellow-400 rounded-full">
                                                        </div>
                                                    </div>
                                                </div>
                                            </dt>
                                            <dd class="w-10 ml-3 text-sm text-right text-gray-900 tabular-nums">9%</dd>
                                        </div>
                                    </dl>
                                </div>

                                <div class="mt-10">
                                    <h3 class="text-lg font-medium text-gray-900">Share your thoughts</h3>
                                    <p class="mt-1 text-sm text-gray-600">If you’ve used this product, share your
                                        thoughts
                                        with other customers</p>

                                    <a href="#"
                                        class="inline-flex items-center justify-center w-full px-8 py-2 mt-6 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-md hover:bg-gray-50 sm:w-auto lg:w-full">Write
                                        a review</a>
                                </div>
                            </div>

                            <div class="mt-16 lg:mt-0 lg:col-start-6 lg:col-span-7">
                                <h3 class="sr-only">Recent reviews</h3>

                                <div class="flex space-x-4 rtl:space-x-reverse text-sm text-gray-500">
                                    <div class="flex-none py-10">
                                        <img src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=8&amp;w=256&amp;h=256&amp;q=80"
                                            alt="" class="w-10 h-10 bg-gray-100 rounded-full" />
                                    </div>
                                    <div class="py-10">
                                        <h3 class="font-medium text-gray-900">Emily Selman</h3>
                                        <p><time datetime="2021-07-16">July 16, 2021</time></p>

                                        <div class="flex items-center mt-4 text-yellow-400">
                                            <x-stars :stars="5" />
                                        </div>

                                        <div class="mt-4 prose-sm prose text-gray-500 max-w-none">
                                            <p>
                                                This icon pack is just what I need for my latest project.
                                                There's an icon for just about anything I could ever need.
                                                Love the playful look!
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <div class="flex space-x-4 rtl:space-x-reverse text-sm text-gray-500">
                                    <div class="flex-none py-10">
                                        <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&amp;ixqx=oilqXxSqey&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                            alt="" class="w-10 h-10 bg-gray-100 rounded-full" />
                                    </div>
                                    <div class="py-10 border-t border-gray-200">
                                        <h3 class="font-medium text-gray-900">Mark Edwards</h3>
                                        <p><time datetime="2021-07-06">July 6, 2021</time></p>

                                        <div class="text-yellow-400 mt-4">
                                            <x-stars :stars="$stars" />
                                        </div>
                                        <p class="sr-only">4 out of 5 stars</p>

                                        <div class="mt-4 prose-sm prose text-gray-500 max-w-none">
                                            <p>
                                                Really happy with look and options of these icons. I've
                                                found uses for them everywhere in my recent projects. I hope
                                                there will be 20px versions in the future!
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div id="tab-panel-faq" x-show="activeTab === 2" class="pt-5" style="display: none">
                    <h3>Frequently Asked Questions</h3>
                </div>

                <div id="tab-panel-license" x-show="activeTab === 3" class="pt-5" style="display: none">
                    <div>
                        <h2 class="font-semibold tracking-tight text-gray-900">Product Specifications</h2>
                        <p class="mt-4 text-gray-500">The walnut wood card tray is precision milled to perfectly fit a
                            stack
                            of Focus cards. The powder coated steel divider separates active cards from new ones, or can
                            be
                            used to archive important task lists.</p>

                        <dl class="grid grid-cols-1 mt-16 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">

                            <div class="pt-4 border-t border-gray-200">
                                <dt class="font-medium text-gray-900">Origin</dt>
                                <dd class="mt-2 text-sm text-gray-500">Designed by Good Goods, Inc.</dd>
                            </div>

                            <div class="pt-4 border-t border-gray-200">
                                <dt class="font-medium text-gray-900">Material</dt>
                                <dd class="mt-2 text-sm text-gray-500">Solid walnut base with rare earth magnets and
                                    powder
                                    coated steel card cover</dd>
                            </div>

                            <div class="pt-4 border-t border-gray-200">
                                <dt class="font-medium text-gray-900">Dimensions</dt>
                                <dd class="mt-2 text-sm text-gray-500">6.25" x 3.55" x 1.15"</dd>
                            </div>

                            <div class="pt-4 border-t border-gray-200">
                                <dt class="font-medium text-gray-900">Finish</dt>
                                <dd class="mt-2 text-sm text-gray-500">Hand sanded and finished with natural oil</dd>
                            </div>

                            <div class="pt-4 border-t border-gray-200">
                                <dt class="font-medium text-gray-900">Includes</dt>
                                <dd class="mt-2 text-sm text-gray-500">Wood card tray and 3 refill packs</dd>
                            </div>

                            <div class="pt-4 border-t border-gray-200">
                                <dt class="font-medium text-gray-900">Considerations</dt>
                                <dd class="mt-2 text-sm text-gray-500">Made from natural materials. Grain and color
                                    vary
                                    with each item.</dd>
                            </div>

                        </dl>
                    </div>
                </div>
            </div>

            <!-- Similar products -->
            <div class="mt-10 bg-white">
                <h2 class="text-xl font-semibold text-center text-gray-900 sm:text-right sm:text-2xl">Similar Products
                </h2>

                <div
                    class="grid grid-cols-1 mt-8 gap-y-12 sm:grid-cols-2 sm:gap-x-6 md:grid-cols-3 lg:grid-cols-5 xl:gap-x-8">
                    <div>
                        <div class="relative">
                            <div class="relative w-full overflow-hidden rounded-lg h-72">
                                <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-related-product-01.jpg"
                                    alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls."
                                    class="object-cover object-center w-full h-full">
                            </div>
                            <div class="relative mt-4">
                                <h3 class="text-sm font-medium text-gray-900">Zip Tote Basket</h3>
                                <p class="mt-1 text-sm text-gray-500">White and black</p>
                            </div>
                            <div
                                class="absolute inset-x-0 top-0 flex items-end justify-end p-4 overflow-hidden rounded-lg h-72">
                                <div aria-hidden="true"
                                    class="absolute inset-x-0 bottom-0 opacity-50 h-36 bg-gradient-to-t from-black">
                                </div>
                                <p class="relative text-lg font-semibold text-white">$140</p>
                            </div>
                        </div>
                        <div class="mt-6">
                            <a href="#"
                                class="relative flex items-center justify-center px-8 py-2 text-sm font-medium text-gray-900 bg-gray-100 border border-transparent rounded-md hover:bg-gray-200">Add
                                to bag<span class="sr-only">, Zip Tote Basket</span></a>
                        </div>
                    </div>
                    <div>
                        <div class="relative">
                            <div class="relative w-full overflow-hidden rounded-lg h-72">
                                <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-related-product-02.jpg"
                                    alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls."
                                    class="object-cover object-center w-full h-full">
                            </div>
                            <div class="relative mt-4">
                                <h3 class="text-sm font-medium text-gray-900">Zip Tote Basket</h3>
                                <p class="mt-1 text-sm text-gray-500">White and black</p>
                            </div>
                            <div
                                class="absolute inset-x-0 top-0 flex items-end justify-end p-4 overflow-hidden rounded-lg h-72">
                                <div aria-hidden="true"
                                    class="absolute inset-x-0 bottom-0 opacity-50 h-36 bg-gradient-to-t from-black">
                                </div>
                                <p class="relative text-lg font-semibold text-white">$140</p>
                            </div>
                        </div>
                        <div class="mt-6">
                            <a href="#"
                                class="relative flex items-center justify-center px-8 py-2 text-sm font-medium text-gray-900 bg-gray-100 border border-transparent rounded-md hover:bg-gray-200">Add
                                to bag<span class="sr-only">, Zip Tote Basket</span></a>
                        </div>
                    </div>
                    <div>
                        <div class="relative">
                            <div class="relative w-full overflow-hidden rounded-lg h-72">
                                <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-related-product-03.jpg"
                                    alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls."
                                    class="object-cover object-center w-full h-full">
                            </div>
                            <div class="relative mt-4">
                                <h3 class="text-sm font-medium text-gray-900">Zip Tote Basket</h3>
                                <p class="mt-1 text-sm text-gray-500">White and black</p>
                            </div>
                            <div
                                class="absolute inset-x-0 top-0 flex items-end justify-end p-4 overflow-hidden rounded-lg h-72">
                                <div aria-hidden="true"
                                    class="absolute inset-x-0 bottom-0 opacity-50 h-36 bg-gradient-to-t from-black">
                                </div>
                                <p class="relative text-lg font-semibold text-white">$140</p>
                            </div>
                        </div>
                        <div class="mt-6">
                            <a href="#"
                                class="relative flex items-center justify-center px-8 py-2 text-sm font-medium text-gray-900 bg-gray-100 border border-transparent rounded-md hover:bg-gray-200">Add
                                to bag<span class="sr-only">, Zip Tote Basket</span></a>
                        </div>
                    </div>
                    <div>
                        <div class="relative">
                            <div class="relative w-full overflow-hidden rounded-lg h-72">
                                <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-related-product-04.jpg"
                                    alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls."
                                    class="object-cover object-center w-full h-full">
                            </div>
                            <div class="relative mt-4">
                                <h3 class="text-sm font-medium text-gray-900">Zip Tote Basket</h3>
                                <p class="mt-1 text-sm text-gray-500">White and black</p>
                            </div>
                            <div
                                class="absolute inset-x-0 top-0 flex items-end justify-end p-4 overflow-hidden rounded-lg h-72">
                                <div aria-hidden="true"
                                    class="absolute inset-x-0 bottom-0 opacity-50 h-36 bg-gradient-to-t from-black">
                                </div>
                                <p class="relative text-lg font-semibold text-white">$140</p>
                            </div>
                        </div>
                        <div class="mt-6">
                            <a href="#"
                                class="relative flex items-center justify-center px-8 py-2 text-sm font-medium text-gray-900 bg-gray-100 border border-transparent rounded-md hover:bg-gray-200">Add
                                to bag<span class="sr-only">, Zip Tote Basket</span></a>
                        </div>
                    </div>
                    <div>
                        <div class="relative">
                            <div class="relative w-full overflow-hidden rounded-lg h-72">
                                <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-related-product-02.jpg"
                                    alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls."
                                    class="object-cover object-center w-full h-full">
                            </div>
                            <div class="relative mt-4">
                                <h3 class="text-sm font-medium text-gray-900">Zip Tote Basket</h3>
                                <p class="mt-1 text-sm text-gray-500">White and black</p>
                            </div>
                            <div
                                class="absolute inset-x-0 top-0 flex items-end justify-end p-4 overflow-hidden rounded-lg h-72">
                                <div aria-hidden="true"
                                    class="absolute inset-x-0 bottom-0 opacity-50 h-36 bg-gradient-to-t from-black">
                                </div>
                                <p class="relative text-lg font-semibold text-white">$140</p>
                            </div>
                        </div>
                        <div class="mt-6">
                            <a href="#"
                                class="relative flex items-center justify-center px-8 py-2 text-sm font-medium text-gray-900 bg-gray-100 border border-transparent rounded-md hover:bg-gray-200">Add
                                to bag<span class="sr-only">, Zip Tote Basket</span></a>
                        </div>
                    </div>
                    <!-- More products... -->
                </div>
            </div>
        @else
            <div class="flex justify-center font-semibold">
                {{ __('Sorry!. This product is not Available.') }}
            </div>
        @endif
    </div>
</div>
