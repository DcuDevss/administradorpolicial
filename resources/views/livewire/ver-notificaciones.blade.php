<div class="container mx-auto p-1">

    <div class="relative" x-data="{ open: false }">
        <button @click="open = !open"
            class="inline-flex items-center justify-center float-right mr-4 px-3 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition group">
            Inventarios
            <!-- Icono de flecha hacia abajo para indicar que es un menú desplegable -->
            <svg x-bind:class="{ 'rotate-180': open }"
                class="w-4 h-4 ml-1 -mr-1 transform transition-transform ease-in-out duration-200" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 9l-7 7-7-7">
                </path>
            </svg>
        </button>

        <!-- Contenedor del menú desplegable -->
        <div x-show="open" @click.away="open = false"
            class="absolute right-0 mt-2 py-2 w-32 bg-white border border-gray-300 rounded-md shadow-lg">
            <!-- Opciones del menú -->
            <a href="{{ route('createInventarioGeneral') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500">Dependencias Operativas</a>
            <a href="{{ route('createInvestigacionesGeneral') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500">Investigaciones </a>
            <a href="{{ route('createAdministracionGeneral') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500">Administracion </a>
            <a href="{{ route('createAdministracionGeneral') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500">Recursos Humanos </a>
            <a href="{{ route('createJefaturaGeneral') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500">Jefatura </a>
        </div>
    </div>
    <h1 class="text-2xl text-red-700 font-bold my-3">Notificaciones de trabajos</h1>
    <div class="mb-4">
        <input wire:model="search" type="text" class="rounded-md" placeholder="Buscar por nombre, mensaje o fecha">
    </div>
    <ul class="border border-gray-300 rounded-md p-2">
        @forelse ($notificaciones as $notificacion)
            <li class="py-1">
                <div class="flex justify-between items-center mt-2">
                    <div>
                        <div>
                            <button wire:click="cambiarEstado({{ $notificacion->id }})">
                                <div
                                    class="w-4 h-4 {{ $notificacion->activa ? 'font-bold p-px px-2 text-xs shrink-0 rounded-full bg-blue-500 text-white animate-pulse' : 'bg-red-500' }} rounded-full">
                                </div>
                            </button>
                            <strong
                                class="text-center {{ $notificacion->activa ? 'font-bold p-px px-2 text-xs shrink-0 rounded-full bg-blue-500 text-white animate-pulse' : 'text-red-500' }}">
                                {{ $notificacion->activa ? 'Activa' : 'Inactiva' }}
                            </strong>
                        </div>
                        <strong class="text-white">Remitente: {{ $notificacion->usercomisaria->name }}</strong> <br>
                        <strong class="text-white">Fecha: {{ $notificacion->created_at }}</strong> <br>
                        <strong class="text-white">Mensaje: {{ $notificacion->mensaje }}</strong> <br>

                        @foreach ($notificacion->respuestas as $respuesta)
                            <div>
                                <strong class="text-pink-400">Fecha del trabajo realizado:
                                    {{ $respuesta->created_at->tz('America/Argentina/Buenos_Aires')->format('d/m/Y H:i:s') }}</strong>
                                <br>
                                <strong class="text-pink-400">Detalles de lo Realizado:
                                    {{ $respuesta->mensaje }}</strong> <br>
                            </div>
                        @endforeach
                        <strong
                            class="text-gray-300">----------------------------------------------------------------------------</strong>
                    </div>

                    <div class="text-end">
                        @foreach ($users as $key => $user)
                            @if ($user->id == $notificacion->usercomisaria->id)
                                <button wire:click="message({{ $user->id }})"
                                    class="bg-black rounded-md p-3 text-white">
                                    Enviar Mensaje
                                </button>
                                @livewire('enviar-respuesta', ['notificacionId' => $notificacion->id], key($notificacion->id))
                            @endif
                        @endforeach
                    </div>
                </div>
            </li>
        @empty
            <li class="py-2 text-white">No hay notificaciones disponibles.</li>
        @endforelse
    </ul>
    {{ $notificaciones->links() }}
</div>








<!-- resources/views/livewire/ver-notificaciones.blade.php -->
{{--
@if (session()->has('nuevaRespuesta'))
    <div class="p-4 bg-green-500 text-white font-bold">
        ¡Tienes una nueva respuesta del técnico!
    </div>
@endif

<div class="container mx-auto p-1">
    <!-- ... -->
</div>  --}}

{{-- resources/views/livewire/ver-notificaciones.blade.php

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Notificaciones</h1>
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 rounded-md">
            <thead>
                <tr>

                    <th class="p-2">Remitente</th>
                    <th class="p-2">Fecha</th>
                    <th class="p-2">Mensaje</th>
                    <th class="p-2">Formulario</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($notificaciones as $notificacion)
                    <tr class="border-t">

                        <td class="p-2">{{ $notificacion->usercomisaria->name }}</td>
                        <td class="p-2">{{ $notificacion->created_at->tz('America/Argentina/Buenos_Aires')->format('d/m/Y H:i:s') }}</td>
                        <td class="p-2 max-w-sm whitespace-pre-wrap break-words">{{ $notificacion->mensaje }}</td>
                        <td>

                        <div class="flex items-center">
                            <button wire:click="cambiarEstado({{ $notificacion->id }})">
                                <div class="w-4 h-4 {{ $notificacion->activa ? 'bg-blue-500' : 'bg-red-500' }} rounded-full"></div>
                            </button>
                            <strong class="text-center {{ $notificacion->activa ? 'text-blue-500' : 'text-red-500' }}">
                                {{ $notificacion->activa ? 'Activa' : 'Inactiva' }}
                            </strong>

                           @livewire('enviar-respuesta', ['notificacionId' => $notificacion->id], key($notificacion->id))
                        </div>
                    </td>
                    </tr>
                    @foreach ($notificacion->respuestas as $respuesta)
                        <tr class="border-t">
                             <td class="p-2"></td>
                            <td class="p-2">{{ $respuesta->user->name }}</td>
                            <td class="p-2">{{ $respuesta->created_at->tz('America/Argentina/Buenos_Aires')->format('d/m/Y H:i:s') }}</td>
                            <td class="p-2 max-w-sm whitespace-pre-wrap break-words">
                                <strong>Trabajo Realizado:</strong> {{ $respuesta->mensaje }}
                            </td>
                        </tr>
                    @endforeach
                @empty
                    <tr>
                        <td class="p-2 text-center" colspan="4">No hay notificaciones disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $notificaciones->links() }}
