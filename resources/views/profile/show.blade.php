<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-600 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            {{-- Sección: Información del Perfil --}}
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="user-card-chat p-6 shadow-xl">
                    @livewire('profile.update-profile-information-form')
                </div>

                <x-section-border />
            @endif

            {{-- Sección: Actualizar Contraseña --}}
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0 user-card-chat p-6 shadow-xl">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            {{-- Sección: Autenticación de Doble Factor --}}
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0 user-card-chat p-6 shadow-xl">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            {{-- Sección: Sesiones de Navegador --}}
            <div class="mt-10 sm:mt-0 user-card-chat p-6 shadow-xl">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            {{-- Sección: Eliminar Cuenta --}}
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0 user-card-chat p-6 shadow-xl border-red-500/50">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
