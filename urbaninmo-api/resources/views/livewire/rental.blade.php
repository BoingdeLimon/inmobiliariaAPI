<div class="grid grid-cols-1 gap-8 p-6 dark:bg-gray-900 dark:text-white">

    <div class="md:col-span-1 flex items-center justify-center">
        @livewire('carousel-rentals', ['photos' => $photos])
    </div>

    <div
        class="w-full md:w-11/12 shadow-md rounded-lg justify-items-center justify-self-center mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">

        <div
            class="p-6 w-full bg-white dark:bg-gray-800 space-y-6 shadow-md dark:shadow-lg rounded-lg transition-all duration-300 hover:shadow-2xl dark:hover:shadow-gray-700">
            <div class="h-5/6 md:mb-0 mb-12 space-y-4">
                <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white">
                    {{ 'Casa en Renta en ' . $city . ', ' . $state }}
                </h2>
                <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ $description ?? 'Bonita Casa en Fraccionamiento Privado.' }}
                </p>
                <p class="text-4xl font-bold text-[#3563E9]">
                    $ {{ number_format($price, 0, ',', ',') . ' / mes' }}
                </p>
                <p class="text-md text-gray-600 dark:text-gray-400">
                    {{ 'Ubicación: ' . $address . ', ' . $city . ', ' . $state . ', ' . $zipcode }}
                </p>
                <p class="text-md text-gray-600 dark:text-gray-400">{{ 'Tamaño: ' . $size . ' m²' }}</p>
                <p class="text-md text-gray-600 dark:text-gray-400">{{ 'Habitaciones: ' . $rooms }}</p>
                <p class="text-md text-gray-600 dark:text-gray-400">{{ 'Baños: ' . $bathrooms }}</p>
                @if ($has_garage)
                    <p class="text-md text-gray-600 dark:text-gray-400">Incluye garaje</p>
                @endif
                @if ($has_garden)
                    <p class="text-md text-gray-600 dark:text-gray-400">Incluye jardín</p>
                @endif
                @if ($has_patio)
                    <p class="text-md text-gray-600 dark:text-gray-400">Incluye patio</p>
                @endif
            </div>
            <div class="h-1/6">
                <a href="{{ route('statistics', ['id'=>$rentalId]) }}">
                    <button
                        class="w-full relative group inline-flex items-center px-8 py-2.5 overflow-hidden text-lg font-medium text-blue-600 border-2 border-blue-600 rounded-lg hover:text-white group ">

                        <span
                            class="absolute left-0 block w-full h-0 transition-all bg-blue-600 opacity-100 group-hover:h-full top-1/2 group-hover:top-0 duration-400 ease"></span>
                        <span
                            class="absolute right-0 flex items-center justify-start w-10 h-10 duration-300 transform translate-x-full group-hover:translate-x-0 ease">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </span>
                        <span
                            class="relative text-base font-semibold transition-all duration-300 group-hover:-translate-x-3">
                            Historial y reseñas
                        </span>

                    </button>
                </a>
            </div>

        </div>

        @livewire('message-form', ['user_id' => $user_id, 'rental_id' => $rentalId])
    </div>
    <div class="w-full h-64 flex items-center justify-center">
        @livewire('map-component', ['x' => (float) $x, 'y' => (float) $y])
    </div>
</div>
