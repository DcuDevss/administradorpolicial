<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title', 'Administrador Policial')</title>

<link rel="icon" href="{{ asset('foto/favicon.png') }}">

<script>
    (function() {
        // Obtenemos el tema guardado, si es 'light' lo ignoramos y ponemos 'dark'
        let theme = localStorage.getItem('theme-police') || 'dark';
        if (theme === 'light') {
            theme = 'dark';
            localStorage.setItem('theme-police', 'dark');
        }

        // Aplicamos el tema al atributo de datos
        document.documentElement.setAttribute('data-theme', theme);

        // Nos aseguramos de que NUNCA exista la clase light-mode
        document.documentElement.classList.remove('light-mode');
    })();
</script>

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

<link href="https://unpkg.com/@fullcalendar/core/main.css" rel="stylesheet" />
<link href="https://unpkg.com/@fullcalendar/daygrid/main.css" rel="stylesheet" />
<link href="https://unpkg.com/@fullcalendar/timegrid/main.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css" rel="stylesheet">
