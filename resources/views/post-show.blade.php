<x-guest-layout>
    <div class="relative min-h-screen py-10 overflow-hidden bg-white screen">
        <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="mx-auto text-lg max-w-prose">
                <h1 class="pb-2">
                    <span class="block text-base font-semibold tracking-wide text-center text-indigo-600 uppercase">
                        {{ $post->category->getTranslation('name', App::getLocale()) }}
                    </span>
                    <span
                        class="block mt-2 text-2xl font-bold leading-6 tracking-tight text-center text-gray-900 sm:text-3xl">
                        {{ $post->getTranslation('title', App::getLocale()) }}
                    </span>
                </h1>
                <figure>
                    <img class="w-full rounded-lg" src="{{ $post->image() }}" alt="" width="1310" height="873">
                    <figcaption>{{ $post->getTranslation('title', App::getLocale()) }}</figcaption>
                </figure>
                <p class="mt-8 text-xl leading-8 text-gray-500">{!! $post->$excerpt !!}
                </p>
            </div>
            <div class="mx-auto mt-6 prose prose-lg text-gray-500 prose-indigo">
                {!! $post->$content !!}
            </div>
           
        </div>
    </div>
</x-guest-layout>
