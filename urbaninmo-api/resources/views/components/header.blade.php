<header
    class="flex flex-col w-full md:flex-row items-center justify-between 
         shadow-md p-4 bg-white dark:bg-gray-900 dark:shadow-gray-800 dark:shadow-xl transition-all">

    <div class="flex items-center justify-between 
         w-full md:w-auto md:hidden">

        <button onclick="toggleNav()"
            class="w-5 h-5 text-black dark:text-gray-300
           hover:text-gray-400 dark:hover:text-gray-400 rounded-xl
            md:rounded-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
            </svg>
        </button>

        <logo-component></logo-component>
        <livewire:button-dark-mode />
    </div>

    <div class="hidden md:block">
        <logo-component></logo-component>
    </div>

    <div id="nav"
        class="hidden 
        md:flex md:w-full md:items-center
          md:justify-end space-y-2 md:space-y-0">

        <div class="relative flex md:w-8/12 w-full ">

            <input type="text" placeholder="Buscar..."
                class=" text-lg w-full  bg-white dark:bg-gray-900 dark:border-gray-700 text-black dark:text-gray-300 rounded-lg" />
            <span class="absolute inset-y-0 right-0 flex items-center pr-2  text-black hover:text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </span>
        </div>

        <div class="w-full md:w-1/4 md:space-x-5 flex flex-row md:flex-row items-center justify-center">
            @auth
                @livewire('new-rentals-form', ['user_id' => Auth::user()->id, 'token' => Auth::user()->token])
                @livewire('dropdown-menu', ['user_id' => Auth::user()->id, 'token' => Auth::user()->token])
            @else
                <a href="{{ route('login') }}">
                    <button type="button"
                        class="w-full md:w-auto hover:text-gray-900 hover:bg-white text-white border
                border-gray-800 bg-gray-900 focus:ring-4 focus:outline-none
                focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2
                transition duration-300 ease-in-out transform hover:scale-105">
                        Login
                    </button>
                </a>
                <a href="{{ route('register') }}">
                    <button type="button"
                        class="w-full md:w-auto text-white bg-blue-700 hover:bg-white hover:text-blue-700 border hover:border-blue-700
                 focus:ring-4 focus:outline-none
                focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2
                transition duration-300 ease-in-out transform hover:scale-105">
                        Registrarse
                    </button>
                </a>
            @endauth
        </div>
    </div>

    <div class="hidden md:block">
        <livewire:button-dark-mode />
    </div>
</header>

<script>
    function toggleNav() {
        const nav = document.getElementById('nav');
        nav.classList.toggle('hidden');
    }

    function toggleProfileMenu() {
        const subMenuWrap = document.getElementById('sub-menu-wrap');
        if (subMenuWrap.style.maxHeight) {
            subMenuWrap.style.maxHeight = null;
        } else {
            subMenuWrap.style.maxHeight = subMenuWrap.scrollHeight + "px";
        }
    }
</script>
