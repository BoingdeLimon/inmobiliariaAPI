<div
    class="h-full bg-gray-100 dark:bg-gray-900 md:overflow-y-hidden text-gray-800 dark:text-gray-200 transition duration-300">
    <div class=" mx-auto  w-11/12 h-full md:flex p-4 lg:space-x-4">

        <div id="profile"
            class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-10 md:w-1/4  h-modal text-center md:block hidden">

            <div class="w-full flex items-start mb-5">
                <button class="text-gray-600 dark:text-gray-300 hover:text-gray-900">
                    <a href="/"
                        class="flex items-start justify-start w-full dark:hover:text-white transform transition-transform duration-300 hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                        Regresar
                    </a>
                </button>
            </div>

            <div class="w-full flex items-center justify-center">
                <img src="{{ Auth::user()->photo ? asset('storage/photos/' . Auth::user()->photo) : asset('img/default.jpg') }}"
                    alt="{{ Auth::user()->name }}" class="aspect-square w-24 rounded-full mr-2">
            </div>

            <h2 class="text-lg font-semibold">{{ Auth::user()->name }}</h2>
            <p class="text-gray-600 dark:text-gray-400">{{ Auth::user()->email }}</p>
            <p class="text-gray-600 dark:text-gray-400">{{ Auth::user()->phone ?? 'Teléfono inexistente' }}</p>

            <div class="flex-col flex space-y-4 w-full">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none transition duration-300 ease-in-out transform hover:scale-95 mt-4 w-full">
                        Sign Out
                    </button>
                </form>

                @livewire('editar-usuarios-modal', ['user' => Auth::user()])
                {{-- <button
                    class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 focus:outline-none transition duration-300 ease-in-out transform hover:scale-95 w-full">
                    Editar Perfil
                </button> --}}
                @livewire('new-rentals-form', ['user_id' => Auth::user()->id])
                <livewire:button-dark-mode />
            </div>
        </div>

        <div class="overflow-y-auto grid w-full space-y-4 h-modal">
            <div id="properties" class="lg:w-full h-full space-y-6 md:block hidden ">

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg h-full p-6">
                    <div class="w-full mb-2 flex justify-between items-end">
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
                        <div id="propertyInfo" class="mt-4 w-full">
                            <div class="grid grid-cols-1 justify-items-start sm:grid-cols-2 gap-4">
                                @foreach ([
        'Nombre' => $selectedProperty->title,
        'Tamaño' => $selectedProperty->size . ' m²',
        'Precio de Renta' => number_format($selectedProperty->price, 2),
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
                            <div class="w-full flex items-center justify-center p-9 overflow-x-auto space-x-10">
                                @foreach ($selectedProperty->photos as $photo)
                                    <img src="{{ asset('storage/photos/' . $photo->photo) }}"
                                        alt="Foto de la propiedad"
                                        class="w-80 h-44 md:h-[11rem] md:w-[30rem] bg-gray-300 rounded-lg object-cover">
                                @endforeach
                            </div>

                            <div class="space-y-2 flex flex-col w-full">
                                @livewire('new-rentals-form', ['user_id' => Auth::user()->id, 'realEstateId' => $selectedProperty->id], key($selectedProperty->id))

                                @livewire('confirmar-borrar-modal-real-estate', ['rental' => $selectedProperty])
                                @livewire('rent-list', ['realEstateId' => $selectedProperty->id], key($selectedProperty->id))
                            </div>
                        </div>
                    @else
                        <div
                            class="p-6 bg-gray-50 dark:bg-gray-800 rounded-lg shadow-lg text-center border border-gray-200 dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">No tienes propiedades.</p>
                        </div>
                    @endif

                </div>
            </div>




            <div id="rentals"
                class="lg:w-full    bg-white dark:bg-gray-800 rounded-xl shadow-2xl p-6 md:block hidden">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Rentas</h3>
                @if ($rentWithComment->count() > 0)
                    <div class="space-y-6 overflow-y-scroll  h-80 scrollbar-thin scrollbar-thumb-gray-400 ">
                        @foreach ($rentWithComment as $rental)
                            {{-- <div>
                            {{$rental}}
                        </div> --}}
                            <div
                                class="p-6 bg-gray-50 dark:bg-gray-700 rounded-xl shadow-lg border border-gray-200 dark:border-gray-600 transition-transform duration-300  hover:shadow-xl  ">
                                <div class="flex items-center justify-between mb-4">
                                    <p class="font-semibold text-lg text-gray-900 dark:text-gray-100">
                                        Propiedad: {{ $this->loadRealEstateTitle($rental->id) }}
                                    </p>
                                    <span class="text-sm text-gray-600 dark:text-gray-400">
                                        Inicio: <span
                                            class="font-medium text-blue-500">{{ \Carbon\Carbon::parse($rental->rent_start)->format('d M, Y') }}</span>
                                    </span>
                                </div>

                                <div class="space-y-3">
                                    <p class="text-sm text-gray-700 dark:text-gray-300">
                                        <strong>Fin:</strong> <span class="font-medium text-blue-500">
                                            {{ $rental->rent_end ? \Carbon\Carbon::parse($rental->rent_end)->format('d M, Y') : 'N/A' }}
                                        </span>
                                    </p>
                                    <p class="text-sm text-gray-700 dark:text-gray-300">
                                        <strong>Razón de Fin:</strong> <span
                                            class="font-medium text-blue-500">{{ $rental->reason_end ?? 'N/A' }}</span>
                                    </p>
                                </div>

                                @if ($rental->comment)
                                    <div class="mt-4">
                                        <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                            Comentario</h2>
                                        <div
                                            class="p-4 bg-gray-100 dark:bg-gray-800 rounded-lg shadow-md border border-gray-300 dark:border-gray-600 space-y-2">
                                            <p class="text-base text-gray-800 dark:text-gray-200">
                                                {{ $rental->comment->comment }}
                                            </p>
                                            <div class="flex items-center space-x-1">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <svg class="w-5 h-5 {{ $rental->comment->rating >= $i ? 'text-yellow-500' : 'text-gray-300' }}"
                                                        fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.957a1 1 0 00.95.69h4.162c.969 0 1.371 1.24.588 1.81l-3.37 2.448a1 1 0 00-.364 1.118l1.286 3.957c.3.921-.755 1.688-1.54 1.118l-3.37-2.448a1 1 0 00-1.175 0l-3.37 2.448c-.784.57-1.838-.197-1.54-1.118l1.286-3.957a1 1 0 00-.364-1.118L2.465 9.384c-.783-.57-.38-1.81.588-1.81h4.162a1 1 0 00.95-.69l1.286-3.957z" />
                                                    </svg>
                                                @endfor
                                            </div>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                                Creado el
                                                {{ $rental->comment->created_at->translatedFormat('d F, Y') }} a
                                                las {{ $rental->comment->created_at->translatedFormat('H:i') }}
                                            </p>
                                        </div>
                                    </div>
                                @else
                                    <div class="mt-4">
                                        @livewire('create-comment', ['id_rentals' => $rental->id], key($rental->id))
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div
                        class="p-6 bg-gray-50 dark:bg-gray-800 h-auto rounded-lg shadow-lg text-center border border-gray-300 dark:border-gray-600">
                        <p class="text-gray-600 dark:text-gray-400">No hay rentas disponibles.</p>
                    </div>
                @endif
            </div>



            <div id="messages"
                class="lg:w-full space-y-6 h-modal bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 md:block hidden">
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
                                        Enviado: {{ \Carbon\Carbon::parse($message->created_at)->format('d M, Y') }} a
                                        las
                                        {{ \Carbon\Carbon::parse($message->created_at)->format('H:i') }}
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


        <button id='rentals_button' class="flex flex-col items-center text-gray-500 dark:text-gray-400"
            onclick="showSection('rentals')">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M3 3h18v2H3V3zm0 4h18v2H3V7zm0 4h18v2H3v-2zm0 4h18v2H3v-2zm0 4h18v2H3v-2z" />
            </svg>
            <span class="text-xs">Rentas</span>
        </button>
    </div>
</div>

<script>
    function showSection(sectionId) {
        const sections = ['profile', 'properties', 'messages', 'rentals'];
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
