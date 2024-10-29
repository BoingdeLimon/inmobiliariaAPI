<div class="bg-gray-200 dark:bg-gray-900 min-h-screen">

    <!-- Vista de Móvil -->
<div class="lg:hidden flex flex-col bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-300 overflow-hidden">
    <!-- Contenedor principal -->
    <div class="flex-1 flex flex-col items-center justify-center p-4">
        <!-- Vista del perfil (se carga por default) -->
        <div id="profile-view" class="flex h-screen flex-col items-center justify-center gap-4 text-center space-y-4 max-h-[calc(100vh-80px)]">
            <img class="w-32 h-32 rounded-full" src="{{ Auth::user()->photo_url ?? 'https://github.com/shadcn.png' }}" alt="{{ '@' . Auth::user()->name }}">
            <button class="text-blue-500 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-500 flex gap-4">
                Editar
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M17.414 2.586a2 2 0 010 2.828l-10 10A2 2 0 016 16H3a1 1 0 01-1-1v-3a2 2 0 01.586-1.414l10-10a2 2 0 012.828 0zM5 15v1h1l10-10-1-1-10 10z"/>
                </svg>
            </button>
            <h2 class="text-gray-500 dark:text-gray-400">Nombre</h2>
            <p class="text-lg text-black dark:text-white">{{ Auth::user()->name }}</p>

            <h2 class="text-gray-500 dark:text-gray-400 mt-4">Correo</h2>
            <p class="text-lg text-black dark:text-white">{{ Auth::user()->email }}</p>

            <h2 class="text-gray-500 dark:text-gray-400 mt-4">Contacto</h2>
            <p class="text-lg text-black dark:text-white">{{ Auth::user()->phone ?? 'Sin número' }}</p>
        </div>

        <!-- Lista de propiedades -->
        <div id="properties-view" class="hidden text-center h-screen text-gray-500 dark:text-gray-400">
            <div class="flex flex-col w-[80vw] h-[85vh] overflow-hidden bg-gray-100 dark:bg-gray-800 rounded-lg shadow-lg p-2">
                <!-- Header -->
                <div class="bg-blue-500 dark:bg-blue-600 text-white text-center py-2 rounded-t-lg font-semibold">
                    Propiedades
                </div>

                <!-- Lista de propiedades -->
                <div class="flex flex-col divide-y divide-gray-300 dark:divide-gray-600 text-center">
                    <div class="py-4 text-black dark:text-white font-semibold">Casa Altozano</div>
                    <div class="py-4 text-black dark:text-white font-semibold">Loft Centro</div>
                </div>

                <!-- Botón de añadir -->
                <button class="bg-black dark:bg-gray-700 text-white rounded-md py-2 mt-4 mx-4 font-semibold">
                    Añadir
                </button>
            </div>
        </div>

        <!-- Propiedad Individual -->
        <div id="property-view" class="hidden h-screen text-center text-gray-500 dark:text-gray-400">
            <div class="p-4 bg-gray-100 dark:bg-gray-800 rounded-lg h-[85vh] shadow-lg max-w-sm mx-auto">
                <!-- Encabezado -->
                <div class="flex justify-center items-center gap-2 mb-4">
                    <h2 class="text-lg font-semibold">Información de la Propiedad</h2>
                    <button class="text-blue-500 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-500 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 010 2.828l-10 10A2 2 0 016 16H3a1 1 0 01-1-1v-3a2 2 0 01.586-1.414l10-10a2 2 0 012.828 0zM5 15v1h1l10-10-1-1-10 10z"/>
                        </svg>
                    </button>
                </div>

                <!-- Información de la propiedad -->
                <div class="grid grid-cols-2 gap-y-5 text-sm">
                    <div class="font-semibold">Nombre</div>
                    <div>Casa Altozano</div>
                    <div class="font-semibold">Tamaño</div>
                    <div>120 metros cuadrados</div>
                    <div class="font-semibold">Baños</div>
                    <div>2 Baños</div>
                    <div class="font-semibold">Precio de Renta</div>
                    <div>$20,000 MXN</div>
                    <div class="font-semibold">Cuartos</div>
                    <div>3 cuartos</div>
                    <div class="font-semibold">Otro</div>
                    <div>2 Estacionamientos</div>
                </div>

                <!-- Características adicionales -->
                <div class="my-4">
                    <p class="font-semibold text-sm">Características:</p>
                    <div class="flex space-x-4 mt-2 text-sm">
                        <label class="flex items-center">
                            <input type="checkbox" checked class="form-checkbox text-blue-500 dark:text-blue-400 mr-2" disabled> Patio
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" checked class="form-checkbox text-blue-500 dark:text-blue-400 mr-2" disabled> Jardín
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" checked class="form-checkbox text-blue-500 dark:text-blue-400 mr-2" disabled> Cochera
                        </label>
                    </div>
                </div>

                <!-- Galería de fotos -->
                <div class="mt-4">
                    <p class="font-semibold text-sm">Fotos</p>
                    <div class="grid grid-cols-3 gap-2 mt-2">
                        <img src="foto1.jpg" alt="Foto 1" class="w-full h-20 object-cover rounded-lg">
                        <img src="foto2.jpg" alt="Foto 2" class="w-full h-20 object-cover rounded-lg">
                        <img src="foto3.jpg" alt="Foto 3" class="w-full h-20 object-cover rounded-lg">
                    </div>
                    <button class="bg-black dark:bg-gray-700 text-white w-full mt-4 py-2 rounded-md font-semibold text-sm">Añadir</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Barra inferior fija con botones -->
    <div class="fixed bottom-0 w-full bg-blue-600 dark:bg-blue-800">
        <div class="flex justify-around py-3">
            <button onclick="showView('profile-view')" class="text-white">Perfil</button>
            <button onclick="showView('properties-view')" class="text-white">Propiedades</button>
            <button onclick="showView('property-view')" class="text-white">Vista 3</button>
        </div>
    </div>
