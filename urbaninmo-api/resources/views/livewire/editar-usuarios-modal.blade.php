<div>
    <button
        wire:click="openModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->phone }}', '{{ $user->role }}', '{{ $user->photo }}')"
        class="text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-6 py-3 text-center me-2 mb-2 transition duration-300 transform hover:scale-105 hover:shadow-lg dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900 w-full">
        Editar
    </button>

    @if ($isModalOpen)
        <div wire:click.self="closeModal"
            class="fixed inset-0 flex items-center justify-center h-screen bg-gray-900 bg-opacity-60 z-50 transition-opacity duration-300">
            <div
                class="bg-white  dark:bg-gray-800 p-6 rounded-lg shadow-xl w-11/12 md:w-5/12 h-auto overflow-y-auto scrollbar-hide">
                <form wire:submit.prevent="editarUsuario" class="space-y-6">
                    <p class="font-semibold text-gray-900 dark:text-white text-xl text-left">Editar usuario</p>

                    <!-- Nombre -->
                    <div class="flex flex-col md:flex-row items-center mb-4 space-x-4">
                        <label for="name" class="text-md text-gray-900 dark:text-white w-1/4">Nombre:</label>
                        <input type="text" id="name" wire:model='name'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-3 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white transition duration-300 focus:ring-2 focus:ring-purple-300"
                            required>
                    </div>

                    <!-- Email -->
                    <div class="flex flex-col md:flex-row items-center mb-4 space-x-4">
                        <label for="email" class="text-md text-gray-900 dark:text-white w-1/4">Email:</label>
                        <input type="email" id="email" wire:model='email'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-3 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white transition duration-300 focus:ring-2 focus:ring-purple-300"
                            required>
                    </div>

                    <!-- Teléfono -->
                    <div class="flex flex-col md:flex-row items-center mb-4 space-x-4">
                        <label for="phone" class="text-md text-gray-900 dark:text-white w-1/4">Teléfono:</label>
                        <input type="text" id="phone" wire:model='phone'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-3 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white transition duration-300 focus:ring-2 focus:ring-purple-300"
                            required>
                    </div>

                    <!-- Rol -->
                    @if (Auth::user()->role === 'admin')
                        <div class="flex flex-col md:flex-row items-center mb-4 space-x-4" class="block">
                            <label for="role" class="text-md text-gray-900 dark:text-white w-1/4">Rol:</label>

                            <input type="text" id="role" wire:model='role'
                                class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-3 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white transition duration-300 focus:ring-2 focus:ring-purple-300"
                                required>
                        </div>
                    @else
                    @endif
                    <!-- Foto -->
                    <div class="flex flex-col md:flex-row items-center mb-4 space-x-4">
                        <label for="photo" class="text-md text-gray-900 dark:text-white w-1/4">Foto:</label>
                        <input type="file" id="photo" wire:model='photo'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-3 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white transition duration-300 focus:ring-2 focus:ring-purple-300">
                    </div>
                    <div
                        class="flex flex-col items-center justify-center p-6 bg-gray-100 dark:bg-gray-800 rounded-lg shadow-lg space-y-8">

                        <div class="grid grid-cols-2 gap-8 items-center">
                            <div class="flex flex-col items-center space-y-4">
                                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">
                                    Foto Actual
                                </h3>
                                 <img src="{{ asset('storage/photos/'.$photoAlreadySave) }}" alt="Foto actual"
                                    class="aspect-square w-28 md:w-24 bg-gray-300 dark:bg-gray-700 rounded-full object-cover shadow-md border border-gray-200 dark:border-x-gray-300">
                            </div>

                            @if ($photo)
                                <div class="flex flex-col items-center space-y-4">
                                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">
                                        Nueva Foto
                                    </h3>
                                    <img src="{{ $photo->temporaryUrl() }}" alt="Previsualización de imagen"
                                        class="aspect-square w-28 md:w-24 bg-gray-300 dark:bg-gray-700 rounded-full object-cover shadow-md border border-gray-200 dark:border-gray-300">
                                </div>
                            @endif
                        </div>
                    </div>




                    @if ($tagEdito)
                        <p class="text-green-600">El usuario se actualizó correctamente</p>
                    @endif

                    <!-- Botón de guardar -->
                    <div class="flex flex-row justify-center">
                        <button type="submit"
                            class="w-1/2 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-6 py-3 transition duration-300 transform hover:scale-105 hover:shadow-md dark:border-blue-400 dark:text-blue-400 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-900">
                            Guardar cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
