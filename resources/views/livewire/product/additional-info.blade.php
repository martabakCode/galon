<div aria-labelledby="details-heading" class="mt-5" x-data="{ specificationsMenu: false, featuresMenu: false }">
    <h2 id="details-heading" class="sr-only">Additional details</h2>

    <div class="border-t divide-y divide-gray-200">
        <div>
            <h3>
                <!-- Expand/collapse question button -->
                <button x-on:click="specificationsMenu = ! specificationsMenu" type="button"
                    class="relative flex items-center justify-between w-full py-6 text-left group"
                    aria-controls="disclosure-1" aria-expanded="false">
                    <!-- Open: "text-indigo-600", Closed: "text-gray-900" -->
                    <span class="text-sm font-medium text-gray-900">
                        {{ __('Specifications') }}
                    </span>
                    <span class="flex items-center ml-6">
                        <svg x-show="!specificationsMenu" class="block w-6 h-6 text-gray-400 group-hover:text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <svg x-show="specificationsMenu" style="display: none"
                            class="w-6 h-6 text-indigo-400 group-hover:text-indigo-500"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                        </svg>
                    </span>
                </button>
            </h3>
            <div x-show="specificationsMenu" style="display: none" class="pb-6 prose-sm prose" id="disclosure-1">
                <ul role="list">
                    <li>Multiple strap configurations</li>

                    <li>Spacious interior with top zip</li>

                    <li>Leather handle and tabs</li>

                    <li>Interior dividers</li>

                    <li>Stainless strap loops</li>

                    <li>Double stitched construction</li>

                    <li>Water-resistant</li>
                </ul>
            </div>
        </div>
        <div>
            <h3>
                <!-- Expand/collapse question button -->
                <button x-on:click="featuresMenu = ! featuresMenu" type="button"
                    class="relative flex items-center justify-between w-full py-6 text-left group"
                    aria-controls="disclosure-1" aria-expanded="false">
                    <!-- Open: "text-indigo-600", Closed: "text-gray-900" -->
                    <span class="text-sm font-medium text-gray-900">
                        {{ __('Features') }}
                    </span>
                    <span class="flex items-center ml-6">
                        <svg x-show="!featuresMenu" class="block w-6 h-6 text-gray-400 group-hover:text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <svg x-show="featuresMenu" style="display: none"
                            class="w-6 h-6 text-indigo-400 group-hover:text-indigo-500"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                        </svg>
                    </span>
                </button>
            </h3>
            <div x-show="featuresMenu">
                <x-product.features />
            </div>
        </div>
        <!-- More sections... -->
    </div>
</div>
