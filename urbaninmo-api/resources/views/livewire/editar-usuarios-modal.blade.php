<div>
    <button wire:click="openModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->phone }}', '{{ $user->role }}', '{{ $user->photo }}')"
        class="text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900">
        Editar
    </button>

    @if ($isModalOpen)
        <div wire:click.self="closeModal"
            class="fixed inset-0 flex items-center justify-center h-screen bg-gray-900 bg-opacity-50 z-50">
            <div
                class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-11/12 md:w-5/12 h-5/6 overflow-y-scroll scrollbar-hide">
                <form wire:submit.prevent="editarUsuario" class="p-4 space-y-6" enctype="multipart/form-data">
                    <p class="font-medium text-gray-900 dark:text-white text-xl text-left w-10/12">Editar usuario</p>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="name" class="text-md text-gray-900 dark:text-white text-left w-1/4">Nombre:</label>
                        <input type="text" id="name" wire:model='name'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="email" class="text-md text-gray-900 dark:text-white text-left w-1/4">Email:</label>
                        <input type="email" id="email" wire:model='email'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="phone" class="text-md text-gray-900 dark:text-white text-left w-1/4">Teléfono:</label>
                        <input type="text" id="phone" wire:model='phone'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="role" class="text-md text-gray-900 dark:text-white text-left w-1/4">Rol:</label>
                        <input type="text" id="role" wire:model='role'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>

                    <div class="flex items-center mb-4 space-x-4">
                        <label for="photo" class="text-md text-gray-900 dark:text-white text-left w-1/4">Foto:</label>
                        <input type="file" id="photo" wire:model='photo'
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    @if($tagEdito)
                    <p class="text-green-600 ">El usuario se actualizo correctamente</p>
                    @endif
                    <div class="flex flex-row justify-center">
                        <button type="submit"
                            class="w-1/2 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-400 dark:text-blue-400 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-900">
                            Guardar cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
