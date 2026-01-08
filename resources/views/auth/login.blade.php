<x-guest-layout>
    <x-authentication-card>
        <x-slot name="title_bg">POLICIA</x-slot>
        <x-slot name="title_main">ADMINISTRADOR</x-slot>
        <x-slot name="title_highlight">POLICIAL</x-slot>

        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <div>
                <x-label for="email" value="{{ __('Email Institucional') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
            </div>

            <div>
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <div class="pt-2">
                <x-button class="w-full justify-center py-4 bg-blue-600 hover:bg-blue-500">
                    {{ __('Ingresar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
