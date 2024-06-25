<div class="py-12 bg-white">
    <div class="screen">
        <div class="lg:text-center">
            <h2 class="flex justify-center text-2xl font-bold tracking-wide text-center uppercase  sm:text-3xl">
                {{ __('Our branches') }}
            </h2>
            <p class="max-w-2xl mx-auto mt-3 text-base text-gray-500 sm:mt-4 text-center">
                {{ __('We have many branches covered main cities all around Indonesia') }}
            </p>
        </div>

        <div class="mt-10">
            <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-4 md:gap-x-8 md:gap-y-10">
                @foreach ($branches as $branch)
                    <div class="relative rtl:mr-2 ltr:ml-2 sm:m-0">
                        <dt>
                            {{-- <div
                                class="absolute flex items-center justify-center w-12 h-12 text-white bg-indigo-500 rounded-md">
                                <!-- Heroicon name: outline/globe-alt -->
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                </svg>
                            </div> --}}
                            <p class=" rtl:sm:mr-16 ltr:sm:ml-16 text-lg font-semibold leading-6 text-gray-900">
                                {{ $branch->name }}</p>
                        </dt>
                        <dd class="mt-2  rtl:sm:mr-16 ltr:sm:ml-16 text-base text-gray-500">{{ $branch->address }}</dd>
                        <dd class="mt-2  rtl:sm:mr-16 ltr:sm:ml-16 text-base text-gray-500">{{ $branch->contact }}</dd>
                        <dd class="mt-2  rtl:sm:mr-16 ltr:sm:ml-16 text-base text-gray-500">{{ $branch->email }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </div>
</div>
