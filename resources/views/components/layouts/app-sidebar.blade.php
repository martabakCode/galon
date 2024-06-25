<div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-col flex-1 min-h-0 bg-cyan-700">
        <a href="/" class="flex items-center flex-shrink-0 h-16 px-4 bg-cyan-700">
            <img class="w-auto h-8" src="{{ asset('storage/' . config('global.logo_'.App::getLocale())) }}"
                alt="{{ config('global.name_' . App::getLocale(), 'Galon Mart') }}">
        </a>
        <div class="flex flex-col flex-1 overflow-y-auto">
            <x-layouts.app-nav />
        </div>
    </div>
</div>
