<div>
    <form id="general_settings_form" class="relative" wire:submit.prevent="saveFooter">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-2 divide-x-2 rtl:divide-x-reverse">
            <!-- Contact form -->
            <div class="lg:col-span-2 mt-6">
                <div class="grid grid-cols-1  gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                    <div class="sm:col-span-2">
                        <label for="copy_right_en"
                            class="block text-sm font-medium text-gray-700">{{ __('Copyright') }}&nbsp;{{ __('English') }}</label>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="text" wire:model.defer="settings.copy_right_en" required
                                    class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="Copyright" aria-describedby="copy_right_en">
                                <div
                                    class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                    <span class="text-gray-500 sm:text-xs">
                                        {{ __('Required') }}
                                    </span>
                                </div>
                            </div>
                            @error('settings.copy_right_en')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="copy_right_id"
                            class="block text-sm font-medium text-gray-700">{{ __('Copyright') }}&nbsp;{{ __('Indonesia') }}</label>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="text" wire:model.defer="settings.copy_right_id" required
                                    class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="{{ __('الحقوق') }}" aria-describedby="copy_right_id">
                                <div
                                    class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                    <span class="text-gray-500 sm:text-xs" id="copy_right_id">
                                        {{ __('Required') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        @error('settings.copy_right_id')
                            <p class="mt-2 text-xs text-red-600">{{ __($message) }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
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
