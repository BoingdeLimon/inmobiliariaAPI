<div x-data="{ sidebarOpen: true }" class="dark:bg-slate-700">
    <!-- Navbar -->
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <!-- Sidebar Toggle Button (Visible only on small screens) -->
                    <button
                        type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        @click="sidebarOpen = !sidebarOpen">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                  d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"/>
                        </svg>
                    </button>
                    <a href="{{ url('/') }}" class="flex ms-2 md:me-24">
                        <div class="text-center justify-center">
                            <h1 class="p-2 text-xl">
                                <span class="p-[2.5px] dark:text-white">Urban</span>
                                <span class="bg-[#3563E9] text-white p-1 border rounded-lg">Inmo</span>
                            </h1>
                        </div>
                        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">
                            Dashboard
                        </span>
                        
                    </a>
                </div>
                <livewire:button-dark-mode />
            </div>
            
        </div>
    </nav>

    <!-- Sidebar -->
    <aside
        id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700 transition-transform"
        :class="{
        '-translate-x-full': !sidebarOpen,
        'translate-x-0': sidebarOpen,
        'md:translate-x-0': true
    }"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto">
            <ul class="space-y-2 font-medium">
                <li>
                    <button wire:click="botonUsuarios" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Usuarios</span>
                    </button>
                </li>
                <li>
                    <button wire:click="botonRentals" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h6Zm0 12H4v4h6v-4ZM6 4a2 2 0 0 1 2 2H4a2 2 0 0 1 2-2Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Real Estates</span>
                    </button>
                </li>
                <li>
                    <button wire:click="logout" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Cerrar Sesión</span>
                    </button>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Content -->
    <div 
        class="content mt-24 px-4 transition-all duration-300 md:ml-64 dark:bg-slate-800"
        :class="{
            'ml-64': sidebarOpen, 
            'ml-0': !sidebarOpen
        } md:ml-64">
        
        @if($estadoUsuarios)
            @livewire('user-list')
        @elseif($estadoRentals)
            @livewire('rental-list')
        @endif
    </div>
</div>
