<div class="grid grid-cols-1 gap-6 p-2 w-full min-h-screen dark:bg-gray-900">
    @livewire('filters')

    <ul class="space-y-4">
        @forelse ($rentals as $rental)
        <li class="p-4 w-full rounded-lg">
            <a href="{{ route('rental.show', $rental['id']) }}"
                class="flex flex-col md:flex-row bg-white dark:bg-gray-600 shadow-md rounded-lg overflow-hidden max-w-5xl mx-auto">
                <!-- Imagen -->
                <div class="relative h-48 w-full">
                    <img src="{{ asset('storage/photos/' . $rental['photos'][0]['photo']) }}"
                        alt="Foto de la propiedad" class="object-cover h-full w-full" />
                </div>


                <!-- Detalles -->
                <div class="p-5 flex flex-col justify-between w-full">
                    <div class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                        {{ $rental['title'] }}
                    </div>
                    <div class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                        ${{ number_format($rental['price'], 2) }}
                    </div>
                    <div class="text-gray-700 dark:text-gray-300 text-sm">
                        @if (!empty($rental['address']))
                            {{ $rental['address']['state'] }}, {{ $rental['address']['address'] }}
                        @else
                            Dirección no disponible
                        @endif
                    </div>
                    <div class="text-blue-500 dark:text-blue-400 text-sm">
                        {{ $rental['size'] }} m²
                    </div>
                    <div class="flex gap-5 text-gray-600 dark:text-gray-400 text-sm">
                        <span>{{ $rental['rooms'] }} Habitaciones</span>
                        <span>{{ $rental['bathrooms'] }} Baños</span>
                    </div>
                </div>

                <!-- Características y opciones -->
                <div class="w-full ">
                    <div class="flex flex-row gap-2 p-5 justify-end">
                        @if ($rental['has_garage'] ?? false)
                            <span class="bg-[#3563E9] text-white text-xs px-2 py-1 rounded-lg">Garage</span>
                        @endif
                        @if ($rental['has_garden'] ?? false)
                            <span class="bg-[#3563E9] text-white text-xs px-2 py-1 rounded-lg">Jardín</span>
                        @endif
                        @if ($rental['has_patio'] ?? false)
                            <span class="bg-[#3563E9] text-white text-xs px-2 py-1 rounded-lg">Patio</span>
                        @endif
                    </div>
                </div>
            </a>
        </li>
        @empty
            <div class="col-span-1 text-center p-6 text-xl text-gray-700 dark:text-gray-300">
                No se encontraron resultados
            </div>
        @endforelse
    </ul>

    <!-- Paginación -->
    @if ($totalPages > 1)
    <nav aria-label="Page navigation" class="flex justify-center mb-4 my-auto">
        <ul class="inline-flex gap-2 text-sm">
            <li>
                <button wire:click="goToPage({{ $currentPage - 1 }})" 
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-800 bg-white rounded-s-lg hover:bg-gray-100 hover:text-gray-900 dark:text-gray-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-gray-200 
                        {{ $currentPage == 1 ? 'cursor-not-allowed' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                    Previous
                </button>
            </li>
            @for ($page = 1; $page <= $totalPages; $page++)
                <li>
                    <button wire:click="goToPage({{ $page }})"
                            class="flex items-center justify-center px-3 h-8 leading-tight {{ $currentPage === $page ? ' bg-gray-50 border border-gray-300 rounded-md shadow-sm dark:text-white dark:bg-gray-600 dark:border-gray-500' : 'text-gray-800 bg-white hover:bg-gray-100 hover:text-gray-700 dark:text-gray-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-gray-200 rounded-md' }}">
                        {{ $page }}
                    </button>
                </li>
            @endfor
            <li>
                <button wire:click="goToPage({{ $currentPage + 1 }})"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-800 bg-white rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:text-gray-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-gray-200 
                        {{ $currentPage == $totalPages ? 'cursor-not-allowed' : '' }}">
                    Next
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </li>
        </ul>
    </nav>
    


    @endif
</div>
