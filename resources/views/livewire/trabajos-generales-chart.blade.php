<div class="flex flex-wrap">
    <div class="w-full sm:w-1/2 p-4">
        <div class="bg-white p-4 rounded-lg shadow-lg text-center">
            <h2 class="text-lg font-semibold mb-4">Trabajos por Mes (Gráfico de Barras)</h2>
            <canvas id="trabajosPorMesChart"></canvas>
        </div>
    </div>

    <div class="w-full sm:w-1/2 p-4">
        <div class="bg-white p-4 mt-4 rounded-lg shadow-lg text-center">
            <h2 class="text-lg font-semibold mb-4">Trabajos por Día (Gráfico de Barras)</h2>
            <canvas id="trabajosPorDiaChart"></canvas>
        </div>
    </div>

    <div class="w-full sm:w-1/2 p-4">
        <div class="bg-white p-4 mt-4 rounded-lg shadow-lg text-center">
            <h2 class="text-lg font-semibold mb-4">Trabajos por Mes (Gráfico de Torta)</h2>
            <canvas id="trabajosPorMesTortaChart"></canvas>
        </div>
    </div>

    <div class="w-full sm:w-1/2 p-4">
        <div class="bg-white p-4 mt-4 rounded-lg shadow-lg text-center">
            <h2 class="text-lg font-semibold mb-4">Trabajos por Dependencia (Gráfico de Torta)</h2>
            <canvas id="trabajosPorDependenciaTortaChart"></canvas>
        </div>
    </div>

    <div class="w-full p-4">
        <div class="bg-white p-4 mt-4 rounded-lg shadow-lg text-center">
            <h2 class="text-lg font-semibold mb-4">Notificaciones por Usuario (Gráfico de Torta)</h2>
            <canvas id="notificacionesPorUsuarioTortaChart"></canvas>
        </div>
    </div>
</div>


