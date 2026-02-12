<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title', 'Administrador Policial')</title>

<link rel="icon" href="{{ asset('foto/favicon.png') }}">

<script>
    (function() {
        // Obtenemos el tema guardado, por defecto 'dark' si no existe
        let theme = localStorage.getItem('theme-police') || 'original';

        // Si por error se guardó 'light', lo forzamos a 'dark' para mantener la estética institucional
        if (theme === 'light') {
            theme = 'dark';
            localStorage.setItem('theme-police', 'dark');
        }

        // Aplicamos el atributo de datos para que el CSS de mascarillas cargue al instante
        document.documentElement.setAttribute('data-theme', theme);

        // Definimos el color de fondo base antes de que cargue el CSS para evitar el "flash" blanco
        const baseColors = {
            'royal': '#1a1a2e',
            'tactical-emerald': '#040d0a',
            'modern-blue': '#0a0e17',
            'cyber-command': '#050810', // 👈 agregado
            'dark': '#000000'
        };
        document.documentElement.style.backgroundColor = "transparent";


        // Forzamos modo oscuro de Tailwind
        document.documentElement.classList.add('dark');
        document.documentElement.classList.remove('light');
    })();
</script>

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css" rel="stylesheet">
