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
                class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-2xl w-10/12 h-3/4 overflow-y-auto max-h-[80%] relative">
                <div class="mt-4">
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">ID</th>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Rent Start</th>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Rent End</th>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Foto Usuario</th>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Nombre usuario</th>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Nombre Propiedad
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rentals as $rental)
                                <tr>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">
                                        {{ $rental->id }}
                                    </td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">
                                        {{ $rental->rent_start->format('d/m/Y') }}
                                    </td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">
                                        {{ $rental->rent_end ? $rental->rent_end->format('d/m/Y') : 'En curso' }}
                                    </td>
                                    <td  class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">
                                        <img src="{{ asset('storage/photos/' . $rental->photoUser) }}" alt="Foto de perfil"
                                            class="h-8 w-8 rounded-full">
                                    </td>

                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">
                                        {{ $rental->nameUser }}
                                    </td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">
                                        {{ $rental->nameRealEstate }}
                                    </td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">
                                        @livewire('rent-details', ['rentalID' => $rental->id], key($rental->id))
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @livewire('rent-details')
                </div>
            </div>
        </div>
    @endif
</div>
