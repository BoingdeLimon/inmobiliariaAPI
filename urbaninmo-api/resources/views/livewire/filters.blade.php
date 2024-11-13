<div class="grid grid-cols-1 md:grid-cols-5 w-auto mx-auto mt-2 gap-3 md:gap-2">
    {{-- Estado --}}
    <select wire:model="state"
        class="flex items-center w-[220px] border-gray-300 dark:border-gray-600 h-10 rounded-md dark:bg-gray-800 dark:text-white overflow-hidden">
        <option value="" selected>Estado</option>
        @foreach ($estadosDeMexico as $stateOption)
            <option value="{{ $stateOption }}">{{ $stateOption }}</option>
        @endforeach
    </select>

    {{-- Tipo --}}
    <select wire:model="type"
        class="flex items-center w-[220px]  border-gray-300 dark:border-gray-600 h-10 rounded-md dark:bg-gray-800 dark:text-white">
        <option value="" selected>Tipo</option>
        @foreach ($tiposDeRealEstate as $tipo)
            <option value="{{ $tipo }}">{{ $tipo }}</option>
        @endforeach
    </select>

    {{-- Precio --}}
    <div class="flex items-center w-[220px] border-gray-300 dark:border-gray-600 h-10 rounded-md dark:bg-gray-800 dark:text-white overflow-hidden" id="precio-container">
        <button class="w-[220px] flex items-center h-10 dark:bg-gray-800 dark:text-white"
            onclick="toggleDropdown('precio-dropdown')">
            <span class="ml-4">Precio</span>
            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.5 7.5l4.5 4 4.5-4 .7.7-5.2 4.8-5.3-4.8.8-.7z"></path>
            </svg>
        </button>
        <div id="precio-dropdown"
            class="hidden w-[220px] p-2 bg-white dark:bg-gray-800 dark:text-white shadow-lg rounded-md dark:border-gray-600 absolute z-50 mt-2">
            <div class="flex space-x-2">
                <div class="flex flex-col">
                    <label class="text-sm text-gray-600 dark:text-gray-400 mb-1">Desde</label>
                    <input type="text" placeholder="0" wire:model="min_price"
                        class="w-full h-10 bg-white dark:bg-gray-700 dark:text-white rounded"
                        oninput="updatePrice(event, this)" />
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-gray-600 dark:text-gray-400 mb-1">Hasta</label>
                    <input type="text" placeholder="0" wire:model="max_price"
                        class="w-full h-10 bg-white dark:bg-gray-700 dark:text-white rounded"
                        oninput="updatePrice(event, this)" />
                </div>
            </div>
        </div>
    </div>

    {{-- Más Filtros --}}
    <div class="flex items-center w-[220px] border-gray-300 dark:border-gray-600 h-10 rounded-md dark:bg-gray-800 dark:text-white overflow-hidden" id="mas-filtros-container">
        <button type="button"
            class="flex items-center w-[220px] border-gray-300 dark:border-gray-600 h-10 rounded-md dark:bg-gray-800 dark:text-white"
            onclick="toggleDropdown('mas-filtros-dropdown')">
            <span class="ml-4">Más filtros</span>
            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.5 7.5l4.5 4 4.5-4 .7.7-5.2 4.8-5.3-4.8.8-.7z"></path>
            </svg>
        </button>
        <div id="mas-filtros-dropdown"
            class="hidden w-[220px] p-4 space-y-4 bg-white dark:bg-gray-800 dark:text-white shadow-lg rounded-md dark:border-gray-600 absolute z-50 mt-2">

            {{-- Baños --}}
            <div class="flex flex-col space-y-2">
                <span class="text-sm font-medium text-gray-700 dark:text-gray-400">Baños</span>
                <div class="flex justify-between border rounded-md p-1 dark:border-gray-600">
                    @for ($i = 1; $i <= 5; $i++)
                        <button type="button" class="px-2" 
                            onclick="handleFilterChange('bathrooms', {{ $i }}, this)"
                            wire:click="$set('bathrooms', {{ $i }})">
                            {{ $i }}
                        </button>
                    @endfor
                </div>
            </div>

            {{-- Habitaciones --}}
            <div class="flex flex-col space-y-2">
                <span class="text-sm font-medium text-gray-700 dark:text-gray-400">Habitaciones</span>
                <div class="flex justify-between border rounded-md p-1 dark:border-gray-600">
                    @for ($i = 1; $i <= 5; $i++)
                        <button type="button" class="px-2" 
                            onclick="handleFilterChange('rooms', {{ $i }}, this)"
                            wire:click="$set('rooms', {{ $i }})">
                            {{ $i }}
                        </button>
                    @endfor
                </div>
            </div>
        </div>
    </div>

    {{-- Botón de Aplicar Filtros --}}
    <button wire:click="applyFilters"
        class="w-[220px] z-40 relative bg-black text-white h-10 rounded-md dark:bg-white dark:text-black dark:hover:bg-gray-400">
        Aplicar / Limpiar
    </button>
</div>

<script>
    function toggleDropdown(id) {
        document.getElementById(id).classList.toggle('hidden');
    }

    // Logica para formato de comas en price
    function updatePrice(event, input) {
        let value = input.value.replace(/,/g, '');
        if (isNaN(value)) return;
        const formatted = new Intl.NumberFormat().format(value);
        input.value = formatted;
        handleFilterChange(event);
    }

    // Función para el dropdown
    function toggleDropdown(dropdownId) {
        const dropdown = document.getElementById(dropdownId);
        dropdown.classList.toggle('hidden');
    }

    // Cerrar dropdowns con clicks
    function closeDropdowns(event) {
        const dropdowns = document.querySelectorAll('.relative');
        dropdowns.forEach(dropdown => {
            const dropdownMenu = dropdown.querySelector('.absolute');
            if (dropdownMenu && !dropdown.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    }
    document.addEventListener('click', closeDropdowns);

    // Colores al
    function handleFilterChange(filterType, value, button) {
        const buttons = button.parentElement.getElementsByTagName('button');
        for (let btn of buttons) {
            btn.classList.remove('bg-gray-300'); 
            btn.classList.remove('rounded-md');
            btn.classList.add('bg-transparent');
        }
        button.classList.remove('bg-transparent'); 
        button.classList.add('bg-gray-300'); 
        button.classList.add('rounded-md'); 
    }


</script>
