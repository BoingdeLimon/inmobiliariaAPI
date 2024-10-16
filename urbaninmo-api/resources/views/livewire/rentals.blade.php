<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Lista de Rentas</h1>
    <ul class="space-y-4">
        @foreach ($rentals as $rental)
            <li class="p-4 border rounded-lg flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold">{{ $rental['location'] }}</h2>
                    <p class="text-gray-600">{{ $rental['price'] }}</p>
                </div>
                <a 
                href="{{ route('rental.show', $rental['id']) }}"
                
                class="bg-blue-600 text-white px-4 py-2 rounded">Ver
                    Detalles</a>
            </li>
        @endforeach
    </ul>
</div>
