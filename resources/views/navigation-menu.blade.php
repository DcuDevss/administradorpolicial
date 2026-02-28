<nav x-data="{ open: false }" class="bg-slate-800 border-b border-gray-100 fixed top-0 left-0 w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <div class="hidden md:flex md:items-center md:ml-6">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Principal') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden md:flex md:items-center md:ml-6">
                @can('userpolicia')
                    <a class="inline-flex items-center justify-center float-right mr-4 px-3 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition"
                        href="{{ route('userpolicia') }}">Usuarios</a>
                @endcan

                @can('chatlist')
                    <a class="inline-flex items-center justify-center float-right mr-4 px-2 py-2 bg-pink-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition"
                        href="{{ route('chatlist') }}">Chats<span class="ml-1">{{-- @livewire('notificacion-chat') --}}</span></a>
                @endcan

                @can('tecnico-informatico')
                    <div class="relative m-4 flex-col w-fit">
                        @php
                            $countNotifications = 0;
                            $user = auth()->user();
                            // CORRECCIÓN DE SEGURIDAD: Solo intenta acceder a los métodos si el usuario existe y tiene el rol
                            if ($user && $user->hasRole('tecnicoinformatico')) {
                                $countNotifications = $user->unreadNotifications
                                    ->where('type', 'App\Notifications\OrderNotification')
                                    ->count();
                            }
                        @endphp

                        @if ($countNotifications > 0)
                            <div
                                class="absolute bottom-auto left-auto right-0 top-0 z-10 inline-block -translate-y-1/2 translate-x-2/4 rotate-0 skew-x-0 skew-y-0 scale-x-100 scale-y-100 rounded-full bg-pink-700 p-1 text-xs">
                                <a href="{{ route('ver-notificaciones') }}" class="block px-1 text-sm text-gray-700">
                                    <span class="count text-white">{{ $countNotifications }}</span>
                                </a>
                            </div>
                        @endif

                        <div
                            class="flex items-center justify-center rounded-lg bg-indigo-400 px-4 py-3 text-center text-white shadow-lg dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-3 w-3">
                                <path fill-rule="evenodd"
                                    d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                @endcan

                @can('users.index')
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" :aria-expanded="open.toString()" aria-haspopup="true"
                            class="inline-flex items-center justify-center float-right mr-4 px-3 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition group">
                            Administrador
                            <svg x-bind:class="{ 'rotate-180': open }"
                                class="w-4 h-4 ml-1 -mr-1 transform transition-transform ease-in-out duration-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 mt-2 py-2 w-32 bg-white border border-gray-300 rounded-md shadow-xl"
                            role="menu" aria-orientation="vertical">
                            <a href="{{ route('users.index') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500" role="menuitem">
                                Rol de usuario
                            </a>
                            <a href="{{ route('admin-roles.index') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500" role="menuitem">
                                Crud de roles
                            </a>
                            <a href="{{ route('auditorias-general') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500" role="menuitem">
                                Auditoria
                            </a>
                        </div>
                    </div>
                @endcan

                @can('tecnico-informatico')
                    <a class="inline-flex items-center justify-center float-right mr-4 px-3 py-2 bg-pink-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition"
                        href="{{ route('tecnico-informatico') }}">Tec. Informaticos</a>
                @endcan

                @can('tecnico-comunicacion')
                    <a class="inline-flex items-center justify-center float-right mr-1 px-3 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition"
                        href="{{ route('tecnico-comunicacion') }}">Tec. comunicaciones</a>
                @endcan

                {{-- BLOQUE DE GESTIÓN DE EQUIPOS: Envuelto en @auth para prevenir errores si no hay usuario logueado --}}
                @auth
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="ml-3 relative">
                            <x-dropdown align="right" width="60">
                                <x-slot name="trigger">
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->currentTeam->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                            </svg>
                                        </button>
                                    </span>
                                </x-slot>

                                <x-slot name="content">
                                    <div class="w-60">
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Team') }}
                                        </div>

                                        <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                            {{ __('Team Settings') }}
                                        </x-dropdown-link>

                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-dropdown-link href="{{ route('teams.create') }}">
                                                {{ __('Create New Team') }}
                                            </x-dropdown-link>
                                        @endcan

                                        @if (Auth::user()->allTeams()->count() > 1)
                                            <div class="border-t border-gray-200"></div>

                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Switch Teams') }}
                                            </div>

                                            @foreach (Auth::user()->allTeams() as $team)
                                                <x-switchable-team :team="$team" />
                                            @endforeach
                                        @endif
                                    </div>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @endif
                @endauth
                {{-- FIN BLOQUE DE GESTIÓN DE EQUIPOS --}}

                <div class="ml-3 relative">
                    {{-- BLOQUE DE CONFIGURACIÓN DE PERFIL: Envuelto en @auth para prevenir errores si no hay usuario logueado --}}
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif

                                <div class="border-t border-gray-200"></div>

                                <form method="POST" action="{{ route('logout') }}" class="form-logout">
                                    @csrf
                                    <x-dropdown-link href="#">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @endauth
                    {{-- FIN BLOQUE DE CONFIGURACIÓN DE PERFIL --}}
                </div>

                <div class="relative ml-4" x-data="{ open: false }">
                    <button @click="open = !open" @click.away="open = false" :aria-expanded="open.toString()"
                        aria-haspopup="true"
                        class="inline-flex items-center justify-center px-3 py-2 rounded-xl font-semibold text-xs uppercase tracking-widest transition duration-150 ease-in-out border border-white/10 bg-gray-700/50 hover:bg-gray-600 text-white focus:outline-none">
                        <span class="mr-1">🎨</span>
                        <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        class="absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-[#1e293b] border border-white/10 z-50"
                        role="menu" aria-orientation="vertical">
                        <button onclick="cambiarMascarilla('dark')"
                            class="flex items-center w-full px-4 py-2 text-sm text-white hover:bg-gray-700 transition"
                            role="menuitem">
                            <span class="w-3 h-3 rounded-full bg-slate-600 mr-3"></span> Original
                        </button>

                        <!-- Botón Original Institucional (Policía Tierra del Fuego) -->
                        <button onclick="cambiarMascarilla('original')"
                            class="flex items-center w-full px-4 py-2 text-sm text-white hover:bg-blue-900 transition"
                            role="menuitem">
                            <span class="w-3 h-3 rounded-full bg-blue-800 border border-yellow-500 mr-3"></span>
                            Original TDF
                        </button>

                        <!-- Botón Versión Clara (Blanca / Institucional) -->
                        <button onclick="cambiarMascarilla('clara')"
                            class="flex items-center w-full px-4 py-2 text-sm text-white hover:bg-gray-200 transition"
                            role="menuitem">
                            <span class="w-3 h-3 rounded-full bg-[#ffffff] mr-3 shadow-[0_0_8px_#ffffff]"></span>
                            Versión Clara
                        </button>

                        <button onclick="cambiarMascarilla('royal')"
                            class="flex items-center w-full px-4 py-2 text-sm text-white hover:bg-gray-700 transition"
                            role="menuitem">
                            <span class="w-3 h-3 rounded-full bg-[#e94560] mr-3"></span> Royal
                        </button>

                        <button onclick="cambiarMascarilla('cyber-command')"
                            class="flex items-center w-full px-4 py-2 text-sm text-white hover:bg-gray-700 transition"
                            role="menuitem">
                            <span class="w-3 h-3 rounded-full bg-[#00f5ff] mr-3 shadow-[0_0_8px_#00f5ff]"></span>
                            Cyber Command
                        </button>

                        <button onclick="cambiarMascarilla('modern-intitucional')"
                            class="flex items-center w-full px-4 py-2 text-sm text-white hover:bg-gray-700 transition"
                            role="menuitem">
                            <span class="w-3 h-3 rounded-full bg-[#09ff0062] mr-3"></span> Modern Institucional
                        </button>

                        <button onclick="cambiarMascarilla('tactical-emerald')"
                            class="flex items-center w-full px-4 py-2 text-sm text-white hover:bg-gray-700 transition"
                            role="menuitem">
                            <span class="w-3 h-3 rounded-full bg-[#00ff9d] mr-3"></span> Tactical Emerald
                        </button>
                    </div>
                </div>
            </div>

            <div class="-mr-2 flex items-center md:hidden">
                <button @click="open = ! open"
                    class="flex-col items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'flex-col': !open }" class="flex-col" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'flex-col': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }" class="flex-col hidden md:hidden">
        {{-- Enlaces que NO requieren autenticación directa (se validan con @can) --}}
        <div class="flex flex-col ml-2 sm:flex-row sm:space-x-4">
            @can('userpolicia')
                <a class="mb-4 mr-4 px-3 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition  flex-shrink-0"
                    href="{{ route('userpolicia') }}">Usuarios</a>
            @endcan
            @can('chatlist')
                <a class="mr-4 px-2 py-2 bg-pink-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition  flex-shrink-0"
                    href="{{ route('chatlist') }}">Chats<span class="ml-1">{{-- @livewire('notificacion-chat') --}}</span></a>
            @endcan
        </div>

        @can('tecnico-informatico')
            <div class="mt-2 mb-2 mr-0 ml-0 px-3 py-2 flex-shrink-0">
                @php
                    $countNotifications = 0;
                    $user = auth()->user();
                    // CORRECCIÓN DE SEGURIDAD: Solo intenta acceder a los métodos si el usuario existe y tiene el rol
                    if ($user && $user->hasRole('tecnicoinformatico')) {
                        $countNotifications = $user->unreadNotifications
                            ->where('type', 'App\Notifications\OrderNotification')
                            ->count();
                    }
                @endphp

                @if ($countNotifications > 0)
                    <div
                        class="flex-col absolute bottom-auto left-auto right-0 top-0 z-10 inline-block -translate-y-1/2 translate-x-2/4 rotate-0 skew-x-0 skew-y-0 scale-x-100 scale-y-100 rounded-full bg-pink-700 p-1 text-xs">
                        <a href="{{ route('ver-notificaciones') }}" class="block px-1 text-sm text-gray-700">
                            <span class="count text-white">{{ $countNotifications }}</span>
                        </a>
                    </div>
                @endif

                <div
                    class="flex-col items-center justify-center rounded-lg bg-indigo-400 px-4 py-3 text-center text-white shadow-lg dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-3 w-3">
                        <path fill-rule="evenodd"
                            d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        @endcan

        @can('users.index')
            <div class="flex-col items-center justify-center mt-4 mb-3 ml-auto" x-data="{ open: false }">
                <div class="flex flex-col ml-2 sm:flex-row sm:space-x-4">
                    <button @click="open = !open"
                        class="flex flex-col items-center justify-center ml-2 mt-0 mr-4 px-3 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition flex-shrink-0">
                        Administrador
                        <svg x-bind:class="{ 'rotate-180': open }"
                            class="flex-col items-center justify-center w-4 h-4 ml-1 -mr-1 w-fit transform transition-transform ease-in-out duration-200"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false"
                        class="flex flex-col items-center justify-center mt-4 mb-3 ml-2 w-fit bg-white border border-gray-300 rounded-md shadow-lg"
                        role="menu" aria-orientation="vertical">
                        <a href="{{ route('users.index') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500" role="menuitem">
                            Rol de usuario
                        </a>
                        <a href="{{ route('admin-roles.index') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500" role="menuitem">
                            Crud de roles
                        </a>
                    </div>
                </div>
            </div>
        @endcan

        @can('tecnico-informatico')
            <a class=" flex flex-col items-center justify-center ml-2 mr-2 mt-2 mb-3 px-3 py-2 bg-pink-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition flex-shrink-0"
                href="{{ route('tecnico-informatico') }}">Tec. Informaticos</a>
        @endcan

        @can('tecnico-comunicacion')
            <a class="flex flex-col items-center justify-center ml-2 mr-2 px-3 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition flex-shrink-0"
                href="{{ route('tecnico-comunicacion') }}">Tec. comunicaciones</a>
        @endcan

        <div class="pt-2 pb-3 space-y-1 mt-2">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            {{-- BLOQUE DE OPCIONES RESPONSIVAS: Envuelto en @auth para prevenir errores si no hay usuario logueado --}}
            @auth
                {{-- NUEVO: SELECTOR DE MASCARILLAS INTEGRADO --}}
                <div class="px-4 mb-4">
                    <div class="font-bold text-[10px] uppercase tracking-[0.2em] text-gray-400 mb-3">
                        Apariencia del Sistema
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        {{-- Original --}}
                        <button onclick="cambiarMascarilla('dark')"
                            class="flex items-center justify-start px-3 py-2 rounded-lg bg-white/5 border border-white/10 text-[10px] font-bold uppercase text-white hover:bg-white/10 transition">
                            <span
                                class="w-2.5 h-2.5 rounded-full bg-slate-600 mr-2 shadow-[0_0_5px_rgba(71,85,105,0.5)]"></span>
                            Original
                        </button>

                        {{-- Royal --}}
                        <button onclick="cambiarMascarilla('royal')"
                            class="flex items-center justify-start px-3 py-2 rounded-lg bg-white/5 border border-white/10 text-[10px] font-bold uppercase text-white hover:bg-white/10 transition">
                            <span
                                class="w-2.5 h-2.5 rounded-full bg-[#e94560] mr-2 shadow-[0_0_5px_rgba(233,69,96,0.5)]"></span>
                            Royal
                        </button>

                        {{-- Modern --}}
                        <button onclick="cambiarMascarilla('modern-intitucional')"
                            class="flex items-center justify-start px-3 py-2 rounded-lg bg-white/5 border border-white/10 text-[10px] font-bold uppercase text-white hover:bg-white/10 transition">
                            <span
                                class="w-2.5 h-2.5 rounded-full bg-[#09ff0062] mr-2 shadow-[0_0_5px_rgba(0,210,255,0.5)]"></span>
                            Modern
                        </button>

                        <!-- Botón Original Institucional (Policía Tierra del Fuego) -->
                        <button onclick="cambiarMascarilla('original')"
                            class="flex items-center justify-start px-3 py-2 rounded-lg bg-white/5 border border-white/10 text-[10px] font-bold uppercase text-white hover:bg-white/10 transition">
                            <span
                                class="w-2.5 h-2.5 rounded-full bg-blue-800 mr-2 border border-yellow-500 shadow-[0_0_5px_rgba(255,215,0,0.5)]"></span>
                            Original TDF
                        </button>

                        <!-- Botón Versión Clara (Blanca / Institucional) -->
                        <button onclick="cambiarMascarilla('clara')"
                            class="flex items-center justify-start px-3 py-2 rounded-lg bg-white/5 border border-white/10 text-[10px] font-bold uppercase text-white hover:bg-white/10 transition">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#ffffff] mr-2 shadow-[0_0_8px_#ffffff]"></span>
                            Versión Clara
                        </button>

                        <!-- Botón Cyber Command -->
                        <button onclick="cambiarMascarilla('cyber-command')"
                            class="flex items-center justify-start px-3 py-2 rounded-lg bg-white/5 border border-white/10 text-[10px] font-bold uppercase text-white hover:bg-white/10 transition">
                            <span
                                class="w-2.5 h-2.5 rounded-full bg-[#00f5ff] mr-2 shadow-[0_0_5px_rgba(0,245,255,0.5)]"></span>
                            Cyber Command
                        </button>

                        {{-- Tactical --}}
                        <button onclick="cambiarMascarilla('tactical-emerald')"
                            class="flex items-center justify-start px-3 py-2 rounded-lg bg-white/5 border border-white/10 text-[10px] font-bold uppercase text-white hover:bg-white/10 transition">
                            <span
                                class="w-2.5 h-2.5 rounded-full bg-[#00ff9d] mr-2 shadow-[0_0_5px_rgba(0,255,157,0.5)]"></span>
                            Tactical
                        </button>
                    </div>
                </div>

                <div class="border-t border-white/10 my-2"></div>

                <div class="flex items-center justify-between px-4">
                    <div class="flex items-center">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div class="shrink-0 mr-3">
                                <img class="h-10 w-10 rounded-full object-cover"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </div>
                        @endif

                        <div>
                            <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
                        </div>
                    </div>

                    {{-- BOTÓN DE MODO OSCURO PARA MÓVIL (comentado) --}}
                    {{-- <button onclick="toggleTheme()"
                        class="inline-flex items-center justify-center px-3 py-2 rounded-xl font-semibold text-xs uppercase tracking-widest transition duration-150 ease-in-out border border-white/10 bg-gray-700/50 hover:bg-gray-600 text-white focus:outline-none"
                        id="nav-theme-toggle-mobile">
                        <span id="theme-icon-mobile">🌙</span>
                    </button> --}}
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" class="text-white">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')"
                            class="text-white">
                            {{ __('API Tokens') }}
                        </x-responsive-nav-link>
                    @endif

                    <div class="border-t border-white/10"></div>

                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();"
                            class="text-white">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>

                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="border-t border-white/10"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                            :active="request()->routeIs('teams.show')" class="text-white">
                            {{ __('Team Settings') }}
                        </x-responsive-nav-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')" class="text-white">
                                {{ __('Create New Team') }}
                            </x-responsive-nav-link>
                        @endcan

                        @if (Auth::user()->allTeams()->count() > 1)
                            <div class="border-t border-white/10"></div>

                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-switchable-team :team="$team" component="responsive-nav-link" />
                            @endforeach
                        @endif
                    @endif
                </div>
            @endauth
            {{-- FIN BLOQUE DE OPCIONES RESPONSIVAS --}}
        </div>
    </div>
</nav>
