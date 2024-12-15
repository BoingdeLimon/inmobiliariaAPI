<div class="grid grid-cols-1 gap-6 p-2 w-full h-screen dark:bg-gray-900">
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
            <!-- Mensaje si no se encuentran resultados -->
            <div class="col-span-1 text-center p-6 text-xl text-gray-700 dark:text-gray-300">
                No se encontraron resultados
            </div>
            
            <!-- Skeleton Loader si no hay datos disponibles -->
            @foreach (range(1, 2) as $index) <!-- Mostrar 5 skeletons por ejemplo -->
            <li class="p-4 w-full overflow-hidden rounded-lg">
                <a class="flex flex-col h-48 md:flex-row bg-white dark:bg-gray-600 shadow-md rounded-lg overflow-hidden max-w-5xl mx-auto animate-pulse">
                    <!-- Bloque de imagen -->
                    <div class="w-full md:w-1/3 bg-gray-300 dark:bg-gray-600 h-52 md:h-auto"></div>

                    <!-- Contenedor de texto -->
                    <div class="flex-1 p-6 space-y-4">
                        <!-- Título -->
                        <div class="h-3 bg-gray-300 dark:bg-gray-600 rounded w-1/2"></div>

                        <!-- Subtítulo -->
                        <div class="h-3 bg-gray-300 dark:bg-gray-600 rounded w-1/3"></div>

                        <!-- Líneas de texto -->
                        <div class="space-y-3">
                            <div class="h-2 bg-gray-300 dark:bg-gray-600 rounded w-full"></div>
                            <div class="h-2 bg-gray-300 dark:bg-gray-600 rounded w-5/6"></div>
                            <div class="h-2 bg-gray-300 dark:bg-gray-600 rounded w-4/6"></div>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        @endforelse
    </ul>
</div>
