<div id="controls-carousel" class="relative w-11/12" data-carousel="static">
    <div class="relative h-64 overflow-hidden rounded-lg md:h-96">
        <div class="flex transition-transform duration-700 ease-in-out" id="carouselItems">
            @foreach ($images as $index => $image)
                <div class="flex-none w-full md:w-1/2 p-2" data-carousel-item>
                    <img src="{{ asset('imgs/' . $image["photo"]) }}" class="w-full h-auto object-cover" alt="Imagen {{ $index + 1 }}">
                </div>
            @endforeach
        </div>
    </div>

    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-700 dark:bg-gray-400 group-hover:bg-white/50 dark:group-hover:bg-gray-400 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>

    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-700 dark:bg-gray-400 role="status" class="space-y-8 animate-pulse md:space-y-0 md:space-x-8 rtl:space-x-reverse md:flex md:items-center  group-hover:bg-white/50 dark:group-hover:bg-gray-800 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
    
</div>
