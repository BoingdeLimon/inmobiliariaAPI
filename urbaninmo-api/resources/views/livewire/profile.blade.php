<div class="h-screen ">

    <div class="max-w-7xl  mx-auto p-4 w-full h-full  lg:flex lg:space-x-4">

        <div id="profile" class="bg-white rounded-lg shadow-lg p-6 lg:w-1/4 mb-6 lg:mb-0">
            <div class="text-center">
                <img src="https://via.placeholder.com/100" alt="Foto de Perfil" class="rounded-full mx-auto mb-4">
                <h2 class="text-lg font-semibold">José Alvarado</h2>
                <p class="text-gray-600">Alvarado@example.com.mx</p>
                <p class="text-gray-600">+52 443 354 7158</p>
                <!-- Botón de Sign Out -->
                <button class="bg-red-500 text-white mt-4 w-full py-2 rounded-lg">Sign Out</button>
            </div>
        </div>

        <div class="overflow-y-auto grid w-full space-y-14">
            <div id="properties" class="lg:w-full space-y-6">

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-semibold">Mis Propiedades</h3>
                        <select class="text-sm bg-gray-100 p-2 rounded-lg" id="propertyDropdown"
                            onchange="updatePropertyInfo()">
                            <option value="Casa Altozano">Casa Altozano</option>
                            <option value="Loft Centro">Loft Centro</option>ob
                        </select>
                    </div>
                    <div id="propertyInfo" class="mt-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-semibold text-gray-600">Nombre</p>
                                <p>Casa Altozano</p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-600">Tamaño</p>
                                <p>120 metros cuadrados</p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-600">Precio de Renta</p>
                                <p>$20,000 MXN</p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-600">Cuartos</p>
                                <p>3 cuartos</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col mt-7">
                        <h1 class="text-xl font-semibold ">Fotos de la propiedad</h1>
                        <div class="flex justify-center items-center p4 space-x-2">
                            <img src="https://via.placeholder.com/80" alt="Propiedad" class="rounded-lg h-40">
                            <img src="https://via.placeholder.com/80" alt="Propiedad" class="rounded-lg h-40">
                            <img src="https://via.placeholder.com/80" alt="Propiedad" class="rounded-lg h-40">
                            <img src="https://via.placeholder.com/80" alt="Propiedad" class="rounded-lg h-40">
                            <img src="https://via.placeholder.com/80" alt="Propiedad" class="rounded-lg h-40">
                        </div>

                    </div>

                    <!-- Botón de Editar Propiedad -->
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
    function showSection(section) {
        const sections = ['profile', 'properties', 'messages'];
        sections.forEach(s => document.getElementById(s).style.display = s === section ? 'block' : 'none');
    }

    showSection('profile');

    function handleResize() {
        const isDesktop = window.innerWidth >= 1024;
        const sections = document.querySelectorAll("#profile, #properties, #messages");
        sections.forEach(section => {
            section.style.display = isDesktop ? "block" : "none";
        });
        if (!isDesktop) {
            showSection('profile');
        }
    }

    window.addEventListener('resize', handleResize);
    handleResize();

    function updatePropertyInfo() {
        const selectedProperty = document.getElementById('propertyDropdown').value;
        const propertyInfo = document.getElementById('propertyInfo');
        if (selectedProperty === 'Casa Altozano') {
            propertyInfo.innerHTML = `
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div><p class="text-sm font-semibold text-gray-600">Nombre</p><p>Casa Altozano</p></div>
            <div><p class="text-sm font-semibold text-gray-600">Tamaño</p><p>120 metros cuadrados</p></div>
            <div><p class="text-sm font-semibold text-gray-600">Precio de Renta</p><p>$20,000 MXN</p></div>
            <div><p class="text-sm font-semibold text-gray-600">Cuartos</p><p>3 cuartos</p></div>
          </div>`;
        } else {
            propertyInfo.innerHTML = `
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div><p class="text-sm font-semibold text-gray-600">Nombre</p><p>Loft Centro</p></div>
            <div><p class="text-sm font-semibold text-gray-600">Tamaño</p><p>90 metros cuadrados</p></div>
            <div><p class="text-sm font-semibold text-gray-600">Precio de Renta</p><p>$15,000 MXN</p></div>
            <div><p class="text-sm font-semibold text-gray-600">Cuartos</p><p>2 cuartos</p></div>
          </div>`;
        }
    }
</script>