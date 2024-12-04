<div>
    <button wire:click="openModal"
        class="w-full px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-lg shadow-md hover:shadow-lg hover:from-blue-600 hover:to-blue-800 focus:outline-none transition-transform duration-300 ease-in-out transform hover:scale-95">
        Calificar y Comentar
    </button>

    @if ($isModalOpen)
        <div wire:click.self="closeModal"
            class="fixed inset-0 flex items-center justify-center h-screen bg-gray-900 bg-opacity-50 z-50">

            <button wire:click="closeModal" class="fixed top-4 right-4 text-gray-300 hover:text-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div
                class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-2xl w-11/12 md:w-2/5 h-auto overflow-y-auto max-h-[80%] relative">
                <h1 class="text-xl font-bold text-gray-800 dark:text-white mb-6 text-center">
                    {{ $title_rental }}
                </h1>
                <form wire:submit.prevent="submitComment">
                    <div class="mb-6">
                        <label for="comment" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Comentario:
                        </label>
                        <textarea id="comment" wire:model="comment"
                            class="w-full px-4 py-2 mt-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300 dark:bg-gray-900 dark:border-gray-700 transition"></textarea>
                        @error('comment') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <label for="rating" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Calificación:
                        </label>
                        <div class="flex items-center mt-2">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg wire:click="setRating({{ $i }})"
                                    class="w-8 h-8 cursor-pointer transition-transform duration-300 hover:scale-110 {{ $rating >= $i ? 'text-yellow-500' : 'text-gray-300' }}"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.957a1 1 0 00.95.69h4.162c.969 0 1.371 1.24.588 1.81l-3.37 2.448a1 1 0 00-.364 1.118l1.286 3.957c.3.921-.755 1.688-1.54 1.118l-3.37-2.448a1 1 0 00-1.175 0l-3.37 2.448c-.784.57-1.838-.197-1.54-1.118l1.286-3.957a1 1 0 00-.364-1.118L2.465 9.384c-.783-.57-.38-1.81.588-1.81h4.162a1 1 0 00.95-.69l1.286-3.957z" />
                                </svg>
                            @endfor
                        </div>
                        @error('rating') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="w-full p-2 bg-gradient-to-r from-green-400 to-green-600 text-white font-semibold rounded-lg shadow-md hover:from-green-500 hover:to-green-700 focus:outline-none transition-transform duration-300 ease-in-out transform hover:scale-105">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
