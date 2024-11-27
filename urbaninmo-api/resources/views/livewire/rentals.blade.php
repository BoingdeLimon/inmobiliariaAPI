<div class=" grid grid-cols-1  gap-6 p-2 w-full  h-screen  dark:bg-gray-900 ">
    @livewire('filters')
    <ul class="space-y-4 overflow-y-auto h-full">
        @foreach ($rentals as $rental)
            <li class="p-4 w-full rounded-lg ">

                <a href="{{ route('rental.show', $rental['id']) }}"
                    class="flex flex-col md:flex-row bg-white dark:bg-gray-600 shadow-md rounded-lg overflow-hidden max-w-5xl mx-auto">

                    <!-- Imagen -->
                    <div class="relative h-48 w-full">
                        <img src="{{ isset($rental['photos'][0]['photo']) ? asset('storage/photos/' . $rental['photos'][0]['photo']) : asset('images/default.jpg') }}"
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
        @endforeach
    </ul>
</div>
