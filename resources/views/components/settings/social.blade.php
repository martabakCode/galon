<div>
    <form id="general_settings_form" class="relative" wire:submit.prevent="saveSocial">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-2 divide-x-2 rtl:divide-x-reverse">
            <!-- Contact form -->
            <div class="lg:col-span-2 mt-6">
                <div class="grid grid-cols-1  gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                    <div class="sm:col-span-2">
                        <label for="facebook" class="block text-sm font-medium text-gray-700">
                            {{ __('Facebook') }}
                        </label>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="text" wire:model.defer="settings.facebook"
                                    class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="https://facebook.com/Galonmart" aria-describedby="facebook">
                                <div
                                    class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                    <span class="text-gray-500 sm:text-xs" id="facebook">
                                        {{ __('Required') }}
                                    </span>
                                </div>
                            </div>
                            @error('settings.facebook')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="twitter" class="block text-sm font-medium text-gray-700">
                            {{ __('Twitter') }}
                        </label>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="text" wire:model.defer="settings.twitter"
                                    class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="https://twitter.com/Galonmart" aria-describedby="twitter">
                                <div
                                    class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                    <span class="text-gray-500 sm:text-xs" id="twitter">
                                        {{ __('Required') }}
                                    </span>
                                </div>
                            </div>
                            @error('settings.twitter')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="instagram" class="block text-sm font-medium text-gray-700">
                            {{ __('Instagram') }}
                        </label>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="text" wire:model.defer="settings.instagram"
                                    class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="https://instagram.com/Galonmart" aria-describedby="instagram">
                                <div
                                    class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                    <span class="text-gray-500 sm:text-xs" id="instagram">
                                        {{ __('Required') }}
                                    </span>
                                </div>
                            </div>
                            @error('settings.instagram')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="youtube" class="block text-sm font-medium text-gray-700">
                            {{ __('Youtube') }}
                        </label>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="text" wire:model.defer="settings.youtube"
                                    class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="https://youtube.com/Galonmart" aria-describedby="youtube">
                                <div
                                    class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                    <span class="text-gray-500 sm:text-xs" id="youtube">
                                        {{ __('Required') }}
                                    </span>
                                </div>
                            </div>
                            @error('settings.youtube')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="whatsapp" class="block text-sm font-medium text-gray-700">
                            {{ __('Whatsapp') }}
                        </label>
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="text" wire:model.defer="settings.whatsapp"
                                    class="block w-full border-gray-300 rounded-md peer read-only:bg-gray-100 placeholder:text-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="01139370239" aria-describedby="whatsapp">
                                <div
                                    class="absolute inset-y-0 flex items-center px-2 m-1 bg-gray-100 pointer-events-none peer-optional:hidden ltr:right-0 rtl:left-0">
                                    <span class="text-gray-500 sm:text-xs" id="whatsapp">
                                        {{ __('Required') }}
                                    </span>
                                </div>
                            </div>
                            @error('settings.whatsapp')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
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
