<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm font-medium text-blue-600 dark:text-blue-400">
                Gestión de activos
            </p>

            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Editar activo
            </h2>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Actualiza los datos básicos y la ubicación del equipo.
            </p>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">

            {{-- Volver al detalle --}}
            <div class="mb-6">
                <a href="{{ route('mis-activos.detalle', $activo) }}"
                    class="inline-flex items-center text-sm font-medium text-blue-600 transition hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">
                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>

                    Volver al detalle del activo
                </a>
            </div>

            {{-- Mensaje de éxito --}}
            @if (session()->has('success'))
                <div
                    class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 dark:border-green-800 dark:bg-green-900/20">
                    <div class="flex items-start">

                        <svg class="mr-3 mt-0.5 h-5 w-5 shrink-0 text-green-600 dark:text-green-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>

                        <p class="text-sm font-medium text-green-700 dark:text-green-300">
                            {{ session('success') }}
                        </p>

                    </div>
                </div>
            @endif

            @include('livewire.activos.formulario', [
                'modo' => 'editar',
            ])
        </div>
    </div>

</x-app-layout>