<script>
    // Gráfico de barras para trabajos por mes
    var ctxPorMes = document.getElementById('trabajosPorMesChart').getContext('2d');
    var chartPorMes = new Chart(ctxPorMes, {
        type: 'bar',
        data: {
            labels: @json($dataPorMes->pluck('label')),
            datasets: [{
                label: 'Trabajos por Mes',
                data: @json($dataPorMes->pluck('total')),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Gráfico de barras para trabajos por día
    var ctxPorDia = document.getElementById('trabajosPorDiaChart').getContext('2d');
    var chartPorDia = new Chart(ctxPorDia, {
        type: 'bar',
        data: {
            labels: @json($dataPorDia->pluck('label')),
            datasets: [{
                label: 'Trabajos por Día',
                data: @json($dataPorDia->pluck('total')),
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Gráfico de torta para trabajos por mes
    var ctxPorMesTorta = document.getElementById('trabajosPorMesTortaChart').getContext('2d');
    var chartPorMesTorta = new Chart(ctxPorMesTorta, {
        type: 'pie',
        data: {
            labels: @json($dataPorMes->pluck('label')),
            datasets: [{
                data: @json($dataPorMes->pluck('total')),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        }
    });

</script>

<script>
    // Datos de los trabajos por dependencia
    var dataPorDependencia = @json($dataPorDependencia);

    // Extraer las etiquetas y los totales
    var labelsPorDependencia = dataPorDependencia.map(function(item) {
        return item.label;
    });

    var totalesPorDependencia = dataPorDependencia.map(function(item) {
        return item.total;
    });

    // Colores personalizados para el gráfico de torta
    var customColors = [
        'rgba(255, 99, 132, 0.6)',
        'rgba(54, 162, 235, 0.6)',
        'rgba(255, 206, 86, 0.6)',
        'rgba(75, 192, 192, 0.6)',
        'rgba(153, 102, 255, 0.6)',
        'rgba(255, 159, 64, 0.6)',
        'rgba(255, 0, 0, 0.6)',
        'rgba(0, 255, 0, 0.6)',
        'rgba(0, 0, 255, 0.6)'
    ];

    // Gráfico de torta para trabajos por dependencia
    var ctxPorDependenciaTorta = document.getElementById('trabajosPorDependenciaTortaChart').getContext('2d');
    var chartPorDependenciaTorta = new Chart(ctxPorDependenciaTorta, {
        type: 'pie',
        data: {
            labels: labelsPorDependencia,
            datasets: [{
                data: totalesPorDependencia,
                backgroundColor: customColors.slice(0, labelsPorDependencia.length),
                borderColor: customColors.slice(0, labelsPorDependencia.length),
                borderWidth: 1
            }]
        }
    });
</script>

<script>
    // Datos de notificaciones por usuario
    var datosPorUsuario = @json($datosPorUsuario);

    // Extraer las etiquetas (nombres de usuario) y los totales
    var etiquetasPorUsuario = datosPorUsuario.map(function(item) {
        return item.usuario;
    });

    var totalesPorUsuario = datosPorUsuario.map(function(item) {
        return item.total;
    });

    // Colores personalizados para el gráfico de torta
    var customColors = [
        'rgba(255, 99, 132, 0.6)',
        'rgba(54, 162, 235, 0.6)',
        'rgba(255, 206, 86, 0.6)',
        'rgba(75, 192, 192, 0.6)',
        'rgba(153, 102, 255, 0.6)',
    ];

    // Gráfico de torta para notificaciones por usuario
    var ctxTorta = document.getElementById('notificacionesPorUsuarioTortaChart').getContext('2d');
    var chartTorta = new Chart(ctxTorta, {
        type: 'pie',
        data: {
            labels: etiquetasPorUsuario,
            datasets: [{
                data: totalesPorUsuario,
                backgroundColor: customColors.slice(0, etiquetasPorUsuario.length),
                borderColor: customColors.slice(0, etiquetasPorUsuario.length),
                borderWidth: 1
            }]
        }
    });
</script>





{{--
<script>
    // Datos de notificaciones por usuario
    var datosPorUsuario = @json($datosPorUsuario);

    // Extraer las etiquetas (nombres de usuario) y los totales
    var etiquetasPorUsuario = datosPorUsuario.map(function(item) {
        return item.usuario;
    });

    var totalesPorUsuario = datosPorUsuario.map(function(item) {
        return item.total;
    });

    // Colores personalizados para el gráfico de barras
    var customColors = [
        'rgba(255, 99, 132, 0.6)',
        'rgba(54, 162, 235, 0.6)',
        'rgba(255, 206, 86, 0.6)',
        'rgba(75, 192, 192, 0.6)',
        'rgba(153, 102, 255, 0.6)',
    ];

    // Gráfico de barras para notificaciones por usuario
    var ctxBar = document.getElementById('notificacionesPorUsuarioBarChart').getContext('2d');
    var chartBar = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: etiquetasPorUsuario,
            datasets: [{
                label: 'Notificaciones por Usuario',
                data: totalesPorUsuario,
                backgroundColor: customColors,
                borderColor: customColors,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
 --}}



{{--  <script>
    // Datos de notificaciones por usuario
    var nombresUsuarios = @json($nombresUsuarios);
    var totalesPorUsuario = @json($totalesPorUsuario);

    // Colores personalizados para el gráfico de torta
    var customColors = [
        'rgba(255, 99, 132, 0.6)',
        'rgba(54, 162, 235, 0.6)',
        'rgba(255, 206, 86, 0.6)',
        'rgba(75, 192, 192, 0.6)',
        'rgba(153, 102, 255, 0.6)',
        'rgba(255, 159, 64, 0.6)'
    ];

    // Gráfico de torta para notificaciones por usuario
    var ctxTorta = document.getElementById('notificacionesPorUsuarioTortaChart').getContext('2d');
    var chartTorta = new Chart(ctxTorta, {
        type: 'pie',
        data: {
            labels: nombresUsuarios,
            datasets: [{
                data: totalesPorUsuario,
                backgroundColor: customColors.slice(0, nombresUsuarios.length),
                borderColor: customColors.slice(0, nombresUsuarios.length),
                borderWidth: 1
            }]
        }
    });
</script>--}}

{{-- <script>
    var nombresUsuarios = @json($nombresUsuarios);
    var totalesNotificaciones = @json($totalesNotificaciones);

    var ctx = document.getElementById('notificacionesPorUsuarioChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: nombresUsuarios,
            datasets: [{
                data: totalesNotificaciones,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
            },
        }
    });
</script> --}}






{{--
<script>
    // Datos de los trabajos por dependencia
    var dataPorDependencia = @json($dataPorDependencia);

    // Extraer las etiquetas y los totales
    var labelsPorDependencia = dataPorDependencia.map(function(item) {
        return item.label;
    });

    var totalesPorDependencia = dataPorDependencia.map(function(item) {
        return item.total;
    });

    // Colores para el gráfico de torta
    var colors = [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
    ];

    var borderColor = [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
    ];

    // Gráfico de torta para trabajos por dependencia
    var ctxPorDependenciaTorta = document.getElementById('trabajosPorDependenciaTortaChart').getContext('2d');
    var chartPorDependenciaTorta = new Chart(ctxPorDependenciaTorta, {
        type: 'pie',
        data: {
            labels: labelsPorDependencia,
            datasets: [{
                data: totalesPorDependencia,
                backgroundColor: colors,
                borderColor: borderColor,
                borderWidth: 1
            }]
        }
    });
</script>  --}}









{{--
<div class="bg-white p-4 rounded-lg shadow-lg text-center">
    <h2 class="text-lg font-semibold mb-4">Trabajos por Mes</h2>
    @foreach ($trabajosPorMes as $trabajoPorMes)
        <p class="text-red-500 mb-2">Año: {{ $trabajoPorMes->year }}, Mes: {{ $trabajoPorMes->month }}, Trabajos realizados: {{ $trabajoPorMes->total }}</p>
    @endforeach
</div>

<div class="bg-white p-4 mt-4 rounded-lg shadow-lg text-center">
    <h2 class="text-lg font-semibold mb-4">Trabajos por Día</h2>
    @foreach ($trabajosPorMes as $trabajoPorMes)
        <p class="text-red-500 mb-2">Año: {{ $trabajoPorMes->year }}, Mes: {{ $trabajoPorMes->month }}, Trabajos realizados: {{ $trabajoPorMes->total }}</p>
    @endforeach
    @foreach ($trabajosPorDia as $trabajoPorDia)
        <p class="text-blue-500 mb-2">Año: {{ $trabajoPorDia->year }}, Mes: {{ $trabajoPorDia->month }}, Día: {{ $trabajoPorDia->day }}, Trabajos realizados: {{ $trabajoPorDia->total }}</p>
    @endforeach
</div> --}}
{{--
<div class="flex">
    <div class="w-1/2 p-4">
        <div class="bg-white p-4 rounded-lg shadow-lg text-center">
            <h2 class="text-lg font-semibold mb-4">Trabajos por Mes</h2>
            <canvas id="trabajosPorMesChart"></canvas>
        </div>
    </div>

    <div class="w-1/2 p-4">
        <div class="bg-white p-4 mt-4 rounded-lg shadow-lg text-center">
            <h2 class="text-lg font-semibold mb-4">Trabajos por Día</h2>
            <canvas id="trabajosPorDiaChart"></canvas>
        </div>
    </div>
</div>

<script>
    var ctxPorMes = document.getElementById('trabajosPorMesChart').getContext('2d');
    var chartPorMes = new Chart(ctxPorMes, {
        type: 'bar',
        data: {
            labels: @json($dataPorMes->pluck('label')),
            datasets: [{
                label: 'Trabajos por Mes',
                data: @json($dataPorMes->pluck('total')),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var ctxPorDia = document.getElementById('trabajosPorDiaChart').getContext('2d');
    var chartPorDia = new Chart(ctxPorDia, {
        type: 'bar',
        data: {
            labels: @json($dataPorDia->pluck('label')),
            datasets: [{
                label: 'Trabajos por Día',
                data: @json($dataPorDia->pluck('total')),
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
 --}}








<!-- resources/views/livewire/trabajos-generales-chart.blade.php -->
<!-- resources/views/livewire/trabajos-generales-chart.blade.php -->


{{-- <div class="bg-white p-4 rounded-lg shadow-lg text-center">
    @foreach ($trabajosPorMes as $trabajoPorMes)
        <p class="text-red-500 mb-4">Año: {{ $trabajoPorMes->year }}, Mes: {{ $trabajoPorMes->month }}, Trabajos realizados: {{ $trabajoPorMes->total }}</p>
    @endforeach
</div>




 <script> <canvas id="trabajosPorMesChart" class="w-full h-64 bg-white"></canvas>
    var ctx = document.getElementById('trabajosPorMesChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar', // Tipo de gráfico (puedes cambiarlo a line, pie, etc.)
        data: {
            labels: @json($labels), // Etiquetas en el eje X (meses)
            datasets: [{
                label: 'Trabajos Generales por Mes',
                data: @json($data), // Datos de las cantidades de trabajos
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color de las barras
                borderColor: 'rgba(75, 192, 192, 1)', // Color del borde de las barras
                borderWidth: 1 // Ancho del borde de las barras
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true // Empezar el eje Y desde 0
                }
            }
        }
    });
</script> --}}
