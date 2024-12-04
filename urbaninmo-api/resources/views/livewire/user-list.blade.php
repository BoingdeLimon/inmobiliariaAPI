
<div class="max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">User List</h2>
        <div class="overflow-hidden rounded-lg border bg-white shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <thead class="bg-blue-600 text-xs font-semibold uppercase tracking-widest text-white dark:bg-blue-900">
                        <tr>
                            <th class="px-2 py-3 text-left sm:px-5">Photo</th>
                            <th class="px-2 py-3 text-left sm:px-5">Name</th>
                            <th class="px-2 py-3 text-left sm:px-5">Email</th>
                            <th class="px-2 py-3 text-left sm:px-5">Phone</th>
                            <th class="px-2 py-3 text-left sm:px-5">Role</th>
                            <th class="px-2 py-3 text-left sm:px-5">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-gray-700 dark:divide-gray-700 dark:text-gray-300">
                        @foreach ($users as $user)
                            <tr class="border-b hover:bg-gray-100 dark:border-gray-700 dark:hover:bg-gray-700 justify-center align-middle">
                                <td class="px-4 py-2">
                                    <img src="{{ $user->photo ? asset($user->photo) : asset('img/default.jpg') }}" 
                                        alt="{{ $user->name }}'s Photo" 
                                        class="w-12 h-12 rounded-full object-cover border border-gray-300 dark:border-gray-600">
                                </td>
                                <td class="px-4 py-2 justify-center text-gray-900 dark:text-gray-300">{{ $user->name }}</td>
                                <td class="px-4 py-2 text-gray-900 dark:text-gray-300">{{ $user->email }}</td>
                                <td class="px-4 py-2 text-gray-900 dark:text-gray-300">{{ $user->phone }}</td>
                                <td class="px-4 py-2 text-gray-900 dark:text-gray-300">{{ $user->role }}</td>
                                <td class="px-4 py-2 flex flex-row justify-evenly">
                                    @livewire('editar-usuarios-modal', ['user' => $user])

                                    <button wire:click="borrar({{ $user->id }})" 
                                            wire:confirm="¿Esta seguro? Esta acción es irreversible" 
                                            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>