</div>

    <!-- Vista de Escritorio -->
<div class="hidden lg:flex bg-gray-200 dark:bg-gray-900 min-h-screen items-center justify-center">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-[80vw]  flex gap-6">
  
      <!-- Columna Izquierda: Propiedades -->
      <div class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 p-4 rounded-lg w-[15vw]">
        <h2 class="text-xl font-semibold mb-4 text-center">Propiedades</h2>
        <ul class="space-y-2">
          <li class="bg-white dark:bg-gray-600 p-2 rounded-lg shadow-md text-center">Casa Altozano</li>
          <li class="bg-white dark:bg-gray-600 p-2 rounded-lg shadow-md text-center">Loft Centro</li>
        </ul>
        <button class="bg-blue-600 dark:bg-blue-500 text-white mt-4 w-full py-2 rounded-lg font-semibold">Añadir</button>
      </div>
  
      <!-- Columna Derecha: Información de Contacto e Información de Propiedad -->
      <div class="flex-grow w-[40vw] flex flex-col gap-6">
  
        <!-- Información de Contacto -->
        <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
          <div class="flex justify-between items-center">
            <div class="flex items-center ml-5">
              <div class="h-32 w-32 rounded-full overflow-hidden">
                <img src="https://github.com/shadcn.png" alt="Foto de usuario" class="object-cover w-full h-full">
              </div>
              <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">José Alvarado</h3>
                <p class="text-gray-600 dark:text-gray-400">Alvarado@example.com.mx</p>
                <p class="text-gray-600 dark:text-gray-400">+52 443 354 7158</p>
              </div>
            </div>
            <button class="bg-blue-600 dark:bg-blue-500 text-white py-2 px-4 rounded-lg font-semibold">Editar</button>
          </div>
        </div>
  
        <!-- Información de la Propiedad -->
        <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Información de la Propiedad</h3>
            <button class="bg-blue-600 dark:bg-blue-500 text-white py-2 px-4 rounded-lg font-semibold">Editar</button>
          </div>
  
          <div class="grid grid-cols-2 gap-4 text-gray-700 dark:text-gray-300">
            <p><span class="font-semibold">Nombre:</span> Casa Altozano</p>
            <p><span class="font-semibold">Tamaño:</span> 120 metros cuadrados</p>
            <p><span class="font-semibold">Baños:</span> 2 Baños</p>
            <p><span class="font-semibold">Cuartos:</span> 3 cuartos</p>
            <p><span class="font-semibold">Precio de Renta:</span> $20,000 MXN</p>
            <p><span class="font-semibold">Estacionamientos:</span> 2 Estacionamientos</p>
          </div>
  
          <!-- Amenidades -->
          <div class="mt-4">
            <h4 class="font-semibold mb-2 text-gray-800 dark:text-white">Amenidades</h4>
            <div class="flex items-center space-x-4">
              <label class="flex items-center">
                <input type="checkbox" class="mr-2" checked disabled class="text-blue-600 dark:text-blue-500"> Patio
              </label>
              <label class="flex items-center">
                <input type="checkbox" class="mr-2" checked disabled class="text-blue-600 dark:text-blue-500"> Jardín
              </label>
              <label class="flex items-center">
                <input type="checkbox" class="mr-2" checked disabled class="text-blue-600 dark:text-blue-500"> Cochera
              </label>
            </div>
          </div>
  
          <!-- Fotos -->
          <div class="mt-4">
            <h4 class="font-semibold mb-2 text-gray-800 dark:text-white">Fotos</h4>
            <div class="flex space-x-2">
              <img src="https://via.placeholder.com/100" alt="foto1" class="w-24 h-24 rounded-lg object-cover" />
              <img src="https://via.placeholder.com/100" alt="foto2" class="w-24 h-24 rounded-lg object-cover" />
              <img src="https://via.placeholder.com/100" alt="foto3" class="w-24 h-24 rounded-lg object-cover" />
            </div>
            <button class="bg-blue-600 dark:bg-blue-500 text-white mt-4 w-full py-2 rounded-lg font-semibold">Añadir</button>
          </div>
        </div>
  
      </div>    
    </div>
  </div>


<script>
    function showView(viewId) {
        // Ocultar todas las vistas
        document.getElementById('profile-view').classList.add('hidden');
        document.getElementById('properties-view').classList.add('hidden');
        document.getElementById('property-view').classList.add('hidden');

        // Mostrar la vista seleccionada
        document.getElementById(viewId).classList.remove('hidden');
    }
</script>
