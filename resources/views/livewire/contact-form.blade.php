<div class="px-6 py-10 sm:px-10 lg:col-span-2 xl:p-12">
    <h3 class="text-lg font-medium text-gray-900">{{ __('Send us a message') }}</h3>
    <form wire:submit.prevent="save" class="grid grid-cols-1 mt-6 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
        <div>
            <label for="first-name" class="block text-sm font-medium text-gray-900">
                {{ __('First name') }}
            </label>
            <div class="mt-1">
                <input type="text" name="first-name" id="first-name" wire:model.defer="first_name" required
                    autocomplete="given-name"
                    class="block w-full px-4 py-2 text-gray-900 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            @error('first_name')
                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <div class="flex justify-between">
                <label for="last-name" class="block text-sm font-medium text-gray-900">
                    {{ __('Last name') }}
                </label>
                <span id="phone-optional" class="text-sm text-gray-500">{{ __('Optional') }}</span>
            </div>
            <div class="mt-1">
                <input type="text" name="last-name" id="last-name" wire:model.defer="last_name"
                    autocomplete="family-name"
                    class="block w-full px-4 py-2 text-gray-900 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-900">
                {{ __('Email') }}
            </label>
            <div class="mt-1">
                <input id="email" name="email" type="email" autocomplete="email" wire:model.defer="email"
                    required
                    class="block w-full px-4 py-2 text-gray-900 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            @error('email')
                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <div class="flex justify-between">
                <label for="phone" class="block text-sm font-medium text-gray-900">
                    {{ __('Phone') }}
                </label>
                <span id="phone-optional" class="text-sm text-gray-500">{{ __('Optional') }}</span>
            </div>
            <div class="mt-1">
                <input type="text" name="phone" id="phone" autocomplete="tel" wire:model.defer="phone"
                    class="block w-full px-4 py-2 text-gray-900 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    aria-describedby="phone-optional">
            </div>
        </div>
        <div class="sm:col-span-2">
            <label for="subject" class="block text-sm font-medium text-gray-900">{{ __('Subject') }}</label>
            <div class="mt-1">
                <input type="text" name="subject" id="subject" wire:model.defer="subject" required
                    class="block w-full px-4 py-2 text-gray-900 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            @error('subject')
                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="sm:col-span-2">
            <div class="flex justify-between">
                <label for="message" class="block text-sm font-medium text-gray-900">{{ __('Message') }}</label>
                <span id="message-max" class="text-sm text-gray-500">{{ __('Max. 500 characters') }}</span>
            </div>
            <div class="mt-1">
                <textarea id="message" name="message" rows="4" wire:model.defer="message" required
                    class="block w-full px-4 py-2 text-gray-900 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    aria-describedby="message-max">
                </textarea>
                @error('message')
                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="sm:col-span-2 sm:flex sm:justify-end">
            <button type="submit"
                class="inline-flex items-center justify-center w-full px-6 py-2 mt-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:w-auto">{{ __('Submit') }}</button>
        </div>
    </form>
</div>
