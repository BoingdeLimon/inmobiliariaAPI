<div>
   <div class="md:ml-64 sm:ml-auto max-w-screen-lg px-4 py-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach ($rentals as $rental)
         <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <img src="{{ $rental->photos->first() ? 
            asset('storage/photos/'.$rental->photos->first()->photo) 
            
            : asset('img/defaultRental.jpg') }}" alt="{{ $rental->title }} Photo" class="rounded-t-lg">
            <div class="p-5">
               <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $rental->title }}</h5>
               <h3 class="mb-2 text-lg text-gray-900 dark:text-white">{{ $rental->type }}</h3>
               <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $rental->description }}</p>
               <p class="text-sm text-gray-600 dark:text-gray-400">Size: {{ $rental->size }} m²</p>
               <p class="text-sm text-gray-600 dark:text-gray-400">Rooms: {{ $rental->rooms }}</p>
               <p class="text-sm text-gray-600 dark:text-gray-400">Bathrooms: {{ $rental->bathrooms }}</p>
               <p class="text-sm text-gray-600 dark:text-gray-400">Price: ${{ number_format($rental->price, 2) }}</p>
               <p class="text-sm text-gray-600 dark:text-gray-400">Location: {{ $rental->address->address }}, {{ $rental->address->city }}, {{ $rental->address->state }}</p>
               <button wire:click="borrar({{$rental->id}})" class="mt-3 text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                  Borrar
               </button>
               <button class="mt-3 ml-2 text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900">
                  Editar
               </button>
            </div>
         </div>
      @endforeach
   </div>
</div>