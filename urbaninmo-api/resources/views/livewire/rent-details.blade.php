<div class="dark:text-white">
    <button wire:click="openModal"
        class="w-full px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none transition duration-300 ease-in-out transform hover:scale-95">
        {{ $rentalID ? 'Editar Renta' : 'Nueva Renta' }} {{ $rentalID }}
    </button>

    @if ($isModalOpen)
        <div wire:click.self="closeModal"
            class="fixed inset-0 flex items-center justify-center h-screen bg-gray-900 bg-opacity-50 z-50">
            <button wire:click="closeModal" class="fixed top-4 right-4 text-gray-300 hover:text-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div
                class="bg-white dark:bg-gray-800 p-6 md:p-8 rounded-2xl shadow-2xl w-[90%] md:w-2/3 lg:w-1/2 max-h-[80%] overflow-y-auto relative">
                <div class="mt-4">
                    <h2 class="text-2xl text-center font-semibold text-gray-800 dark:text-gray-200">Nueva Renta</h2>
                    <form wire:submit.prevent="submit" class="space-y-4">
                        <div>
                            <label for="user_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">User</label>

                            <input type="text" id="user" wire:model.debounce.500ms="userSearch"
                                wire:input="searchUserByParameters" placeholder="Busca un usuario..."
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md
                                @error('searchUserFinal.id')  @enderror">
                                @error('searchUserFinal.id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                            @if ($userSearch && $searchUserFinal == null)
                                <ul
                                    class="absolute z-10 w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg mt-2">
                                    @forelse($users as $user)
                                        <li wire:click="selectUser({{ $user->id }})"
                                            class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                            {{ $user->name }}
                                        </li>
                                    @empty
                                        <li class="px-4 py-2">No hay resultados</li>
                                    @endforelse
                                </ul>
                            @endif

                            <input type="hidden" wire:model="selectedUser">
                            
                        </div>

                        <div>
                            <label for="rent_start"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rent Start</label>
                            <input type="date" id="rent_start" wire:model="rentStart"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md
                                @error('rentStart') @enderror">
                            @error('rentStart') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="rent_end"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rent End</label>
                            <input type="date" id="rent_end" wire:model="rentEnd"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md
                                @error('rentEnd') border-red-500 @enderror">
                            @error('rentEnd') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="reason_end"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Reason End</label>
                            <textarea id="reason_end" wire:model="reasonEnd"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md resize-none shadow-sm"
                                rows="4" placeholder="Enter the reason for ending the rent..."></textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none transition duration-300 ease-in-out transform hover:scale-95">
                               {{$rentalID ? 'Editar Renta' : 'Nueva Renta'}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
