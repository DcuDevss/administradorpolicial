<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Date time availability</title>

    {{-- <link href="https://cdn.tailwindcss.com" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css" rel="stylesheet">

    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="font-sans text-gray-900 antialiased">
        <div class="flex flex-col sm:justify-center items-center pt-5 pb-5">
            <h2 class="font-bold text-2xl">Date time availability</h2>

            <div class="w-full sm:max-w-5xl mt-6 mb-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <form wire:submit.prevent="reserve">
                    @csrf

                    @livewire('date-time-availability')

                    <button type="submit" class="mt-4 bg-blue-200 hover:bg-blue-600 px-4 py-1 rounded">
                        Reservar
                    </button>
                </form>
            </div>
        </div>
    </div>
    @livewireScripts

    @stack('scripts')
</body>
</html>
