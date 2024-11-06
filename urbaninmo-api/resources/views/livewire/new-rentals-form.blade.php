<div>
    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
        class="block w-full transform transition-transform md:w-auto text-white bg-blue-700 hover:bg-white hover:text-blue-700 border hover:border-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        Publicar
    </button>

    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="w-full hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center md:inset-0 h-[calc(100%-1rem)] max-h-full">

        <div class="relative p-4 w-11/12 lg:w-1/3 h-full">
            <div class="relative bg-white rounded-lg shadow w-full dark:bg-gray-700">


                <div class="flex justify-between items-center p-5 rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        Nuevo alquiler
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Cerrar modal</span>
                    </button>
                </div>

                <p class="font-medium text-gray-900 dark:text-white text-sm text-left p-5 w-10/12">
                    Publica tu nuevo alquiler llenando los detalles a continuación.
                </p>

                <form class="p-6 space-y-6" wire:submit.prevent="submit" id="fora"  enctype="multipart/form-data">


                    {{-- <div class="flex items-center mb-4 space-x-4">
                        <label for="title" wire:model='title'
                            class="text-md text-gray-900 dark:text-white text-left w-1/4">Título</label>
                        <input type="text" name="title" id="title"
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Título del alquiler" required>
                    </div>

                    <div class="flex items-start mb-4 space-x-4">
                        <label for="description" wire:model='description'
                            class="text-md text-gray-900 dark:text-white text-left w-1/4">Descripción</label>
                        <textarea id="description" rows="4"
                            class="flex-1 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Introduce una breve descripción de la propiedad" required></textarea>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="size" class="text-md text-gray-900 dark:text-white text-left w-1/4">Tamaño
                            (m²)</label>
                        <input type="number" min="0" name="size" id="size" wire:model='size'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Tamaño en m²" required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="rooms"
                            class="text-md text-gray-900 dark:text-white text-left w-1/4">Habitaciones</label>
                        <input type="number" min="0" name="rooms" id="rooms" wire:model='rooms'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Número de habitaciones" required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="bathrooms"
                            class="text-md text-gray-900 dark:text-white text-left w-1/4">Baños</label>
                        <input type="number" min="0" min="0"  name="bathrooms" id="bathrooms" wire:model='bathrooms'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Número de baños" required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="price"
                            class="text-md text-gray-900 dark:text-white text-left w-1/4">Precio</label>
                        <input type="number" min="0" min="0" name="price" id="price" wire:model='price'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Precio mensual" required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="address"
                            class="text-md text-gray-900 dark:text-white text-left w-1/4">Dirección</label>
                        <input type="text" name="address" id="address" wire:model='address'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Dirección de la propiedad" required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="zipcode" class="text-md text-gray-900 dark:text-white text-left w-1/4">Código
                            Postal</label>
                        <input type="text" name="zipcode" id="zipcode" wire:model='zipcode'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Código postal" required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="city"
                            class="text-md text-gray-900 dark:text-white text-left w-1/4">Ciudad</label>
                        <input type="text" name="city" id="city" wire:model='city'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Ciudad" required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="state" wire:model='state'
                            class="text-md text-gray-900 dark:text-white text-left w-1/4">Estado</label>
                        <input type="text" name="state" id="state"
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Estado o provincia" required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="country" wire:model='country'
                            class="text-md text-gray-900 dark:text-white text-left w-1/4">País</label>
                        <input type="text" name="country" id="country"
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="País" required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="x" class="text-md text-gray-900 dark:text-white text-left w-1/4">Coordenada
                            X</label>
                        <input type="number"  name="x" id="x" wire:model='x'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Coordenada X" required>
                    </div>
                    <div class="flex items-center mb-4 space-x-4">
                        <label for="y" class="text-md text-gray-900 dark:text-white text-left w-1/4">Coordenada
                            Y</label>
                        <input type="number"  name="y" id="y" wire:model='y'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Coordenada Y" required>
                    </div> --}}
                    <div class="flex items-center mb-4 space-x-4">
                        <label for="photos"
                            class="text-md text-gray-900 dark:text-white text-left w-1/4">Fotos</label>
                            <input type="file" wire:model="file" id="photos" class="flex-1 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">

                    </div>






                    {{-- 
                    <div class="flex items-center mb-4 space-x-4">
                        <label for="type" class="text-md text-gray-900 dark:text-white text-left w-1/4">Tipo</label>
                        <select id="type" name="type"
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" wire:model='type'
                            required>
                            <option value="Casa">Casa</option>
                            <option value="Departamento">Departamento</option>
                            <option value="Local">Oficina</option>
                            <option value="Oficina">Oficina</option>
                        </select>
                    </div>
                    

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="has_garage" class="text-md text-gray-900 dark:text-white text-left w-1/4">¿Tiene garaje?</label>
                        <input type="checkbox" name="has_garage" id="has_garage" wire:model='has_garage'
                            class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                    </div>
                    
                    <div class="flex items-center mb-4 space-x-4">
                        <label for="has_garden" class="text-md text-gray-900 dark:text-white text-left w-1/4">¿Tiene jardín?</label>
                        <input type="checkbox" name="has_garden" id="has_garden" wire:model='has_garden'
                            class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                    </div>
                    
                    <div class="flex items-center mb-4 space-x-4">
                        <label for="has_patio" class="text-md text-gray-900 dark:text-white text-left w-1/4">¿Tiene patio?</label>
                        <input type="checkbox" name="has_patio" id="has_patio" wire:model='has_patio'
                            class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                    </div> --}}





                    <div class="flex items-center mb-4 space-x-4">
                        <button type="submit"
                            class="w-full bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Publicar alquiler
                        </button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('fora').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevenir el envío por defecto del formulario


        const photo = document.getElementById('photo').files;

        console.log({
            photo

        });
    });
</script>
