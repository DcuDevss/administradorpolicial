<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials._head')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body
    class="antialiased font-sans text-[var(--texto-principal)] bg-[var(--bg-principal)] transition-colors duration-500">

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

        @include('layouts.partials._footer')

    </div>

    @include('layouts.partials._theme_switcher')

    @stack('modals')

    @livewireScripts

    @include('layouts.partials._scripts')

    @stack('scripts')

</body>

</html>
