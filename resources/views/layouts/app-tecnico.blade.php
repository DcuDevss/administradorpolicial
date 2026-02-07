<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Técnico - Sistema de Seguridad</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #020617;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body class="min-h-screen text-slate-200 antialiased">
    <div class="py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <header class="mb-10 flex justify-between items-center border-b border-white/10 pb-6">
                <div>
                    <h1 class="text-3xl font-bold text-white tracking-tight">Gestión de Notificaciones</h1>
                    <p class="text-slate-400 mt-1">Panel de control y monitoreo de infraestructura técnica.</p>
                </div>
                <div class="text-right">
                    <span
                        class="text-xs font-mono text-indigo-400 bg-indigo-500/10 px-3 py-1 rounded-full border border-indigo-500/20">
                        SISTEMA ACTIVO
                    </span>
                </div>
            </header>

            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
