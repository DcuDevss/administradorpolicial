<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials._head')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

    <style>
        body {
            position: relative;
            background-image: url("{{ asset('foto/fondoclaro.png') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            /* ← ajustá este valor */
            z-index: 0;
        }

        #main-wrapper {
            position: relative;
            z-index: 1;
        }
    </style>

</head>

<body class="antialiased font-sans text-[var(--texto-principal)]">


    <div id="main-wrapper" class="min-h-screen flex flex-col transition-all duration-300">

        <x-banner />

        @livewire('navigation-menu')

        @if (isset($header))
            <header class="bg-[var(--bg-card)]/70 backdrop-blur-md shadow border-b border-white/10 mt-16 transition-all">
                <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
                    <div class="text-[var(--color-acento)] brightness-125 font-bold uppercase tracking-widest text-sm">
                        {{ $header }}
                    </div>
                </div>
            </header>
        @endif

        <main class="mt-16 mb-16 px-4 sm:px-6 lg:px-8 flex-grow">
            <div class="max-w-7xl mx-auto">
                <div
                    class="bg-[var(--bg-card)] rounded-xl p-6 shadow-xl border border-white/10 transition-all duration-500">
                    {{ $slot }}
                </div>
            </div>
        </main>

        {{--  @include('layouts.partials._footer') --}}
        @if (!request()->routeIs('chat*'))
            @include('layouts.partials._footer')
        @endif


    </div>

    @include('layouts.partials._theme_switcher')

    @stack('modals')

    @livewireScripts

    @include('layouts.partials._scripts')

    @stack('scripts')

</body>

</html>
