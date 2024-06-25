<div class="screen py-10  bg-gray-100 min-h-screen" x-data="{ tab: 1 }">
    <h2 class="sr-only">General Settings</h2>
    <div class="flex justify-between pb-2 border-b">
        <h3 class="text-lg font-medium text-gray-900">{{ __('General Settings') }}</h3>
    </div>
    <div class="sm:hidden">
        <label for="tabs" class="sr-only">Select a tab</label>
        <select id="tabs" name="tabs" x-model.number="tab"
            class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
            <option selected :value="1">{{ __('Website') }}</option>
            <option :value="2">{{ __('Home Page') }}</option>
            <option :value="3">{{ __('Footer') }}</option>
            <option :value="4">{{ __('Social Links') }}</option>
            <option :value="5">{{ __('Branches') }}</option>
        </select>
    </div>
    <div class="hidden sm:block">
        <nav class="relative z-0 rounded-lg shadow flex divide-x divide-gray-200" aria-label="Tabs">
            <!-- Current: "text-gray-900", Default: "text-gray-500 hover:text-gray-700" -->
            <button x-on:click.prevent="tab=1"
                class="text-gray-500 rounded-l-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                aria-current="page">
                <span>{{ __('Website') }}</span>
                <span aria-hidden="true" :class="tab === 1 ? 'bg-indigo-500' : 'bg-transparent'"
                    class=" absolute inset-x-0 bottom-0 h-0.5"></span>
            </button>

            <button x-on:click.prevent="tab=2"
                class="text-gray-500 hover:text-gray-700 group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10">
                <span>{{ __('Home Page') }}</span>
                <span aria-hidden="true" :class="tab === 2 ? 'bg-indigo-500' : 'bg-transparent'"
                    class=" absolute inset-x-0 bottom-0 h-0.5"></span>
            </button>

            <button x-on:click.prevent="tab=3"
                class="text-gray-500 hover:text-gray-700 group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10">
                <span>{{ __('Footer') }}</span>
                <span aria-hidden="true" :class="tab === 3 ? 'bg-indigo-500' : 'bg-transparent'"
                    class=" absolute inset-x-0 bottom-0 h-0.5"></span>
            </button>

            <button x-on:click.prevent="tab=4"
                class="text-gray-500 hover:text-gray-700 group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10">
                <span>{{ __('Social Links') }}</span>
                <span aria-hidden="true" :class="tab === 4 ? 'bg-indigo-500' : 'bg-transparent'"
                    class=" absolute inset-x-0 bottom-0 h-0.5"></span>
            </button>
            <button x-on:click.prevent="tab=5"
                class="text-gray-500 hover:text-gray-700 group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10">
                <span>{{ __('Branches') }}</span>
                <span aria-hidden="true" :class="tab === 5 ? 'bg-indigo-500' : 'bg-transparent'"
                    class=" absolute inset-x-0 bottom-0 h-0.5"></span>
            </button>
        </nav>
    </div>
    <!-- Tabs content -->
    <div class="py-5">
        <div x-show="tab===1" class="">
            <x-settings.general />
        </div>
        <div x-show="tab===2" class="">
            <x-settings.home />
        </div>
        <div x-show="tab===3" class="">
            <x-settings.footer />
        </div>
        <div x-show="tab===4" class="">
            <x-settings.social />
        </div>
        <div x-show="tab===5" class="">
            <x-settings.branches />
        </div>
    </div>
</div>
