
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full min-h-screen p-5 md:p-0 justify-center items-center bg-white dark:bg-slate-700 ">
    <!-- Columna Izquierda -->
    <div class="col-span-1 flex flex-col mx-auto mt-5 gap-5">
        <!-- Dropdown -->
        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
            class="text-white  w-fit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  rounded-lg text-sm px-5 py-2.5 font-semibold text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">Historial de Rentas<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4" />
            </svg>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdown"
            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                @foreach($rentals as $rental)
                <li>
                    <a href="#"
                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white rental-option"
                       data-start-date="{{ $rental['start_date'] }}"
                       data-end-date="{{ $rental['end_date'] }}">
                        {{ $rental['name'] }}
                    </a>
                </li>
            @endforeach
            </ul>
        </div>

        <!--DatePicker-->
        <div id="date-range-picker" date-rangepicker class="flex items-center mt-4">
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                    </svg>
                </div>
                <input id="datepicker-range-start" name="start" type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Fecha de Inicio" disabled>
            </div>
            <span class="mx-4 text-gray-500">hasta</span>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                    </svg>
                </div>
                <input id="datepicker-range-end" name="end" type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Fecha de Fin" disabled>
            </div>
        </div>
        

        <!--Grafica-->
        <div class="max-w-sm w-full mt-5 bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between">
                <div>
                    <h5 id="rental-days" class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">0</h5>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">Días Rentados</p>
                </div>
            </div>
            <div id="area-chart"></div>
        </div>
    </div>

    <!-- Columna Derecha -->
    <div class="col-span-1 h-fit md:w-[600px] mt-5 bg-white rounded-lg overflow-hidden border shadow-md dark:bg-slate-800 dark:border-slate-800  dark:shadow-md">
        <!-- Contenido -->
        <div class="bg-[#3563E9] px-4 py-2">
            <h2 class="text-lg font-semibold text-white">Comentarios Destacados</h2>
        </div>
        <div>
            <div class="w-full px-3 flex gap-4 bg-gray-100 dark:bg-gray-800">
                <div class="flex items-start pt-3 md:p-3 justify-center">
                    <img src="https://t4.ftcdn.net/jpg/02/15/84/43/360_F_215844325_ttX9YiIIyeaR7Ne6EaLLjMAmy4GvPC69.jpg"
                        alt="Foto Principal" class="w-20 h-20 object-cover rounded-md" />
                </div>
                <div class="flex flex-col w-full items-start">
                    <div class="flex flex-row gap-2 pt-1">
                        <p class="md:text-lg font-bold text-gray-800 dark:text-white">Jorge Bazán</p>
                        <p class="text-xs font-thin text-gray-600 dark:text-gray-400 self-end pb-1">28 DIC 2021 a las 6:57pm</p>
                    </div>
                    <p class="text-sm md:text-md text-gray-800 dark:text-gray-200">
                        Siento que lo que ofrece esta casa no lo vale por 10k mensuales, voy a rentar más cerca del Tec,
                        en una casa roja con portón negro. No mames ya me doxee, ¿cómo borro esto?
                    </p>
                </div>
            </div>
            <hr class="border-t border-gray-300 dark:border-gray-600">
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
                let currentMonth = start.getMonth();
                let currentYear = start.getFullYear();

                // Bucle para recorrer cada mes dentro del rango
                while (start <= end) {
                    let monthStart = new Date(start);
                    let monthEnd = new Date(start);
                    monthEnd.setMonth(monthEnd.getMonth() + 1);
                    monthEnd.setDate(0); 

                    // Limitar al rango de fechas
                    if (monthEnd > end) monthEnd = end;
                    const daysInMonth = Math.floor((monthEnd - monthStart) / (1000 * 60 * 60 * 24)) + 1;
                    monthsData.push({
                        month: monthStart.toLocaleString('default', { month: 'short' }), // Mes abreviado
                        days: daysInMonth
                    });

                    // Mover al siguiente mes
                    start.setMonth(start.getMonth() + 1);
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
