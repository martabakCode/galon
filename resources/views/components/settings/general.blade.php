<div>
    <form id="general_settings_form" class="relative" wire:submit.prevent="saveGeneral">
        <div class="mt-4 max-w-sm">
            <h1 class="py-2">{{ __('Logo') }}</h1>
            <x-upload-image :image="$this->logo" :name="'logo'" :width="'full'" />
        </div>
        <div class="mt-4 max-w-sm">
            <h1 class="py-2">{{ __('Icon') }}</h1>
            <x-upload-image :image="$this->icon" :name="'icon'" />
        </div>
        <div class="grid grid-cols-1 gap-2 divide-x-2 rtl:divide-x-reverse lg:grid-cols-3">
            <!-- Contact form -->
            <div class="mt-6 lg:col-span-2">
                <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                    <div class="sm:col-span-2">
                        <label for="name_en"
                            class="block text-sm font-medium text-gray-700">{{ __('Name') }}&nbsp;{{ __('English') }}</label>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="text" wire:model.defer="settings.name_en" required
                                    class="peer block w-full rounded-md border-gray-300 placeholder:text-gray-400 read-only:bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Name" aria-describedby="name_en">
                                <div
                                    class="peer-optional:hidden pointer-events-none absolute inset-y-0 m-1 flex items-center bg-gray-100 px-2 ltr:right-0 rtl:left-0">
                                    <span class="text-gray-500 sm:text-xs" id="name_en">
                                        {{ __('Required') }}
                                    </span>
                                </div>
                            </div>
                            @error('settings.name')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="name_id"
                            class="block text-sm font-medium text-gray-700">{{ __('Name') }}&nbsp;{{ __('Indonesia') }}</label>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="text" wire:model.defer="settings.name_id" required
                                    class="peer block w-full rounded-md border-gray-300 placeholder:text-gray-400 read-only:bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="{{ __('Name') }}" aria-describedby="name_id">
                                <div
                                    class="peer-optional:hidden pointer-events-none absolute inset-y-0 m-1 flex items-center bg-gray-100 px-2 ltr:right-0 rtl:left-0">
                                    <span class="text-gray-500 sm:text-xs" id="name_id">
                                        {{ __('Required') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        @error('settings.name_id')
                            <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                        @enderror
                    </div>

                    <div x-cloak class="sm:col-span-2">
                        <div class="flex justify-between">
                            <label for="description_en" class="block text-sm font-medium text-gray-700">
                                {{ __('Description') }} {{ __('English') }}
                            </label>
                            <p class="peer-optional:hidden text-xs text-gray-500">{{ __('Required') }}</p>
                        </div>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <textarea rows="3" wire:model.defer="settings.description_en" required
                                    class="peer block w-full rounded-md border-gray-300 placeholder:text-gray-400 read-only:bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="{{ __('Short Description') }}" aria-describedby="description_en">
                                </textarea>
                            </div>
                            @error('settings.description_en')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div x-cloak class="sm:col-span-2">
                        <div class="flex justify-between">
                            <label for="description_id" class="block text-sm font-medium text-gray-700">
                                {{ __('Description') }} {{ __('Indonesia') }}
                            </label>
                            <p class="peer-optional:hidden text-xs text-gray-500">{{ __('Required') }}</p>
                        </div>

                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <textarea rows="3" wire:model.defer="settings.description_id" required
                                    class="peer block w-full rounded-md border-gray-300 placeholder:text-gray-400 read-only:bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="{{ __('Short Description') }}" aria-describedby="description_id">
                                </textarea>
                            </div>

                            @error('settings.description_id')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div x-cloak class="sm:col-span-2">
                        <div class="flex justify-between">
                            <label for="keywords_en"
                                class="block text-sm font-medium text-gray-700">{{ __('Keywords') }}
                                {{ __('English') }}
                                <span class="text-xs text-gray-500">({{ __('Separated by comma') }})

                                </span>
                            </label>
                            <p class="peer-optional:hidden text-xs text-gray-500">{{ __('Required') }}</p>
                        </div>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <textarea rows="3" wire:model.defer="settings.keywords_en" required
                                    class="peer block w-full rounded-md border-gray-300 placeholder:text-gray-400 read-only:bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="{{ __('Galon Mart, store, wholesale') }}" aria-describedby="tags_en">
                                </textarea>
                            </div>
                            @error('settings.tags_en')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div x-cloak class="sm:col-span-2">
                        <div class="flex justify-between">
                            <label for="keywords_id"
                                class="block text-sm font-medium text-gray-700">{{ __('Keywords') }}
                                {{ __('Indonesia') }}
                                <span class="text-xs text-gray-500">
                                    ({{ __('Separated by comma') }})
                                </span>
                            </label>
                            <p class="peer-optional:hidden text-xs text-gray-500">{{ __('Required') }}</p>
                        </div>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <textarea rows="3" wire:model.defer="settings.keywords_id" required
                                    class="peer block w-full rounded-md border-gray-300 placeholder:text-gray-400 read-only:bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="{{ __('Galon Mart, store, wholesale') }}" aria-describedby="tags_id">
                                </textarea>
                            </div>
                            @error('settings.tags_id')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <label for="currency_en"
                            class="block text-sm font-medium text-gray-700">{{ __('Currency English') }}</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="text" wire:model.defer="settings.currency_en" required
                                class="peer block w-full rounded-md border-gray-300 placeholder:text-gray-400 read-only:bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="YR" aria-describedby="currency_en">
                            <div
                                class="peer-optional:hidden pointer-events-none absolute inset-y-0 m-1 flex items-center bg-gray-100 px-2 ltr:right-0 rtl:left-0">
                                <span class="text-gray-500 sm:text-xs" id="currency_en">
                                    {{ __('Required') }}
                                </span>
                            </div>
                        </div>
                        @error('settings.currency_en')
                            <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <label for="currency_id"
                            class="block text-sm font-medium text-gray-700">{{ __('Currency Indonesia') }}</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="text" wire:model.defer="settings.currency_id" required
                                class="peer block w-full rounded-md border-gray-300 placeholder:text-gray-400 read-only:bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="ريال" aria-describedby="currency_id">
                            <div
                                class="peer-optional:hidden pointer-events-none absolute inset-y-0 m-1 flex items-center bg-gray-100 px-2 ltr:right-0 rtl:left-0">
                                <span class="text-gray-500 sm:text-xs" id="currency_id">
                                    {{ __('Required') }}
                                </span>
                            </div>
                        </div>
                        @error('settings.currency_id')
                            <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="contact"
                            class="block text-sm font-medium text-gray-700">{{ __('Contact Number') }}</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="number" wire:model.defer="settings.contact"
                                class="peer block w-full rounded-md border-gray-300 placeholder:text-gray-400 read-only:bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="0097671175643" aria-describedby="contact">
                            <div
                                class="peer-optional:hidden pointer-events-none absolute inset-y-0 m-1 flex items-center bg-gray-100 px-2 ltr:right-0 rtl:left-0">
                                <span class="text-gray-500 sm:text-xs" id="contact">
                                    {{ __('Required') }}
                                </span>
                            </div>
                        </div>
                        @error('settings.contact')
                            <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email"
                            class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="email" wire:model.defer="settings.email"
                                class="peer block w-full rounded-md border-gray-300 placeholder:text-gray-400 read-only:bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="example@Galon Mart.net" aria-describedby="email">
                            <div
                                class="peer-optional:hidden pointer-events-none absolute inset-y-0 m-1 flex items-center bg-gray-100 px-2 ltr:right-0 rtl:left-0">
                                <span class="text-gray-500 sm:text-xs" id="email">
                                    {{ __('Required') }}
                                </span>
                            </div>
                        </div>
                        @error('settings.email')
                            <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                        @enderror
                    </div>
                    <!-- Address English -->
                    <div class="sm:col-span-2">
                        <h2>{{ __('Address') }} {{ __('English') }}</h2>
                        <div class="grid sm:grid-cols-3 sm:gap-3">
                            <div>
                                <label for="country_en" class="block text-sm font-medium text-gray-700">Country
                                </label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <input type="text" wire:model.defer="settings.country_en"
                                        class="peer block w-full rounded-md border-gray-300 placeholder:text-gray-400 read-only:bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        placeholder="Indonesia" aria-describedby="country_en">
                                    <div
                                        class="peer-optional:hidden pointer-events-none absolute inset-y-0 m-1 flex items-center bg-gray-100 px-2 ltr:right-0 rtl:left-0">
                                        <span class="text-gray-500 sm:text-xs" id="country_en">
                                            {{ __('Required') }}
                                        </span>
                                    </div>
                                </div>
                                @error('settings.country_en')
                                    <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="city_en" class="block text-sm font-medium text-gray-700">City
                                </label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <input type="text" wire:model.defer="settings.city_en"
                                        class="peer block w-full rounded-md border-gray-300 placeholder:text-gray-400 read-only:bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        placeholder="Surabaya" aria-describedby="city_en">
                                    <div
                                        class="peer-optional:hidden pointer-events-none absolute inset-y-0 m-1 flex items-center bg-gray-100 px-2 ltr:right-0 rtl:left-0">
                                        <span class="text-gray-500 sm:text-xs" id="city_en">
                                            {{ __('Required') }}
                                        </span>
                                    </div>
                                </div>
                                @error('settings.city_en')
                                    <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="post_code"
                                    class="block text-sm font-medium text-gray-700">{{ __('Post Code') }}
                                </label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <input type="text" wire:model.defer="settings.post_code"
                                        class="peer block w-full rounded-md border-gray-300 placeholder:text-gray-400 read-only:bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        placeholder="53000" aria-describedby="post_code">
                                    <div
                                        class="peer-optional:hidden pointer-events-none absolute inset-y-0 m-1 flex items-center bg-gray-100 px-2 ltr:right-0 rtl:left-0">
                                        <span class="text-gray-500 sm:text-xs" id="post_code">
                                            {{ __('Required') }}
                                        </span>
                                    </div>
                                </div>
                                @error('settings.post_code')
                                    <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Address Indonesia -->
                    <div class="sm:col-span-2">
                        <h2>{{ __('Address') }} {{ __('Indonesia') }}</h2>
                        <div class="grid gap-3 sm:grid-cols-2">
                            <div>
                                <label for="country_id"
                                    class="block text-sm font-medium text-gray-700">{{ __('Country') }}
                                </label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <input type="text" wire:model.defer="settings.country_id"
                                        class="peer block w-full rounded-md border-gray-300 placeholder:text-gray-400 read-only:bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        placeholder="اليمن" aria-describedby="country_id">
                                    <div
                                        class="peer-optional:hidden pointer-events-none absolute inset-y-0 m-1 flex items-center bg-gray-100 px-2 ltr:right-0 rtl:left-0">
                                        <span class="text-gray-500 sm:text-xs" id="country_id">
                                            {{ __('Required') }}
                                        </span>
                                    </div>
                                </div>
                                @error('settings.country_id')
                                    <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="city_id"
                                    class="block text-sm font-medium text-gray-700">{{ __('City') }}
                                </label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <input type="text" wire:model.defer="settings.city_id"
                                        class="peer block w-full rounded-md border-gray-300 placeholder:text-gray-400 read-only:bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        placeholder="تعز" aria-describedby="city_id">
                                    <div
                                        class="peer-optional:hidden pointer-events-none absolute inset-y-0 m-1 flex items-center bg-gray-100 px-2 ltr:right-0 rtl:left-0">
                                        <span class="text-gray-500 sm:text-xs" id="city_id">
                                            {{ __('Required') }}
                                        </span>
                                    </div>
                                </div>
                                @error('settings.city_id')
                                    <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 border-t pt-2 sm:col-span-2 sm:flex sm:justify-end">
            <div class="flex justify-end">
                <x-session-msg2 />
                {{-- <button type="button" class="btn-cancel">
                    {{ __('Cancel') }}
                </button> --}}
                <button type="submit" class="btn ltr:ml-3 rtl:mr-3">
                    {{ __('Save') }}
                </button>
            </div>
        </div>
    </form>
</div>
