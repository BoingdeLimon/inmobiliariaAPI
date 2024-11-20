<div>
    <button wire:click="openModal"
        class=" w-full transform transition-transform md:w-full
        block
        text-white bg-blue-700 hover:bg-white hover:text-blue-700 border  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:text-white dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        {{ $realEstateId ? 'Actualizar' : 'Publicar' }}
    </button>

    @if ($isModalOpen)
        <div wire:click.self="closeModal"
            class="fixed inset-0 flex items-center justify-center  h-screen bg-gray-900 bg-opacity-50 z-50">

            <button wire:click="closeModal" class="fixed top-2 right-2 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>


            <div
                class="bg-white dark:bg-gray-800 p-6  rounded-lg shadow-lg w-11/12 md:w-5/12 h-5/6 overflow-y-scroll scrollbar-hide">
                <form wire:submit.prevent="submit" class="p-4 space-y-6" enctype="multipart/form-data">

                    <p class="font-medium text-gray-900 dark:text-white text-xl text-left  w-10/12">
                        Publica tu nuevo alquiler llenando los detalles a continuación.
                    </p>


                    <div class="flex items-center mb-4 space-x-4">
                        <label for="title" class="text-md text-gray-900 dark:text-white text-left w-1/4">
                            Título
                        </label>
                        <input type="text" name="title" id="title" wire:model='title'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Título del alquiler" required>
                    </div>

                    <div class="flex items-start mb-4 space-x-4">
                        <label for="description" class="text-md text-gray-900 dark:text-white text-left w-1/4">
                            Descripción
                        </label>
                        <textarea id="description" rows="4" wire:model='description'
                            class="flex-1 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Introduce una breve descripción de la propiedad" required></textarea>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="size" class="text-md text-gray-900 dark:text-white text-left w-1/4">
                            Tamaño (m²)
                        </label>
                        <input type="number" min="0" name="size" id="size" wire:model='size'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Tamaño en m²" required step="any" min="0">
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="rooms" class="text-md text-gray-900 dark:text-white text-left w-1/4">
                            Habitaciones
                        </label>
                        <input type="number" min="0" name="rooms" id="rooms" wire:model='rooms'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Número de habitaciones" required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="bathrooms" class="text-md text-gray-900 dark:text-white text-left w-1/4">
                            Baños
                        </label>
                        <input type="number" min="0" min="0" name="bathrooms" id="bathrooms"
                            wire:model='bathrooms'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Número de baños" required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="price" class="text-md text-gray-900 dark:text-white text-left w-1/4">
                            Precio
                        </label>
                        <input type="number" min="0" min="0" name="price" id="price"
                            wire:model='price'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Precio mensual" required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="address" class="text-md text-gray-900 dark:text-white text-left w-1/4">
                            Dirección
                        </label>
                        <input type="text" name="address" id="address" wire:model='address'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Dirección de la propiedad" required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="zipcode" class="text-md text-gray-900 dark:text-white text-left w-1/4">
                            Código Postal
                        </label>
                        <input type="text" name="zipcode" id="zipcode" wire:model='zipcode'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Código postal" required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="city" class="text-md text-gray-900 dark:text-white text-left w-1/4">
                            Ciudad
                        </label>
                        <input type="text" name="city" id="city" wire:model='city'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Ciudad" required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="state" class="text-md text-gray-900 dark:text-white text-left w-1/4">
                            Estado
                        </label>
                        <input type="text" name="state" id="state" wire:model='state'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Estado o provincia" required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="country" class="text-md text-gray-900 dark:text-white text-left w-1/4">
                            País
                        </label>
                        <input type="text" name="country" id="country" wire:model='country'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="País" required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="x" class="text-md text-gray-900 dark:text-white text-left w-1/4">
                            Coordenada X
                        </label>
                        <input type="number" name="x" id="x" wire:model='x'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Coordenada X" required step="any">
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="y" class="text-md text-gray-900 dark:text-white text-left w-1/4">
                            Coordenada Y
                        </label>
                        <input type="number" name="y" id="y" wire:model='y'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Coordenada Y" required step="any">
                    </div>


                    <div class="flex items-center mb-4 space-x-4">
                        <label for="type"
                            class="text-md text-gray-900 dark:text-white text-left w-1/4">Tipo</label>
                        <select id="type" name="type"
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            wire:model='type' required>
                            <option value="Casa">Casa</option>
                            <option value="Departamento">Departamento</option>
                            <option value="Local">Oficina</option>
                            <option value="Oficina">Oficina</option>
                        </select>
                    </div>


                    <div class="flex items-center mb-4 space-x-4">
                        <label for="has_garage" class="text-md text-gray-900 dark:text-white text-left w-1/4">
                            ¿Tiene garaje?
                        </label>
                        <input type="checkbox" name="has_garage" id="has_garage" wire:model='has_garage'
                            class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="has_garden" class="text-md text-gray-900 dark:text-white text-left w-1/4">
                            ¿Tiene jardín?
                        </label>
                        <input type="checkbox" name="has_garden" id="has_garden" wire:model='has_garden'
                            class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="has_patio" class="text-md text-gray-900 dark:text-white text-left w-1/4">
                            ¿Tiene patio?
                        </label>
                        <input type="checkbox" name="has_patio" id="has_patio" wire:model='has_patio'
                            class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                    </div>


                    @csrf
                    <div class="mb-4">
                        <label for="photos"
                            class="block text-gray-900 dark:text-white text-sm text-left">Fotos</label>
                        <input type="file" wire:model="photo" id="photos" multiple required
                            class="w-full p-2 border text-gray-900 dark:text-white  border-gray-300 rounded-lg">
                        @error('photos')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center justify-center bg-slate-400 space-x-2 ">
                        @if ($photo)
                            @foreach ($photo as $preview)
                                <img src="{{ $preview ->temporaryUrl() }}" alt="Preview"
                                    class="aspect-square w-20  object-cover rounded-lg">
                            @endforeach
                        @endif
                    </div>

                    <button type="submit" class="w-full bg-blue-700 text-white p-2 rounded-lg">
                        {{ $realEstateId ? 'Actualizar' : 'Publicar' }}
                    </button>

                </form>
            </div>



        </div>
    @endif
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</div>
