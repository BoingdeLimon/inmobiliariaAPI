<div class="p-6">
    <ul class="space-y-4">
        @foreach ($rentals as $rental)
            <li class="p-4 border rounded-lg flex justify-between items-center">

                <a href="{{ route('rental.show', $rental['id']) }}" class="flex flex-row bg-white shadow-md rounded-lg overflow-hidden max-w-5xl mx-auto ">
                        <div class="relative h-48 w-[30vw]">
                            <img src="{{ $rental['image'] }}" alt="Foto Principal" class="object-cover h-full w-full" />
                        </div>

                        <div class="p-5 flex flex-col justify-between w-[30vw]">
                            <div class="text-xl font-semibold text-gray-900 mb-2">
                                {{ $rental['price'] }} MXN
                            </div>
                            <div class="text-gray-700 text-sm">
                                {{ $rental['location'] }}
                            </div>
                            <div class="text-blue-500 text-sm">
                                {{ $rental['size'] }} metros cuadrados
                            </div>
                            <div class="flex gap-5 text-gray-600 text-sm">
                                <span>{{ $rental['bathrooms'] }} Baños</span>
                            </div>
                        </div>

                        <div>
                            <div class="flex space-x-2 p-5 justify-end w-[20vw]">
                                @foreach ($rental['amenities'] as $feature)
                                    <span
                                        class="bg-[#3563E9] text-white text-xs px-2 py-1 rounded-xl">{{ $feature }}</span>
                                @endforeach
                            </div>

                            <div class="flex justify-end space-x-4 mt-12 text-gray-600 p-5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>
                            </div>
                        </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>
