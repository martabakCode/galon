<div>
    @if (session()->has('success'))
        <div id="alert" class="relative px-6 py-4 mb-4 text-white bg-green-500 border-0 rounded">
            <span class="inline-block mr-8 align-middle">
                {{ session('success') }}
            </span>
            <button
                class="absolute top-0 right-0 mt-4 mr-6 text-2xl font-semibold leading-none bg-transparent outline-none focus:outline-none"
                onclick="document.getElementById('alert').remove();">
                <span>×</span>
            </button>
        </div>
    @endif
</div>
