<x-app-layout>
    <div class="py-5 bg-white dark:bg-gray-100 mt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-red-500 leading-tight">
                    {{ __('LISTAS DE ROLES: ') }}
                </h2>
            </x-slot>

            {{-- *** CARGA EL COMPONENTE LIVEWIRE *** --}}
            @livewire('admin.index-roles')

        </div>
    </div>
</x-app-layout>
