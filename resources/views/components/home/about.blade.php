<div class="pt-0 sm:pt-12 lg:pt-24 lg:pb-10">
    <div class="pb-8 bg-sky-700 lg:pb-0 lg:relative">
        <div class="lg:screen lg:grid lg:grid-cols-3 lg:gap-8">

            <div class="sm:mt-12 lg:m-0 lg:col-span-2 lg:pl-8">
                <div class="max-w-md px-4 py-4 mx-auto sm:max-w-2xl sm:px-6 lg:px-0 lg:py-20 lg:max-w-none">
                    <div>
                        <h1 class="text-2xl font-bold text-center text-white uppercase sm:text-3xl">
                            {{ config('global.name_' . App::getLocale()) }}
                        </h1>
                        <p class="my-4 text-base text-center text-white ">
                            {{ config('global.description_' . App::getLocale()) }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div aria-hidden="true" class="absolute inset-x-0 top-0 hidden bg-white sm:block h-1/2 lg:hidden">
                </div>
                <div class="max-w-md px-4 mx-auto sm:max-w-3xl sm:px-6 lg:p-0 lg:h-full">
                    <div
                        class="px-2 overflow-hidden aspect-w-8 aspect-h-6 sm:aspect-w-16 sm:aspect-h-7 lg:aspect-none lg:h-full">
                        <img class="object-contain lg:h-full lg:w-full" src="{{ asset('storage/'.config('global.logo_'.App::getLocale())) }}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
