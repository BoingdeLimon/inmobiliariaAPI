<div class="w-full shadow-md dark:shadow-lg rounded-lg transition-all duration-300 hover:shadow-2xl dark:hover:shadow-gray-700">
    <form wire:submit.prevent="submit"
        class="w-full grid grid-cols-1 gap-4 bg-white dark:bg-gray-800 shadow-xl rounded-lg p-6 transition-all duration-300 hover:shadow-2xl">
        <h3 class="text-lg font-bold dark:text-gray-200">Contáctame</h3>

        <div>
            <label class="block font-bold dark:text-gray-200">Nombre</label>
            <input type="text" wire:model="name" placeholder="Escribe tu nombre"
                class="border rounded p-2 w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" />
            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block font-bold dark:text-gray-200">Email</label>
            <input type="email" wire:model="email" placeholder="Escribe tu email"
                class="border rounded p-2 w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" />
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block font-bold dark:text-gray-200">Teléfono</label>
            <input type="text" wire:model="phone" placeholder="Escribe tu teléfono"
                class="border rounded p-2 w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" />
            @error('phone')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block font-bold dark:text-gray-200">Mensaje</label>
            <textarea wire:model="message" placeholder="Escribe tu mensaje" rows="3"
                class="border rounded p-2 w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"></textarea>
            @error('message')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white rounded p-2 hover:bg-blue-700">Enviar</button>

        <button type="button"
        <button onclick="window.open('https://wa.me/' + {{$phoneRental}} + '?text=Hola,%20estoy%20interesado%20en%20la%20renta%20de%20la%20casa.', '_blank')"
            class="bg-green-500 text-white rounded p-2 hover:bg-green-600">WhatsApp</button>

        <button type="button" onclick="window.open('/rental/{{ $rental_id }}/pdf', '_blank')"
            class="bg-red-500 text-white rounded p-2 hover:bg-red-600">Descargar PDF</button>

        <label class="text-[10px] text-center dark:text-gray-400">
            **Al enviar estás aceptando los Términos y condiciones de Uso y la Política de Privacidad.
        </label>
    </form>
</div>
