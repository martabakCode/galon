<div>
    <div x-data="{ tags: @entangle('tags'), newTag: '', inputName: 'mytags' }">
        <template x-for="tag in tags">
            <input type="hidden" x-bind:name="inputName + '[]'" x-bind:value="tag">
        </template>
        <div class="w-full mt-1">
            <div
                class="flex flex-wrap bg-white w-full border border-gray-300 rounded-md p-1 text-sm space-x-1 rtl:space-x-reverse space-y-1 rtl:space-y-reverse leading-none">
                <template x-for="tag in tags">
                    <span
                        class="flex bg-[#bcdefa] text-gray-700 items-center select-none rounded-md px-1.5 leading-normal">
                        <span x-text="tag" class="py-1"></span>
                        <button type="button" class=" outline-none text-[#2779bd] leading-none"
                            x-on:click="tags = tags.filter(i => i !== tag)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ltr:ml-1 rtl:mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </span>
                </template>

                <input class="flex outline-none py-1 mx-2" placeholder="{{ __('Add tag') }}..."
                    @keydown.enter.prevent="if (newTag.trim() !== '' && !tags.find(e => {
                        return e.toLowerCase() === newTag.trim().toLowerCase()
                      })) tags.push(newTag.trim()); newTag = ''"
                    x-model="newTag" class="text-sm">
            </div>
        </div>
    </div>
</div>
