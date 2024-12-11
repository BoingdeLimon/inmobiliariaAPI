<div
    class="min-h-screen p-6 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 flex justify-center items-center">
    <div class="grid gap-8 max-w-6xl w-full">
        <!-- Dropdown + Date Picker -->
        <div
            class="flex flex-col items-center justify-center md:flex-row gap-6 bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">
            <div class="flex  w-full ">

                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                    class="text-white  w-4/6 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  rounded-lg text-sm text- p-4 font-semibold text-center inline-flex justify-between items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">Historial de Rentas
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                </button>

                <div id="dropdown"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-3/12 dark:bg-gray-700">

                    <ul class="py-2 text-sm w-full text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownDefaultButton">
                        {{-- @foreach ($rentals as $rental)
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white rental-option"
                                    data-start-date="{{ $rental['rent_start'] }}"
                                    data-end-date="{{ $rental['rent_end'] }}">
                                    {{ $rental['name'] }}
                                </a>
                            </li>
                        @endforeach --}}
                    </ul>

                </div>
            </div>

            <div class="flex items-center gap-4">
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

        <!-- Comentarios -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Comentarios Destacados</h3>
            <div class="flex items-start gap-4 bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                <img src="https://t4.ftcdn.net/jpg/02/15/84/43/360_F_215844325_ttX9YiIIyeaR7Ne6EaLLjMAmy4GvPC69.jpg"
                    alt="Foto" class="w-16 h-16 rounded-full">
                <div>
                    <p class="text-sm font-semibold">Jorge Bazán <span class="text-gray-500">- 28 DIC 2021</span></p>
                    <p class="text-gray-700 dark:text-gray-300 text-sm">Siento que lo que ofrece esta casa no lo vale
                        por 10k mensuales...</p>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
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
