<div>
    <!-- Product options -->
    <div class="sm:flex sm:justify-between">
        <!-- Size selector -->
        <fieldset>
            <legend class="block text-sm font-medium text-gray-700">Size</legend>
            <div class="grid grid-cols-1 gap-4 mt-1 sm:grid-cols-2">
                <!-- Active: "ring-2 ring-indigo-500" -->
                <div class="relative block p-2 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                    <input type="radio" name="size-choice" value="18L" class="sr-only"
                        aria-labelledby="size-choice-0-label" aria-describedby="size-choice-0-description">
                    <p id="size-choice-0-label" class="text-base font-medium text-gray-900">18L
                    </p>
                    <div class="absolute border-2 rounded-lg pointer-events-none -inset-px" aria-hidden="true">
                    </div>
                </div>
                <!-- Active: "ring-2 ring-indigo-500" -->
                <div class="relative block p-2 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                    <input type="radio" name="size-choice" value="20L" class="sr-only"
                        aria-labelledby="size-choice-1-label" aria-describedby="size-choice-1-description">
                    <p id="size-choice-1-label" class="text-base font-medium text-gray-900">20L
                    </p>
                    <div class="absolute border-2 rounded-lg pointer-events-none -inset-px" aria-hidden="true">
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="mt-2">
        <h3 class="text-sm text-gray-600">Color</h3>
        <fieldset class="mt-2">
            <legend class="sr-only">Choose a color</legend>
            <span class="flex items-center space-x-3 rtl:space-x-reverse">
                <label
                    class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-700">
                    <input type="radio" name="color-choice" value="Washed Black" class="sr-only"
                        aria-labelledby="color-choice-0-label" />
                    <span id="color-choice-0-label" class="sr-only">
                        Washed Black
                    </span>
                    <span aria-hidden="true"
                        class="w-8 h-8 bg-gray-700 border border-black rounded-full border-opacity-10"></span>
                </label>
                <label
                    class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-400">
                    <input type="radio" name="color-choice" value="White" class="sr-only"
                        aria-labelledby="color-choice-1-label" />
                    <span id="color-choice-1-label" class="sr-only">
                        White
                    </span>
                    <span aria-hidden="true"
                        class="w-8 h-8 bg-white border border-black rounded-full border-opacity-10"></span>
                </label>
                <label
                    class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-500">
                    <input type="radio" name="color-choice" value="Washed Gray" class="sr-only"
                        aria-labelledby="color-choice-2-label" />
                    <span id="color-choice-2-label" class="sr-only">
                        Washed Gray
                    </span>
                    <span aria-hidden="true"
                        class="w-8 h-8 bg-gray-500 border border-black rounded-full border-opacity-10"></span>
                </label>
            </span>
        </fieldset>
    </div>
</div>
