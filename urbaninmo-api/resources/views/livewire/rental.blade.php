<div class="grid grid-cols-1 gap-8 p-6 dark:bg-gray-900 dark:text-white">

    <div class="md:col-span-1 flex items-center justify-center">
        @livewire('carousel-rentals', ['photos' => $photos])
    </div>

    <div
        class="w-11/12 shadow-md rounded-lg justify-items-center justify-self-center mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">

        <div
            class="p-6 w-full bg-white dark:bg-gray-800 space-y-6 shadow-md dark:shadow-lg rounded-lg transition-all duration-300 hover:shadow-2xl dark:hover:shadow-gray-700">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white">
                {{ 'Casa en Renta en ' . $city . ', ' . $state }}
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-300">
                {{ $description ?? 'Bonita Casa en Fraccionamiento Privado.' }}
            </p>
            <p class="text-3xl font-semibold text-[#3563E9]">
                {{ $price . ' / mes' }}
            </p>
            <p class="text-md text-gray-500 dark:text-gray-400">
                {{ 'Ubicación: ' . $address . ', ' . $city . ', ' . $state . ', ' . $zipcode }}
            </p>
            <p class="text-md text-gray-500 dark:text-gray-400">{{ 'Tamaño: ' . $size . ' m²' }}</p>
            <p class="text-md text-gray-500 dark:text-gray-400">{{ 'Habitaciones: ' . $rooms }}</p>
            <p class="text-md text-gray-500 dark:text-gray-400">{{ 'Baños: ' . $bathrooms }}</p>
            @if ($has_garage)
                <p class="text-md text-gray-500 dark:text-gray-400">Incluye garaje</p>
            @endif
            @if ($has_garden)
                <p class="text-md text-gray-500 dark:text-gray-400">Incluye jardín</p>
            @endif
            @if ($has_patio)
                <p class="text-md text-gray-500 dark:text-gray-400">Incluye patio</p>
            @endif
        </div>


        @livewire('message-form', ['user_id' => $user_id, 'rental_id' => $rentalId])
    </div>
    <div class="w-full h-64 flex items-center justify-center">
        @livewire('map-component', ['x' => (float) $x, 'y' => (float) $y])
    </div>
</div>
