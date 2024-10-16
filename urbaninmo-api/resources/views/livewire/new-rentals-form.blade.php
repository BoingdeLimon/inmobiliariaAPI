<div>
    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
        class="block w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">

        Publicar
    </button>

    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow w-full dark:bg-gray-700">
                <div class="flex justify-between items-center p-5 rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        Nuevo alquiler
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg
                         text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Cerrar modal</span>
                    </button>
                </div>
                <p class="text-sm text-left  p-5 w-10/12">
                    Publica tu nuevo alquiler llenando los detalles a continuación.
                </p>

                <form class="p-6 space-y-6">
                    <div class="flex items-center mb-4 space-x-4">
                        <label for="name"
                            class="text-md text-gray-900 dark:text-white text-left w-1/4">Nombre</label>
                        <input type="text" name="name" id="name"
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                            block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Nombre completo" required="">
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="location"
                            class="text-md text-gray-900 dark:text-white text-left w-1/4">Ubicación</label>
                        <input type="text" name="location" id="location"
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                            block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Introduce la dirección o ciudad" required="">
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="price"
                            class="text-md text-gray-900 dark:text-white text-left w-1/4">Precio</label>
                        <input type="number" name="price" id="price"
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                            block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Introduce el precio mensual" required="">
                    </div>

                    <div class="flex items-start mb-4 space-x-4">
                        <label for="description"
                            class="text-md text-gray-900 dark:text-white text-left w-1/4">Descripción</label>
                        <textarea id="description" rows="4"
                            class="flex-1 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 
                            dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Introduce una breve descripción de la propiedad"></textarea>
                    </div>

                    <div class="w-full  flex items-center justify-end">
                        <button type="submit"
                            class="w-auto  text-white bg-black focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Publicar
                        </button>
                    </div>
                </form>




            </div>
        </div>
    </div>
</div>
