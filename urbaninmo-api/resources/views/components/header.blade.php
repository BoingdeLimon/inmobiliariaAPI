<header class="flex flex-col w-full md:flex-row items-center justify-center shadow-md md:h-[8vh]  p-4">

    <div class="flex items-center justify-center w-full md:w-auto">
        <button onclick="toggleNav()"
            class="w-5 h-5 text-black hover:text-gray-400 hover rounded-xl md:rounded-none md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
            </svg>
        </button>
        <logo-component></logo-component>

    </div>

    <div id="nav"
        class="hidden md:flex md:w-1/3 md:items-center md:justify-center space-y-2 md:space-y-0 md:space-x-2">

        <div class="relative flex w-full md:w-72">
            <input type="text" placeholder="Buscar..." class="w-full pr-10 border border-gray-300 rounded-md p-2" />
            <span class="absolute inset-y-0 right-0 flex items-center pr-2  text-black hover:text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </span>
        </div>

        @livewire("new-rentals-form")
        <a href="{{ route('login') }}">
            <button type="button"
                class=" w-full md:w-auto hover:text-gray-900 hover:bg-white text-white border
             border-gray-800 bg-gray-900 focus:ring-4 focus:outline-none
            focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                Login
        </a>
        </button>
    </div>
</header>

<script>
    function toggleNav() {
        const nav = document.getElementById('nav');
        nav.classList.toggle('hidden');
    }
</script>
