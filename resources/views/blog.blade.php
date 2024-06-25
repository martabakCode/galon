<x-guest-layout>
    <div class="relative screen mt-12">
        <div class="ltr:text-left rtl:text-right">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900 uppercase sm:text-3xl">
                {{ __('Our news') }}
            </h2>
            <p class="mt-3 text-base text-gray-500">
                {{ __('Keep up to date with our latest news, events, promotions, discounts, new products, and many more...') }}
            </p>
        </div>
        <div class="grid max-w-lg gap-5 mx-auto mt-12 lg:grid-cols-3 lg:max-w-none">
            @foreach ($blog as $post)
                <div class="flex flex-col overflow-hidden rounded-lg shadow-lg hover:shadow-2xl">
                    <div class="flex-shrink-0">
                        <img class="object-cover w-full h-48" src="{{ $post->image() }}"
                            alt="{{ $post->getTranslation('title', App::getLocale()) }}">
                    </div>
                    <div class="flex flex-col justify-between flex-1 p-4 bg-white">
                        <div class="flex-1">
                            <div class="flex flex-col">
                                <div class="flex divide-x divide-gray-300 rtl:divide-x-reverse text-sm text-gray-500">
                                    <div class="flex ltr:pr-1 rtl:pl-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <time datetime="{{ $post->created_at->format('d M Y') }}"
                                            class="ltr:ml-1 rtl:mr-1">
                                            {{ $post->created_at->format('d-m-Y') }}
                                        </time>
                                    </div>
                                    <div class="flex px-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="ltr:ml-1 rtl:mr-1">
                                            {{ $post->time_read }} {{ __('min') }}
                                        </span>
                                    </div>
                                    <div class="flex px-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <span class="ltr:ml-1 rtl:mr-1">
                                            {{ $post->reads }}
                                        </span>
                                    </div>
                                </div>
                                <div class="text-sm font-medium text-indigo-600 mt-2">
                                    <a href="{{ route('post.view', $post->getTranslation('slug', App::getLocale())) }}"
                                        class="hover:underline hover:cursor-pointer">
                                        {{ $post->category->getTranslation('name', App::getLocale()) }}
                                    </a>
                                </div>
                            </div>
                            <a href="{{ route('post.view', $post->getTranslation('slug', App::getLocale())) }}"
                                class="block mt-2 hover:underline hover:text-blue-500 hover:cursor-pointer">
                                <p class="text-base font-semibold text-gray-900 hover:text-blue-500">
                                    {{ $post->getTranslation('title', App::getLocale()) }}</p>

                            </a>
                            <p class="mt-3 text-sm text-gray-500">{!! $post->excerpt !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>
