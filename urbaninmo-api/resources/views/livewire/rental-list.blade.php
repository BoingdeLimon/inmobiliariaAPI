<div>
    <div class="md:ml-auto sm:ml-auto  px-4 py-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($rentals as $rental)
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="max-w-sm max-h-sm">
                    <img src="{{ $rental->photos->first()
                        ? asset('storage/photos/' . $rental->photos->first()->photo)
                        : asset('img/defaultRental.jpg') }}"
                        alt="{{ $rental->title }} Photo" class="rounded-t-lg w-full h-56 object-cover">
                </div>
                <div class="p-5 w-full">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $rental->title }}
                    </h5>
                    <h3 class="mb-2 text-lg text-gray-900 dark:text-white">{{ $rental->type }}</h3>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $rental->description }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Size: {{ $rental->size }} m²</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Rooms: {{ $rental->rooms }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Bathrooms: {{ $rental->bathrooms }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Price: ${{ number_format($rental->price, 2) }}
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Location: {{ $rental->address->address }},
                        {{ $rental->address->city }}, {{ $rental->address->state }}</p>
                    <div class=" space-x-2 flex mt-4 w-full flex-row justify-evenly">
                        <div class="w-1/2">
                            @livewire('new-rentals-form', ['user_id' => null, 'realEstateId' => $rental->id], key($rental->id))
                        </div>
                        <div class="w-1/2">
                            @livewire('confirmar-borrar-modal-real-estate', ['rental' => $rental])
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
</div>
