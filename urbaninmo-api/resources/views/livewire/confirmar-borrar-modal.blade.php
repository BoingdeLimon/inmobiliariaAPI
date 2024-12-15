<div>
    <button wire:click="openModal({{ $user->id }}, '{{ $user->name }}')"
        class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
        Eliminar
    </button>

    @if ($isModalOpen)
        <div wire:click.self="closeModal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 dark:bg-opacity-80">
            <div class="bg-white rounded-lg shadow-lg w-96 p-6 dark:bg-gray-800">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Eliminar usuario</h2>
                <p class="mt-4 text-gray-600 dark:text-gray-400">¿Está seguro que quiere eliminar a {{$user->name }}?. Esta acción es irreversible</p>
                @if($tagBorrado)
                    <p class="text-green-600 ">El usuario se actualizo correctamente</p>
                @endif
                <div class="mt-6 flex justify-end space-x-4">
                    <button
                        wire:click="closeModal"
                        class="px-4 py-2 text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-200 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700"
                    >
                        Cancelar
                    </button>
                    <button
                        wire:click="eliminarUsuario"
                        class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-800"
                    >
                        Borrar
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
