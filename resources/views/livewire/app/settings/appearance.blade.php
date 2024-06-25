<div class="screen min-h-screen bg-gray-100 py-10" x-data="{ openModel: false }">
    <x-session-msg />
    <div class="w-full sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">{{ __('Website Layout') }}</h1>
        </div>
    </div>
    <form class="mt-8 flex flex-col" wire:submit.prevent="saveLayout">
        <div class="-mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <fieldset class="mt-4">
                    <legend class="sr-only">display layout options</legend>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <input id="basic" wire:model.defer="layout" name="layout" type="radio" value="basic"
                                class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="basic"
                                class="block text-sm font-medium text-gray-700 ltr:ml-3 rtl:mr-3">{{ __('Basic') }}</label>
                        </div>
                        <div class="flex items-center">
                            <input id="modern" wire:model.defer="layout" name="layout" type="radio" value="modern"
                                class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="modern"
                                class="block text-sm font-medium text-gray-700 ltr:ml-3 rtl:mr-3">{{ __('Modern') }}</label>
                        </div>
                        <div class="flex items-center">
                            <input id="lite" wire:model.defer="layout" name="layout" type="radio" value="lite"
                                class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="lite"
                                class="block text-sm font-medium text-gray-700 ltr:ml-3 rtl:mr-3">{{ __('Lite') }}</label>
                        </div>
                    </div>
                </fieldset>
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
