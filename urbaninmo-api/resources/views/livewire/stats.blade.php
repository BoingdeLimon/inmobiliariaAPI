<div
    class="min-h-screen w-full px-4 pt-5 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 flex justify-center items-center">
    <div class="grid gap-8 max-w-6xl w-full ">
        <!-- Dropdown + Date Picker -->
        <div
            class="flex flex-col items-center justify-center md:flex-row gap-6 bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="text-white md:w-4/6 w-[190px] h-[40px] bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm p-4 font-semibold text-center inline-flex justify-between items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">Historial de Rentas
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>

            <div id="dropdown"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow md:w-1/3 w-1/2 dark:bg-gray-700">
                <ul class="py-2 text-sm w-full text-gray-700 dark:text-gray-200"
                    aria-labelledby="dropdownDefaultButton">
                    @foreach ($rentals as $rental)
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white rental-option"
                                data-start-date="{{ $rental['rent_start'] }}" data-end-date="{{ $rental['rent_end'] }}"
                                data-name="{{ $rental['name'] }}">
                                {{ $rental['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="flex md:flex-row flex-col items-center gap-4">
                <input id="datepicker-range-start" name="start" type="text"
                    class="bg-gray-50 dark:bg-gray-800 border border-gray-300 text-gray-800 dark:text-gray-200 text-sm rounded-lg px-4 py-2"
                    placeholder="Fecha de Inicio" disabled>
                <span class="text-gray-500">a</span>
                <input id="datepicker-range-end" name="end" type="text"
                    class="bg-gray-50 dark:bg-gray-800 border border-gray-300 text-gray-800 dark:text-gray-200 text-sm rounded-lg px-4 py-2"
                    placeholder="Fecha de Fin" disabled>
            </div>
        </div>

        <!-- Gráfica -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
            <h3 class="text-2xl font-bold mb-4">Gráfica de Días Rentados</h3>
            <div id="area-chart" class="h-64"></div>
        </div>

        <div
            class="bg-white grid grid-cols-1 h-80 overflow-y-auto  dark:bg-gray-800 rounded-xl space-y-4 shadow-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Comentarios</h3>

         
            @foreach ($rentals as $rental)
            @foreach ($rental->comments as $comment)
                <div
                    class="md:flex-row flex items-center flex-col h-auto  md:items-start gap-4 bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                    <img src="{{ $comment->user_photo ? asset('storage/photos/' . $comment->user_photo) : asset('img/default.jpg') }}" alt="Foto"  class="w-16 h-16 rounded-full">
                    <div class="w-full flex flex-col  md:flexrow ">
                        <div class="flex flex-col md:flex-row md:justify-between items-center">
                            <p class="text-sm font-semibold">
                                {{ $comment->user_name }}
                                <span class="text-gray-500">
                                    {{ $comment->created_at->diffForHumans() }}
                                </span>
                            </p>
                            <div class="flex gap-2 ">

                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $comment->rating)
                                        <svg class="w-4 h-4 text-yellow-500" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.392 2.46a1 1 0 00-.364 1.118l1.286 3.97c.3.921-.755 1.688-1.54 1.118l-3.392-2.46a1 1 0 00-1.176 0l-3.392 2.46c-.784.57-1.838-.197-1.54-1.118l1.286-3.97a1 1 0 00-.364-1.118L2.049 9.397c-.783-.57-.38-1.81.588-1.81h4.18a1 1 0 00.95-.69l1.286-3.97z" />
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.392 2.46a1 1 0 00-.364 1.118l1.286 3.97c.3.921-.755 1.688-1.54 1.118l-3.392-2.46a1 1 0 00-1.176 0l-3.392 2.46c-.784.57-1.838-.197-1.54-1.118l1.286-3.97a1 1 0 00-.364-1.118L2.049 9.397c-.783-.57-.38-1.81.588-1.81h4.18a1 1 0 00.95-.69l1.286-3.97z" />
                                        </svg>
                                    @endif
                                @endfor
                            </div>

                        </div>
                        <p class="text-gray-700 md:pr-60 dark:text-gray-300 text-sm">
                            {{ $comment->comment }}
                        </p>
                    </div>
                </div>
            @endforeach
        @endforeach



        </div>

    </div>
</div>


<script>
    // Actualizar el texto del botón
    document.querySelectorAll('.rental-option').forEach(option => {
        option.addEventListener('click', function() {
            const rentalName = this.getAttribute('data-name');
            const button = document.getElementById('dropdownDefaultButton');
            button.textContent = rentalName;
        });
    });
    // render del chart
    document.addEventListener('DOMContentLoaded', () => {
        const rentalOptions = document.querySelectorAll('.rental-option');
        const startDateInput = document.getElementById('datepicker-range-start');
        const endDateInput = document.getElementById('datepicker-range-end');

        // Prevenir la edición directamente en los campos de fecha
        startDateInput.setAttribute('readonly', true);
        endDateInput.setAttribute('readonly', true);

        // Inicializar la gráfica de ApexCharts
        const chart = new ApexCharts(document.querySelector("#area-chart"), {
            chart: {
                type: 'area',
                height: 350
            },
            series: [{
                name: 'Rentals',
                data: [] // Comienza sin datos
            }],
            xaxis: {
                categories: [] // Comienza sin categorías
            },
            yaxis: {
                min: 0,
                max: 40,
                tickAmount: 4
            }
        });

        chart.render();

        rentalOptions.forEach(option => {
            option.addEventListener('click', (e) => {
                e.preventDefault();

                startDateInput.value = '';
                endDateInput.value = '';

                const startDate = option.getAttribute('data-start-date');
                const endDate = option.getAttribute('data-end-date');

                startDateInput.value = startDate;
                endDateInput.value = endDate;

                // Convertir las fechas de string a objeto Date
                const start = new Date(startDate);
                const end = new Date(endDate);

                // Calcular la cantidad de días de renta (total)
                const daysCount = Math.floor((end - start) / (1000 * 60 * 60 * 24)) + 1;

                // Función para dividir los días entre los meses
                const getDaysPerMonth = (start, end) => {
                    let monthsData = [];
                    let current = new Date(start); // Copia de la fecha inicial

                    while (current <= end) {
                        // Definir el primer y último día del mes actual
                        let monthStart = new Date(current.getFullYear(), current.getMonth(),
                            1);
                        let monthEnd = new Date(current.getFullYear(), current.getMonth() +
                            1, 0);

                        // Asegurarse de no exceder el rango de fechas
                        if (monthStart < start) monthStart = new Date(start);
                        if (monthEnd > end) monthEnd = new Date(end);

                        const daysInMonth = Math.floor((monthEnd - monthStart) / (1000 *
                            60 * 60 * 24)) + 1;

                        monthsData.push({
                            month: monthStart.toLocaleString('default', {
                                month: 'short'
                            }),
                            days: daysInMonth
                        });

                        // Avanzar al siguiente mes
                        current.setMonth(current.getMonth() + 1);
                    }

                    return monthsData;
                };

                // Obtener los datos de días por mes
                const monthsData = getDaysPerMonth(new Date(startDate), new Date(endDate));

                // Obtener los meses y días para actualizar la gráfica
                const months = monthsData.map(data => data.month);
                const days = monthsData.map(data => data.days);

                // Actualizar la gráfica con los datos de cada mes
                chart.updateOptions({
                    series: [{
                        name: 'Rentals',
                        data: days
                    }],
                    xaxis: {
                        categories: months
                    }
                });

                const rentalDaysElement = document.getElementById('rental-days');
                rentalDaysElement.textContent = daysCount;
            });
        });
    });



    document.addEventListener('DOMContentLoaded', () => {
        const rentalOptions = document.querySelectorAll('.rental-option');
        const startDateInput = document.getElementById('datepicker-range-start');
        const endDateInput = document.getElementById('datepicker-range-end');
        const dropdownMenu = document.getElementById('dropdown');
        const dropdownButton = document.getElementById('dropdownDefaultButton');

        // Prevenir la edición directamente
        startDateInput.addEventListener('keydown', (e) => e.preventDefault());
        endDateInput.addEventListener('keydown', (e) => e.preventDefault());

        // Manejo del click en las opciones de alquiler
        rentalOptions.forEach(option => {
            option.addEventListener('click', (e) => {
                e.preventDefault();

                // Limpia los campos antes de asignar nuevos valores
                startDateInput.value = '';
                endDateInput.value = '';

                const startDate = option.getAttribute('data-start-date');
                const endDate = option.getAttribute('data-end-date');

                // Rellena los campos del datepicker
                startDateInput.value = startDate;
                endDateInput.value = endDate;
            });
        });

    });
</script>
