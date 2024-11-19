
<div>
    <h2 class="text-2xl font-bold mb-4">User List</h2>
    <table class=" min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b">Photo</th>
                <th class="px-4 py-2 border-b">Name</th>
                <th class="px-4 py-2 border-b">Email</th>
                <th class="px-4 py-2 border-b">Phone</th>
                <th class="px-4 py-2 border-b">Role</th>
                <th class="px-4 py-2 border-b">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="border-b hover:bg-gray-100 justify-center align-middle">
                    <td class="px-4 py-2">
                        <img src="{{ $user->photo ? asset($user->photo) : asset('img/default.jpg') }}" alt="{{ $user->name }}'s Photo" class="w-12 h-12 rounded-full object-cover">
                    </td>
                    <td class="px-4 py-2 justify-center">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">{{ $user->phone }}</td>
                    <td class="px-4 py-2">{{ $user->role }}</td>
                    <td class="px-4 py-2 flex flex-row justify-evenly">
                        @livewire('editar-usuarios-modal' , ['user' => $user])
                        
                        
                        <button wire:click="borrar({{ $user->id }})" wire:confirm="¿Esta seguro? Esta acción es irreversible" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                           Eliminar
                        </button>
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

