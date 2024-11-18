<div
    class="h-full bg-gray-100 dark:bg-gray-900 md:overflow-y-hidden text-gray-800 dark:text-gray-200 transition duration-300">
    <div class="max-w-7xl mx-auto p-4 w-full h-full md:flex lg:space-x-4">

        <div id="profile"
            class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 md:w-1/4 text-center md:block hidden">
            <div class="w-full flex items-center justify-center">
                <img src="{{ Auth::user()->photo }}" alt="{{ Auth::user()->name }}"
                    class="aspect-square w-24 rounded-full mr-2">
            </div>
            <h2 class="text-lg font-semibold">{{ Auth::user()->name }}</h2>
            <p class="text-gray-600 dark:text-gray-400">{{ Auth::user()->email }}</p>
            <p class="text-gray-600 dark:text-gray-400">{{ Auth::user()->phone ?? 'Teléfono inexistente' }}</p>

            <div class="flex-col flex space-y-4 w-full">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white mt-4 w-full py-2 rounded-lg">Sign Out</button>
                </form>

                <button type="submit" class="bg-purple-600 text-white  w-full py-2 rounded-lg"> Editar Perfil</button>
                @livewire('new-rentals-form', ['user_id' => Auth::user()->id])
            </div>

        </div>

        <div class="overflow-y-auto grid w-full space-y-4 h-full">


            <div id="properties" class="lg:w-full space-y-6 md:block hidden h-full">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-semibold">Mis Propiedades</h3>
                        <select wire:change="updatePropertyInfo($event.target.value)"
                            class="text-sm bg-gray-100 dark:bg-gray-700 p-2 rounded-lg">
                            @foreach ($realEstates as $property)
                                <option value="{{ $property->id }}"
                                    {{ $selectedProperty->id == $property->id ? 'selected' : '' }}>
                                    {{ $property->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @if ($selectedProperty)
                        <div id="propertyInfo" class="mt-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach ([
        'Nombre' => $selectedProperty->title,
        'Tamaño' => $selectedProperty->size . ' m²',
        'Precio de Renta' => $selectedProperty->price,
        'Cuartos' => $selectedProperty->rooms,
        'Baños' => $selectedProperty->bathrooms,
        'Tipo' => $selectedProperty->type,
        '¿Tiene Garage?' => $selectedProperty->has_garage ? 'Sí' : 'No',
        '¿Tiene Jardín?' => $selectedProperty->has_garden ? 'Sí' : 'No',
        '¿Tiene Patio?' => $selectedProperty->has_patio ? 'Sí' : 'No',
    ] as $label => $value)
                                    <div>
                                        <p class="text-sm font-semibold text-gray-600 dark:text-gray-400">
                                            {{ $label }}</p>
                                        <p>{{ $value }}</p>
                                    </div>
                                @endforeach

                                <div>
                                    <p class="text-sm font-semibold text-gray-600 dark:text-gray-400">Dirección</p>
                                    <p>{{ $selectedProperty->address->address }},
                                        {{ $selectedProperty->address->city }},
                                        {{ $selectedProperty->address->state }},
                                        {{ $selectedProperty->address->country }}</p>
                                </div>

                                <div>
                                    <p class="text-sm font-semibold text-gray-600 dark:text-gray-400">Código Postal</p>
                                    <p>{{ $selectedProperty->address->zipcode }}</p>
                                </div>

                                <div>
                                    <p class="text-sm font-semibold text-gray-600 dark:text-gray-400">Coordenadas</p>
                                    <p>{{ $selectedProperty->address->x }},
                                        {{ $selectedProperty->address->y }}</p>
                                </div>
                            </div>

                            <div class="mt-6">
                                <p class="text-sm font-semibold text-gray-600 dark:text-gray-400">Fotos</p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-2">
                                    @foreach ($selectedProperty->photos as $photo)
                                        <img src="{{ asset('imgs/' . $photo->photo) }}" alt="Foto de la propiedad "
                                            class="w-full h-48 bg-gray-300 rounded-lg object-cover">
                                    @endforeach
                                </div>
                            </div>

                            <div class="mt-10 space-y-2 flex flex-col w-full">
                                @livewire('new-rentals-form', ['user_id' => Auth::user()->id, 'realEstateId' => $selectedProperty->id])


                                <button
                                    class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none">
                                    Eliminar
                                </button>

                                <button
                                    class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none">
                                    Crear Nueva Renta
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>





            <div id="messages"
                class="lg:w-full space-y-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 md:block hidden">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-semibold">Mensajes</h3>
                </div>

                <div class="mt-6">
                    <div class="space-y-6">
                        @forelse ($messages as $message)
                            <div
                                class="p-6 bg-gray-50 dark:bg-gray-700 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700">
                                <div class="flex items-center justify-between">
                                    <p class="font-semibold text-lg text-gray-800 dark:text-gray-100">
                                        De: {{ $message->name }}
                                    </p>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">
                                        Enviado: {{ $message->created_at->format('d/m/Y H:i') }}
                                    </span>
                                </div>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <strong>Email:</strong> {{ $message->email }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <strong>Teléfono:</strong> {{ $message->phone }}
                                    </p>
                                </div>
                                <div class="mt-4">
                                    <p class="text-gray-700 dark:text-gray-200">
                                        {{ $message->message }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div
                                class="p-6 bg-gray-50 dark:bg-gray-800 rounded-lg shadow-lg text-center border border-gray-200 dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-400">No hay mensajes disponibles.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div
        class="lg:hidden fixed bottom-0 left-0 right-0 bg-white dark:bg-gray-900 shadow-md border-t flex justify-around py-2">

        <button id='profile_button' class="flex flex-col items-center text-gray-500 dark:text-gray-400"
            onclick="showSection('profile')">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2zm14 2H5v14h14V5zm-6 6h4v2h-4v4h-2v-4H7v-2h4V7h2v4z" />
            </svg>
            <span class="text-xs">Perfil</span>
        </button>

        <button id='properties_button' class="flex flex-col items-center text-gray-500 dark:text-gray-400"
            onclick="showSection('properties')">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M3 5v14h8v2H3a2 2 0 01-2-2V5a2 2 0 012-2h16a2 2 0 012 2v8h-2V5H3zm14 8h2v4h3l-4 5-4-5h3v-4z" />
            </svg>
            <span class="text-xs">Propiedades</span>
        </button>

        <button id='messages_button' class="flex flex-col items-center text-gray-500 dark:text-gray-400"
            onclick="showSection('messages')">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M21 4H3a2 2 0 00-2 2v12a2 2 0 002 2h18a2 2 0 002-2V6a2 2 0 00-2-2zM3 18V6h18v12H3zm4-4h10v-2H7v2zm0-4h10V8H7v2z" />
            </svg>
            <span class="text-xs">Mensajes</span>
        </button>

    </div>
</div>

<script>
    function showSection(sectionId) {
        const sections = ['profile', 'properties', 'messages'];
        sections.forEach(id => {
            const idBtn = id + "_button";
            document.getElementById(id).classList.add('hidden');
            document.getElementById(idBtn).classList.remove('text-gray-900', 'dark:text-gray-100');
        });

        document.getElementById(sectionId).classList.remove('hidden');
        const activeButton = document.getElementById(sectionId + "_button");
        activeButton.classList.add('text-gray-900', 'dark:text-gray-100');
    }
</script>
