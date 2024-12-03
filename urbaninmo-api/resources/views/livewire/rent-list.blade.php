<div>
    <button wire:click="openModal"
        class="w-full px-4 py-2 bg-green-500 text-white rounded-lg 
        hover:bg-green-600 focus:outline-none transition duration-300 ease-in-out transform hover:scale-95">
        Historial Rentas
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
                class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-2xl w-10/12 max-h-[80%] overflow-y-auto relative">
                <div class="mt-4">
                    <!-- Contenedor scroll horizontal -->
                    <div class="overflow-x-auto">
                        <table
                            class="min-w-full bg-white dark:bg-gray-800 rounded-lg border-collapse border border-gray-200 dark:border-gray-700">
                            <thead class="bg-blue-500 text-white">
                                <tr>
                                    <th class="p-3 text-left text-sm font-semibold">ID</th>
                                    <th class="p-3 text-left text-sm font-semibold">Rent Start</th>
                                    <th class="p-3 text-left text-sm font-semibold">Rent End</th>
                                    <th class="p-3 text-left text-sm font-semibold">Foto Usuario</th>
                                    <th class="p-3 text-left text-sm font-semibold">Nombre Usuario</th>
                                    <th class="p-3 text-left text-sm font-semibold">Nombre Propiedad</th>
                                    <th class="p-3 text-left text-sm font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rentals as $rental)
                                    <tr class="even:bg-gray-100 dark:bg-gray-700">
                                        <td class="py-2 px-4 border-t border-gray-200 dark:border-gray-700 text-sm">
                                            {{ $rental->id }}
                                        </td>
                                        <td class="py-2 px-4 border-t border-gray-200 dark:border-gray-700 text-sm">
                                            {{ $rental->rent_start->format('d/m/Y') }}
                                        </td>
                                        <td class="py-2 px-4 border-t border-gray-200 dark:border-gray-700 text-sm">
                                            {{ $rental->rent_end ? $rental->rent_end->format('d/m/Y') : 'En curso' }}
                                        </td>
                                        <td class="py-2 px-4 border-t border-gray-200 dark:border-gray-700 text-sm">
                                            <img src="{{ asset('storage/photos/' . $rental->photoUser) }}" alt="Foto de perfil"
                                                class="h-10 w-10 rounded-full">
                                        </td>
                                        <td class="py-2 px-4 border-t border-gray-200 dark:border-gray-700 text-sm">
                                            {{ $rental->nameUser }}
                                        </td>
                                        <td class="py-2 px-4 border-t border-gray-200 dark:border-gray-700 text-sm">
                                            {{ $rental->nameRealEstate }}
                                        </td>
                                        <td class="py-2 px-4 border-t border-gray-200 dark:border-gray-700 text-sm">
                                            @livewire('rent-details', ['rentalID' => $rental->id], key($rental->id))
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        @livewire('rent-details')
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
