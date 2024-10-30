<div class="h-screen ">

    <div class="max-w-7xl  mx-auto p-4 w-full h-full  lg:flex lg:space-x-4">

        <div id="profile" class="bg-white rounded-lg shadow-lg p-6 lg:w-1/4 mb-6 lg:mb-0">
            <div class="text-center">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>
                    @else
                        <span class="inline-flex rounded-md">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                {{ Auth::user()->name }}
                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </span>
                    @endif
                </x-slot>

                <!-- Dynamic User Information -->
                <h2 class="text-lg font-semibold">{{ Auth::user()->name }}</h2>
                <p class="text-gray-600">{{ Auth::user()->email }}</p>
                <p class="text-gray-600">{{ Auth::user()->phone ?? 'Phone not provided' }}</p>

                <!-- Sign Out Button -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white mt-4 w-full py-2 rounded-lg">
                        Sign Out
                    </button>
                </form>
            </div>
        </div>

        <div class="overflow-y-auto grid w-full space-y-14">
            <div id="properties" class="lg:w-full space-y-6">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-semibold">Mis Propiedades</h3>

                        <!-- Dropdown to select property -->
                        <select class="text-sm bg-gray-100 p-2 rounded-lg" id="propertyDropdown"
                            onchange="updatePropertyInfo()">
                            @foreach ($properties as $property)
                                <option value="{{ $property->id }}">{{ $property->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Property Information Section -->
                    <div id="propertyInfo" class="mt-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-semibold text-gray-600">Nombre</p>
                                <p id="propertyName"></p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-600">Tamaño</p>
                                <p id="propertySize"></p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-600">Precio de Renta</p>
                                <p id="propertyPrice"></p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-600">Cuartos</p>
                                <p id="propertyRooms"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Property Photos Section -->
                    <div class="flex flex-col mt-7">
                        <h1 class="text-xl font-semibold">Fotos de la propiedad</h1>
                        <div class="flex justify-center items-center p-4 space-x-2" id="propertyPhotos">
                            <!-- Photos will be loaded here -->
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <button class="bg-blue-500 text-white mt-4 w-full py-2 rounded-lg">Editar Propiedad</button>
                    <button class="bg-black text-white mt-2 w-full py-2 rounded-lg">Añadir Nueva Renta</button>
                </div>
            </div>


            <div id="messages" class="lg:w-full space-y-6 bg-white rounded-lg shadow-lg p-6">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-semibold">Mensajes</h3>
                    <button class="text-blue-500">Nuevo Mensaje</button>
                </div>
                <div class="mt-4">
                    <div class="space-y-4">
                        <div class="p-4 bg-gray-100 rounded-lg">
                            <p class="font-semibold">Asunto: Renovación de contrato</p>
                            <p class="text-sm text-gray-500">Recibido el 20/09/2024</p>
                        </div>
                        <div class="p-4 bg-gray-100 rounded-lg">
                            <p class="font-semibold">Asunto: Mantenimiento</p>
                            <p class="text-sm text-gray-500">Recibido el 15/09/2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="lg:hidden fixed bottom-0 left-0 right-0 bg-white shadow-md border-t flex justify-around py-2">
        <button class="flex flex-col items-center text-gray-500" onclick="showSection('profile')">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2zm14 2H5v14h14V5zm-6 6h4v2h-4v4h-2v-4H7v-2h4V7h2v4z" />
            </svg>
            <span class="text-xs">Perfil</span>
        </button>
        <button class="flex flex-col items-center text-gray-500" onclick="showSection('properties')">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M3 5v14h8v2H3a2 2 0 01-2-2V5a2 2 0 012-2h16a2 2 0 012 2v8h-2V5H3zm14 8h2v4h3l-4 5-4-5h3v-4z" />
            </svg>
            <span class="text-xs">Propiedades</span>
        </button>
        <button class="flex flex-col items-center text-gray-500" onclick="showSection('messages')">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M21 4H3a2 2 0 00-2 2v12a2 2 0 002 2h18a2 2 0 002-2V6a2 2 0 00-2-2zM3 18V6h18v12H3zm4-4h10v-2H7v2zm0-4h10V8H7v2z" />
            </svg>
            <span class="text-xs">Mensajes</span>
        </button>
    </div>

</div>


<script>
    function updatePropertyInfo() {
        const properties = @json($properties); // Pass PHP properties to JS
        const select = document.getElementById('propertyDropdown');
        const selectedId = select.value;

        // Find the selected property by ID
        const selectedProperty = properties.find(property => property.id == selectedId);

        if (selectedProperty) {
            // Update the relevant <p> tags
            document.getElementById('propertyName').textContent = selectedProperty.title;
            document.getElementById('propertySize').textContent = `${selectedProperty.size} metros cuadrados`;
            document.getElementById('propertyPrice').textContent = `$${selectedProperty.price.toLocaleString()} MXN`;
            document.getElementById('propertyRooms').textContent = `${selectedProperty.rooms} cuartos`;

            // Update property images (placeholder logic)
            const photosContainer = document.getElementById('propertyPhotos');
            photosContainer.innerHTML = ''; // Clear existing images
            for (let i = 0; i < 5; i++) {
                const img = document.createElement('img');
                img.src = 'https://via.placeholder.com/80';
                img.alt = 'Propiedad';
                img.className = 'rounded-lg h-40';
                photosContainer.appendChild(img);
            }
        }
    }

    // Run the function on page load
    document.addEventListener('DOMContentLoaded', function() {
        const select = document.getElementById('propertyDropdown');

        // Set the default selection to the first property if none is selected
        if (!select.value && select.options.length > 0) {
            select.value = select.options[0].value;
        }

        updatePropertyInfo(); // Call the function immediately after setting the default value
    });

    // Update the property info on dropdown change
    document.getElementById('propertyDropdown').addEventListener('change', updatePropertyInfo);
</script>
