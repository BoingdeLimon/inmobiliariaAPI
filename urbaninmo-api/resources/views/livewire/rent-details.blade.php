<div class="dark:bg-gray-900 dark:text-white">
    <button wire:click="openModal"
        class="w-full px-4 py-2 bg-green-500 text-white rounded-lg
         hover:bg-green-600 focus:outline-none transition duration-300 ease-in-out transform hover:scale-95">
        Crear Nueva Renta
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
                class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-2xl w-1/2 h-auto overflow-y-auto max-h-[80%] relative">
                <div class="mt-4">
                    <form wire:submit.prevent="submit">
                        <div class="mb-4">
                            <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">User</label>
                            <select id="user_id" wire:model="user_id"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="">Selecciona un Usuario</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                       

                        <div class="mb-4">
                            <label for="rent_start" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rent Start</label>
                            <input type="date" id="rent_start" wire:model="rent_start"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="rent_end" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rent End</label>
                            <input type="date" id="rent_end" wire:model="rent_end"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="reason_end" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Reason End</label>
                            <textarea id="reason_end" wire:model="reason_end"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md resize-none shadow-sm"
                                rows="4" placeholder="Enter the reason for ending the rent..."></textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none transition duration-300 ease-in-out transform hover:scale-95">
                                Save Rent
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
