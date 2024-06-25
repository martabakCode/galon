<div class="h-8 max-h-8 -m-2 p-0 relative">
    <style>
        .svg-icon {
            width: 1em;
            height: 1em;
        }

        .svg-icon path,
        .svg-icon polygon,
        .svg-icon rect {
            fill: #333;
        }

        .svg-icon circle {
            stroke: #4691f6;
            stroke-width: 1;
        }
    </style>
    <select x-cloak id="select" class="hidden">
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
        <option value="3">Option 3</option>
        <option value="4">Option 4</option>
        <option value="5">Option 5</option>
        <option value="6">Option 6</option>
        <option value="7">Option 7</option>
        <option value="8">Option 8</option>
    </select>

    <div x-data="dropdown()" x-init="loadOptions()" class="flex flex-col">
        <input name="values" type="hidden" x-bind:value="selectedValues()">
        <div class="inline-block relative w-48">
            <div class="flex flex-col items-center">
                <div x-on:click="open" class="w-full p-0 h-0">
                    <div class="flex border border-gray-200 bg-white rounded ">
                        <div class="flex flex-auto flex-wrap ">
                            <template x-for="(option,index) in selected" :key="options[option].value">
                                <div
                                    class="flex justify-center items-center m-1 font-medium py-1 px-1 rounded bg-gray-100 border">
                                    <div class="text-xs font-normal leading-none max-w-full flex-initial x-model="
                                        options[option] x-text="options[option].text"></div>
                                    <div class="flex flex-auto flex-row-reverse">
                                        <div x-on:click.stop="remove(index,option)">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </template>
                            <div x-show="selected.length == 0" class="flex-1">
                                <input placeholder="Select a option"
                                    class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800"
                                    x-bind:value="selectedValues()">
                            </div>
                        </div>
                        <div
                            class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 svelte-1l8159u">

                            <button type="button" x-show="isOpen() === true" x-on:click="open"
                                class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>

                            </button>
                            <button type="button" x-show="isOpen() === false" x-on:click="close"
                                class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>

                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4">
                    <div x-show.transition.origin.top="isOpen()"
                        class="absolute shadow top-100 bg-white z-40 w-full left-0 rounded max-h-select"
                        x-on:click.away="close">
                        <div class="flex flex-col w-full overflow-y-auto h-64">
                            <template x-for="(option,index) in options" :key="option.value" class="overflow-auto">
                                <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-gray-100"
                                    x-on:click="select(index,$event)">
                                    <div
                                        class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                                        <div class="w-full items-center flex justify-between">
                                            <div class="mx-2 leading-6" x-model="option" x-text="option.text"></div>
                                            <div x-show="option.selected">
                                                <svg class="svg-icon" viewBox="0 0 20 20">
                                                    <path fill="none"
                                                        d="M7.197,16.963H7.195c-0.204,0-0.399-0.083-0.544-0.227l-6.039-6.082c-0.3-0.302-0.297-0.788,0.003-1.087
                              C0.919,9.266,1.404,9.269,1.702,9.57l5.495,5.536L18.221,4.083c0.301-0.301,0.787-0.301,1.087,0c0.301,0.3,0.301,0.787,0,1.087
                              L7.741,16.738C7.596,16.882,7.401,16.963,7.197,16.963z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script defer>
        function dropdown() {
            return {
                options: [],
                selected: [],
                show: false,
                open() {
                    this.show = true
                },
                close() {
                    this.show = false
                },
                isOpen() {
                    return this.show === true
                },
                select(index, event) {

                    if (!this.options[index].selected) {

                        this.options[index].selected = true;
                        this.options[index].element = event.target;
                        this.selected.push(index);

                    } else {
                        this.selected.splice(this.selected.lastIndexOf(index), 1);
                        this.options[index].selected = false
                    }
                },
                remove(index, option) {
                    this.options[option].selected = false;
                    this.selected.splice(index, 1);


                },
                loadOptions() {
                    const options = document.getElementById('select').options;
                    for (let i = 0; i < options.length; i++) {
                        this.options.push({
                            value: options[i].value,
                            text: options[i].innerText,
                            selected: options[i].getAttribute('selected') != null ? options[i].getAttribute(
                                'selected') : false
                        });
                    }


                },
                selectedValues() {
                    return this.selected.map((option) => {
                        return this.options[option].value;
                    })
                }
            }
        }
    </script>
</div>
