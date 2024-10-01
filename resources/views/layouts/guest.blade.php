<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Administrador Policial')</title>

    <!-- Fonts -->
    {{-- Icono de  la pagina --}}
    <link rel="icon" href="{{ asset('foto/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
</body>
<footer
    class="text-center  py-6 bg-transparent font-semibold text-xs text-white shadow-lg m-0 p-0 fixed bottom-0 left-0 w-full ">
    <p class="text-xs">@ 2024 Policía de Tierra del fuego, Antártida e Islas del Atlántico Sur.</p>
</footer>

</html>
