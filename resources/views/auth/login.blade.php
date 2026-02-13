<x-guest-layout>
    <x-authentication-card>
        <x-slot name="title_bg">POLICIA</x-slot>
        <x-slot name="title_main">ADMINISTRADOR</x-slot>
        <x-slot name="title_highlight">POLICIAL</x-slot>

        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="text-center text-xs tracking-widest text-gray-400 uppercase mb-4">
            Acceso exclusivo para personal autorizado
        </div>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-500 text-center">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email -->
            <div class="relative">
                <x-label for="email" value="{{ __('Email Institucional') }}" />
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm">
                        ✉
                    </span>
                    <x-input id="email" class="block mt-1 w-full pl-10 focus:ring-2 focus:ring-blue-500 transition"
                        type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>
            </div>

            <!-- Password -->
            <div class="relative">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm">
                        🔒
                    </span>
                    <x-input id="password" class="block mt-1 w-full pl-10 focus:ring-2 focus:ring-blue-500 transition"
                        type="password" name="password" required autocomplete="current-password" />
                </div>
            </div>

            <!-- Opciones -->
            <div class="flex items-center justify-between text-sm">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-white">Recordar sesión</span>
                </label>

                {{-- @if (Route::has('password.request'))
                    <a class="underline text-white hover:text-gray-300 transition"
                        href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif --}}
            </div>

            <!-- Botón -->
            <div class="pt-2">
                <x-button
                    class="w-full justify-center py-4 bg-blue-600 hover:bg-blue-500 transition transform hover:scale-[1.02] active:scale-[0.98]">
                    {{ __('Ingresar') }}
                </x-button>
            </div>
        </form>

        <!-- Pie institucional -->
        <div class="text-center text-[10px] text-gray-500 mt-6 tracking-wider">
            Sistema protegido • Policía de Tierra del Fuego
        </div>

    </x-authentication-card>
</x-guest-layout>
