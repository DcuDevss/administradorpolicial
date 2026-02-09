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
            background-image:
                radial-gradient(at 50% 0%, rgba(30, 58, 138, 0.2) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(15, 23, 42, 0.5) 0px, transparent 50%);
            background-attachment: fixed;
        }

        /* Estilo base para paneles tipo cristal */
        .glass-panel {
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        /* Reintroducción del color solicitado de forma segura para los cuadros */
        .welcome-card,
        .custom-section {
            background-color: #03084769 !important;
            /* background-color: #03084769 !important; este donde esta */
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 0.75rem;
        }

        /* Ajustes para MODO CLARO (evita los cuadros negros) */
        html.light-mode body {
            background-color: #f8fafc;
            background-image: none;
            color: #1e293b;
        }

        html.light-mode .welcome-card,
        html.light-mode .glass-panel {
            background-color: rgba(255, 255, 255, 0.8) !important;
            border: 1px solid rgba(15, 23, 42, 0.08) !important;
            color: #1e293b !important;
        }

        html.light-mode footer {
            /* background-color: #03084769 !important; */
            /* En lugar de quitarlo, lo suavizamos para el modo claro */
            background-color: rgba(15, 23, 42, 0.03) !important;
            color: #1e293b !important;
            border-top: 1px solid rgba(15, 23, 42, 0.12) !important;
            padding-top: 0.25rem !important;
            padding-bottom: 0.25rem !important;
        }

        select,
        textarea,
        input[type="text"] {
            background: rgba(255, 255, 255, 0.03) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            color: #e2e8f0 !important;
        }

        html.light-mode input,
        html.light-mode select,
        html.light-mode textarea {
            background: #ffffff !important;
            border: 1px solid #cbd5e1 !important;
            color: #1e293b !important;
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #020617;
        }

        ::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 10px;
        }
    </style>
</head>

<body class="min-h-screen text-slate-300 antialiased selection:bg-indigo-500/40">
    <div class="py-3 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">

            <header class="mb-2 text-center">
                <div class="inline-flex items-center justify-center space-x-2 mb-1">
                    <span class="h-[1px] w-6 bg-indigo-500/30"></span>
                    <span class="text-[10px] font-bold text-indigo-400 tracking-[0.3em] uppercase">Operaciones
                        Central</span>
                    <span class="h-[1px] w-6 bg-indigo-500/30"></span>
                </div>

                <h1 class="text-4xl md:text-5xl font-black text-white tracking-tighter mb-1">
                    SISTEMA <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 to-blue-400">INFORMÁTICA</span>
                </h1>

                <div class="flex items-center justify-center">
                    <div
                        class="flex items-center space-x-2 bg-slate-900/40 border border-white/5 px-3 py-0.5 rounded-full">
                        <span class="relative flex h-2 w-2">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                        </span>
                        <p class="text-slate-400 text-[9px] font-bold uppercase tracking-widest">
                            Panel de Monitoreo y Notificaciones
                        </p>
                    </div>
                </div>
            </header>

            <main class="relative">
                <div
                    class="absolute -top-6 left-1/2 -translate-x-1/2 w-full h-24 bg-indigo-500/5 rounded-full blur-3xl -z-10">
                </div>
                <div class="flex justify-center">
                    <div class="w-full">
                        @yield('content')
                    </div>
                </div>
            </main>

            <footer class="mt-8 text-center border-t border-white/5 pt-4">
                <p class="text-slate-500 text-[9px] font-bold uppercase tracking-[0.3em] mb-1">
                    División de Comunicaciones e Informática
                </p>
                <div class="text-[8px] text-slate-600 font-mono">
                    POLICÍA PROVINCIAL - TIERRA DEL FUEGO
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