</div> --}}


{{-- 11111111
<div class="container mx-auto p-1">
    <h1 class="text-2xl font-bold mb-1">Notificaciones</h1>
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 rounded-md">
            <thead>
                <tr>
                    <th class="p-2">Estado</th>
                    <th class="p-2">Remitente</th>
                    <th class="p-2">Fecha</th>
                    <th class="p-2">Mensaje</th>
                    <th class="p-2">Respuesta</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($notificaciones as $notificacion)
                    <tr class="border-t">
                        <td class="p-2">
                            <button wire:click="cambiarEstado({{ $notificacion->id }})">
                                <div class="w-4 h-4 {{ $notificacion->activa ? 'bg-blue-500' : 'bg-red-500' }} rounded-full"></div>
                            </button>
                            <strong class="text-center {{ $notificacion->activa ? 'text-blue-500' : 'text-red-500' }}">
                                {{ $notificacion->activa ? 'Activa' : 'Inactiva' }}
                            </strong>
                        </td>
                        <td class="p-2">{{ $notificacion->usercomisaria->name }}</td>
                        <td class="p-2">{{ $notificacion->created_at->tz('America/Argentina/Buenos_Aires')->format('d/m/Y H:i:s') }}</td>
                        <td class="p-2 max-w-sm whitespace-pre-wrap break-words">{{ $notificacion->mensaje }}</td>
                        <td class="p-2">
                            @livewire('enviar-respuesta', ['notificacionId' => $notificacion->id], key($notificacion->id))
                        </td>
                    </tr>
                    <tr>

                    </tr>
                @empty
                    <tr>
                        <td class="p-2 text-center" colspan="5">No hay notificaciones disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $notificaciones->links() }}        <a class="inline-flex items-center justify-center float-right mr-4 px-3 py-2 bg-slate-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-slate-600 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition"
                href="{{route('userpolicia')}}">Elegir dependencia</a>
</div>
 --}}

{{-- <div class="container mx-auto p-1">
    <h1 class="text-2xl font-bold mb-1">Notificaciones</h1>
    <ul class="border border-gray-300 rounded-md p-2">
        @forelse ($notificaciones as $notificacion)
            <li class="py-1">
                <div class="flex justify-between items-center">
                    <div>
                    <div>
                        <button wire:click="cambiarEstado({{ $notificacion->id }})">
                            <div class="w-4 h-4 {{ $notificacion->activa ? 'bg-blue-500' : 'bg-red-500' }} rounded-full"></div>
                        </button>
                        <strong class="text-center {{ $notificacion->activa ? 'text-blue-500' : 'text-red-500' }}">
                            {{ $notificacion->activa ? 'Activa' : 'Inactiva' }}
                        </strong>
                    </div>
                        <strong>Remitente:</strong> {{ $notificacion->usercomisaria->name }}<br>
                        <strong>Fecha:</strong> {{ ($notificacion->created_at)->format('d/m/Y H:i:s') }}<br>
                        <strong>Mensaje:</strong> {{ $notificacion->mensaje }}
                    </div>

                    <div class="flex items-center space-x-2">



                        @livewire('enviar-respuesta', ['notificacionId' => $notificacion->id], key($notificacion->id))
                    </div>
                </div>
            </li>
        @empty
            <li class="py-2">No hay notificaciones disponibles.</li>
        @endforelse
    </ul>
  {{ $notificaciones->links() }}
</div> --}}


{{--  <div class="container mx-auto p-1">
    <h1 class="text-2xl font-bold mb-1">Notificaciones</h1>
    <ul class="border border-gray-300 rounded-md p-2">
        @forelse ($notificaciones as $notificacion)
            <li class="py-1">
                <div class="flex justify-between items-center">
                    <div>
                        <strong>Remitente:</strong> {{ $notificacion->usercomisaria->name }}<br>
                        <strong>Fecha:</strong> {{ $notificacion->created_at }}<br>
                        <strong>Mensaje:</strong> {{ $notificacion->mensaje }}
                    </div>
                    <div class="flex items-center">
                        <button wire:click="cambiarEstado({{ $notificacion->id }})">
                            <div class="w-4 h-4 {{ $notificacion->activa ? 'bg-blue-500' : 'bg-red-500' }} rounded-full mr-2"></div>
                        </button>
                        <strong class="{{ $notificacion->activa ? 'text-blue-500' : 'text-red-500' }}">
                            {{ $notificacion->activa ? 'Activa' : 'Inactiva' }}
                        </strong>

                        @livewire('enviar-respuesta', ['notificacionId' => $notificacion->id], key($notificacion->id))
                    </div>
                </div>
            </li>
        @empty
            <li class="py-2">No hay notificaciones disponibles.</li>
        @endforelse
    </ul>
  {{ $notificaciones->links() }}
</div> --}}
