<div class="relative ">
    <img src="{{ Auth::user()->photo }}" alt="{{ Auth::user()->name }}"
        class="h-10 w-10 cursor-pointer rounded-full object-cover object-center" wire:click="abrirMenu">

    @if ($estadoMenu)
        <div wire:click.self="cerrarMenu"
            class="absolute right-0 mt-2 w-48 bg-gray-100 dark:bg-gray-900 md:overflow-y-hidden  z-50">
            <ul class="py-1 text-gray-700">
                <li>
                    <a href="{{ route('profile') }}"
                        class="flex px-4 py-2 text-sm  text-gray-800  space-x-2 dark:text-gray-100 hover:font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-5 h-5 text-slate-400">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-5.5-2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 12a5.99 5.99 0 0 0-4.793 2.39A6.483 6.483 0 0 0 10 16.5a6.483 6.483 0 0 0 4.793-2.11A5.99 5.99 0 0 0 10 12Z"
                                clip-rule="evenodd" />
                        </svg>
                        <p>My Profile</p>
                    </a>
                </li>
                @if (Auth::user()->role == 'admin')
                    <li class="">
                        <a href="{{ route('admin-dashboard') }}"
                            class="flex px-4 py-2 space-x-2 text-sm text-gray-800 dark:text-gray-100 hover:font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-slate-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                            </svg>

                            <p>Admin Dashboard</p>
                        </a>
                    </li>
                @endif
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex w-full text-left px-4 py-2  space-x-2 text-sm  text-gray-800 dark:text-gray-100 hover:font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5 text-slate-400">
                                <path fill-rule="evenodd"
                                    d="M3 4.25A2.25 2.25 0 0 1 5.25 2h5.5A2.25 2.25 0 0 1 13 4.25v2a.75.75 0 0 1-1.5 0v-2a.75.75 0 0 0-.75-.75h-5.5a.75.75 0 0 0-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 0 0 .75-.75v-2a.75.75 0 0 1 1.5 0v2A2.25 2.25 0 0 1 10.75 18h-5.5A2.25 2.25 0 0 1 3 15.75V4.25Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M19 10a.75.75 0 0 0-.75-.75H8.704l1.048-.943a.75.75 0 1 0-1.004-1.114l-2.5 2.25a.75.75 0 0 0 0 1.114l2.5 2.25a.75.75 0 1 0 1.004-1.114l-1.048-.943h9.546A.75.75 0 0 0 19 10Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p>
                                Sign Out
                            </p>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
</div>
@endif
</div>
