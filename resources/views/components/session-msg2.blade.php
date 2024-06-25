<div class="flex items-center w-full">

    <div x-cloak x-data="{ shown: false, timeout: null }" x-init="@this.on('saved', () => {
        clearTimeout(timeout);
        shown = true;
        timeout = setTimeout(() => { shown = false }, 2000);
    })" x-show.transition.opacity.out.duration.1500ms="shown">
        <div class="flex items-center w-full" x-transition:enter="transform ease-out duration-300"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">
            <div class="flex w-full max-w-sm overflow-hidden">
                <p class="text-sm font-medium text-gray-900">
                    {{-- {{ session()->get('success') }} --}}
                    {{ __('Successfully saved!') }}</p>
            </div>
        </div>
    </div>
</div>
