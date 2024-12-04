<div class="relative flex  w-full">
    <input type="text" 
           wire:model.throttle.125ms="search" 
           wire:keydown="applySearch" 
           placeholder="Buscar..." 
           class="text-lg w-full bg-white dark:bg-gray-900 dark:border-gray-700 text-black dark:text-gray-300 rounded-lg">

    <!-- Icono de búsqueda -->
    <span class="absolute inset-y-0 right-0 flex items-center pr-2 text-black hover:text-gray-400">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
    </span>

    <!-- Dropdown-->
    @if($search && $realEstates->isNotEmpty())
    <div class="absolute w-full mt-12 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded-lg shadow-lg max-h-60 overflow-y-auto z-10">
        @foreach($realEstates as $realEstate)
        <div wire:click="redirectToRental({{ $realEstate->id }})" 
            class="px-4 py-2 flex gap-2 text-black dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 cursor-pointer">
           <div>{{ $realEstate->title }}</div>
           <div class="text-gray-500">{{ $realEstate->address->city }}</div>
       </div>
        @endforeach
    </div>
    @elseif($search)
    <!-- Si no hay resultados-->
    <div class="absolute w-full mt-12 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded-lg shadow-lg max-h-60 overflow-y-auto z-10">
        <div class="px-4 py-2 text-gray-700 dark:text-gray-300">No se encontraron resultados.</div>
    </div>
    @endif
</div>
