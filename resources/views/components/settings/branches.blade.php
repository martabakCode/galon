<div>
    <form id="general_settings_form" class="relative" wire:submit.prevent="saveBranches">
        @for ($i = 0; $i < count($this->branches); $i++)
            <h1 class="mb-2">{{ __('Branch') }} {{ $i + 1 }}</h1>
            <div class="grid grid-cols-1  gap-y-6 sm:grid-cols-2 sm:gap-x-8 pb-6 mb-2 border-b border-gray-300">
                <!-- Branch 1 -->
                <div class="">
                    <label for="branch{{ $i }}_name" class="block text-sm font-medium text-gray-700">
                        {{ __('Name') }}
                    </label>
                    <div>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="text" wire:model.defer="branches.{{ $i }}.name"
                                class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="Indonesia, IBB" aria-describedby="branch{{ $i }}_name">
                            <div
                                class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                <span class="text-gray-500 sm:text-xs" id="branch{{ $i }}_name">
                                    {{ __('Required') }}
                                </span>
                            </div>
                        </div>
                        @error('branches.{{ $i }}.name')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="">
                    <label for="branch{{ $i }}_address" class="block text-sm font-medium text-gray-700">
                        {{ __('Address') }}
                    </label>
                    <div>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="text" wire:model.defer="branches.{{ $i }}.address"
                                class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="Branch name, Surabaya street, Ibb, Indonesia"
                                aria-describedby="branch{{ $i }}_address">
                            <div
                                class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                <span class="text-gray-500 sm:text-xs" id="branch{{ $i }}_address">
                                    {{ __('Required') }}
                                </span>
                            </div>
                        </div>
                        @error('branches.{{ $i }}.address')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="">
                    <label for="branch{{ $i }}_contact" class="block text-sm font-medium text-gray-700">
                        {{ __('Contact') }}
                    </label>
                    <div>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="text" wire:model.defer="branches.{{ $i }}.contact"
                                class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="04654464" aria-describedby="branch{{ $i }}_contact">
                            <div
                                class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                <span class="text-gray-500 sm:text-xs" id="branch{{ $i }}_contact">
                                    {{ __('Required') }}
                                </span>
                            </div>
                        </div>
                        @error('branches.{{ $i }}.contact')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="">
                    <label for="branch{{ $i }}_email" class="block text-sm font-medium text-gray-700">
                        {{ __('Email') }}
                    </label>
                    <div>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="text" wire:model.defer="branches.{{ $i }}.email"
                                class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="brach@company.com" aria-describedby="branch{{ $i }}_email">
                            <div
                                class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                <span class="text-gray-500 sm:text-xs" id="branch{{ $i }}_email">
                                    {{ __('Required') }}
                                </span>
                            </div>
                        </div>
                        @error('branches.{{ $i }}.email')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        @endfor
        <div class="sm:col-span-2 sm:flex sm:justify-end border-t pt-2 mt-4">
            <div class="flex justify-end">
                <x-session-msg2 />

                {{-- <button type="button" class="btn-cancel">
                    {{ __('Cancel') }}
                </button> --}}
                <button type="submit" class="ltr:ml-3 rtl:mr-3 btn">
                    {{ __('Save') }}
                </button>
            </div>
        </div>
    </form>
</div>
