<div class="bg-gray-200 min-h-screen flex items-center">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-[65vw] mx-auto flex gap-4">

        <!-- Columna Izquierda: Propiedades -->
        <div class="flex-shrink-0 bg-gray-100 p-4 rounded-lg w-1/4">
            <h2 class="text-xl font-semibold mb-4">Propiedades</h2>
            <ul class="space-y-2">
                <li class="bg-white p-2 rounded-lg shadow-md">Casa Altozano</li>
                <li class="bg-white p-2 rounded-lg shadow-md">Loft Centro</li>
            </ul>
            <!-- Usando el botón de Flowbite -->
            <button type="button" class="mt-2 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Añadir</button>
        </div>

        <!-- Columna Derecha: Información -->
        <div class="flex-grow flex flex-col gap-6">

            <!-- Información de Contacto -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center">
                    <div class="flex items-center ml-5">
                        <!-- Avatar de Flowbite -->
                        <img class="w-32 h-32 rounded-full" src="https://github.com/shadcn.png" alt="@shadcn">
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold">José Alvarado</h3>
                            <p class="text-gray-600">Alvarado@example.com.mx</p>
                            <p class="text-gray-600">+52 443 354 7158</p>
                        </div>
                    </div>
                    <!-- Usando el botón de Flowbite -->
                    <button type="button" class="bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg text-sm px-5 py-2.5">Editar</button>
                </div>
            </div>

            <!-- Información de la Propiedad -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Información de la Propiedad</h3>
                    <!-- Usando el botón de Flowbite -->
                    <button type="button" class="bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg text-sm px-5 py-2.5">Editar</button>
                </div>
                <div class="flex flex-wrap gap-4 text-gray-600">
                    <p class="w-1/2"><span class="font-semibold">Nombre:</span> Casa Altozano</p>
                    <p class="w-1/2"><span class="font-semibold">Tamaño:</span> 120 metros cuadrados</p>
                    <p class="w-1/2"><span class="font-semibold">Baños:</span> 2 Baños</p>
                    <p class="w-1/2"><span class="font-semibold">Cuartos:</span> 3 cuartos</p>
                    <p class="w-1/2"><span class="font-semibold">Precio de Renta:</span> $20,000 MXN</p>
                    <p class="w-1/2"><span class="font-semibold">Estacionamientos:</span> 2 Estacionamientos</p>
                </div>

                <!-- Amenidades -->
                <div class="mt-4">
                    <h4 class="font-semibold mb-2">Amenidades</h4>
                    <div class="flex items-center space-x-4">
                        <label class="flex items-center">
                            <input type="checkbox" class="mr-2" checked readonly />
                            <span>Patio</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="mr-2" checked readonly />
                            <span>Jardín</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="mr-2" checked readonly />
                            <span>Cochera</span>
                        </label>
                    </div>
                </div>

                <!-- Fotos -->
                <div class="mt-4">
                    <h4 class="font-semibold mb-2">Fotos</h4>
                    <div class="flex space-x-2">
                        <img src="https://via.placeholder.com/100" alt="foto1" class="w-24 h-24 rounded-lg object-cover" />
                        <img src="https://via.placeholder.com/100" alt="foto2" class="w-24 h-24 rounded-lg object-cover" />
                        <img src="https://via.placeholder.com/100" alt="foto3" class="w-24 h-24 rounded-lg object-cover" />
                    </div>
                    <!-- Usando el botón de Flowbite -->
                    <button type="button" class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Añadir</button>
                </div>
            </div>
        </div>
    </div>
</div>


