@extends('layouts.app-tecnico')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-1">
            <div class="glass-panel rounded-3xl p-8 shadow-2xl">
                <div class="flex items-center mb-6">
                    <div class="p-3 bg-indigo-500/20 rounded-2xl border border-indigo-500/40 mr-4">
                        <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-white">Nueva Notificación</h2>
                </div>

                <form wire:submit.prevent="enviarNotificacion" class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-400 mb-2">Técnico Asignado</label>
                        <select wire:model="tecnico_id"
                            class="w-full bg-black/40 border border-white/10 rounded-xl py-3 px-4 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                            <option value="">Seleccionar técnico...</option>
                            @foreach ($tecnicos as $tecnico)
                                <option value="{{ $tecnico->id }}">{{ $tecnico->name }}</option>
                            @endforeach
                        </select>
                        @error('tecnico_id')
                            <span class="text-red-400 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-400 mb-2">Mensaje / Tarea</label>
                        <textarea wire:model="mensaje"
                            class="w-full bg-black/40 border border-white/10 rounded-xl py-3 px-4 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all resize-none"
                            rows="4"></textarea>
                        @error('mensaje')
                            <span class="text-red-400 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center p-4 bg-white/5 rounded-2xl border border-white/10">
                        <input type="checkbox" wire:model="activa" id="activa"
                            class="w-5 h-5 rounded border-white/10 bg-black/40 text-indigo-600 focus:ring-indigo-500">
                        <label for="activa" class="ml-3 text-sm text-slate-300">Orden de trabajo activa</label>
                    </div>

                    <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-4 rounded-2xl shadow-lg shadow-indigo-600/30 transition-all active:scale-95">
                        Enviar Notificación
                    </button>
                </form>
            </div>
        </div>

        <div class="lg:col-span-2 space-y-8">

            <div class="glass-panel rounded-3xl p-8">
                @if (auth()->check())
                    <div class="flex items-center mb-6">
                        <div
                            class="w-10 h-10 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                            </svg>
                        </div>
                        <h2 class="text-white text-xl font-medium">{{ auth()->user()->name }}</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @if (auth()->user()->name === 'Comisaria Primera')
                            <div class="space-y-2">
                                <p class="text-slate-400">Total de computadoras: <strong
                                        class="text-indigo-400">{{ $primeraPc }}</strong></p>
                                <p class="text-slate-400">Impresoras laser: <strong
                                        class="text-indigo-400">{{ $impresoraLaser }}</strong></p>
                                <p class="text-slate-400">Impresora a chorro: <strong
                                        class="text-indigo-400">{{ $impresoraChorro }}</strong></p>
                                <p class="text-slate-400">Switch: <strong
                                        class="text-indigo-400">{{ $switch }}</strong></p>
                            </div>
                            <div class="space-y-2">
                                <p class="text-slate-400">Ruter: <strong
                                        class="text-indigo-400">{{ $ruter }}</strong></p>
                                <p class="text-slate-400">Camaras: <strong
                                        class="text-indigo-400">{{ $camaras }}</strong></p>
                                <p class="text-slate-400">Sevidor/es: <strong
                                        class="text-indigo-400">{{ $servidor }}</strong></p>
                                <p class="text-slate-400">Central telefonica: <strong
                                        class="text-indigo-400">{{ $centralTelefonica }}</strong></p>
                            </div>
                        @elseif(auth()->user()->name === 'Comisaria Segunda')
                            <div class="space-y-2">
                                <p class="text-slate-400">Total de computadoras: <strong
                                        class="text-indigo-400">{{ $segundaPc }}</strong></p>
                                <p class="text-slate-400">Impresoras laser: <strong
                                        class="text-indigo-400">{{ $impresoraLaser2da }}</strong></p>
                                <p class="text-slate-400">Impresora a chorro: <strong
                                        class="text-indigo-400">{{ $impresoraChorro2da }}</strong></p>
                                <p class="text-slate-400">Switch: <strong
                                        class="text-indigo-400">{{ $switch2da }}</strong></p>
                            </div>
                            <div class="space-y-2">
                                <p class="text-slate-400">Ruter: <strong
                                        class="text-indigo-400">{{ $ruter2da }}</strong></p>
                                <p class="text-slate-400">Camaras: <strong
                                        class="text-indigo-400">{{ $camaras2da }}</strong></p>
                                <p class="text-slate-400">Sevidor/es: <strong
                                        class="text-indigo-400">{{ $servidor2da }}</strong></p>
                                <p class="text-slate-400">Central telefonica: <strong
                                        class="text-indigo-400">{{ $centralTelefonica2da }}</strong></p>
                            </div>
                        @elseif(auth()->user()->name === 'Comisaria Tercera')
                            <div class="space-y-2">
                                <p class="text-slate-400">Total de computadoras: <strong
                                        class="text-indigo-400">{{ $terceraPc }}</strong></p>
                                <p class="text-slate-400">Impresoras laser: <strong
                                        class="text-indigo-400">{{ $impresoraLaser3da }}</strong></p>
                                <p class="text-slate-400">Impresora a chorro: <strong
                                        class="text-indigo-400">{{ $impresoraChorro3da }}</strong></p>
                                <p class="text-slate-400">Switch: <strong
                                        class="text-indigo-400">{{ $switch3da }}</strong></p>
                            </div>
                            <div class="space-y-2">
                                <p class="text-slate-400">Ruter: <strong
                                        class="text-indigo-400">{{ $ruter3da }}</strong></p>
                                <p class="text-slate-400">Camaras: <strong
                                        class="text-indigo-400">{{ $camaras3da }}</strong></p>
                                <p class="text-slate-400">Sevidor/es: <strong
                                        class="text-indigo-400">{{ $servidor3da }}</strong></p>
                                <p class="text-slate-400">Central telefonica: <strong
                                        class="text-indigo-400">{{ $centralTelefonica3da }}</strong></p>
                            </div>
                        @elseif(auth()->user()->name === 'Comisaria Cuarta')
                            <div class="space-y-2">
                                <p class="text-slate-400">Total de computadoras: <strong
                                        class="text-indigo-400">{{ $cuartaPc }}</strong></p>
                                <p class="text-slate-400">Impresoras laser: <strong
                                        class="text-indigo-400">{{ $impresoraLaser4da }}</strong></p>
                                <p class="text-slate-400">Impresora a chorro: <strong
                                        class="text-indigo-400">{{ $impresoraChorro4da }}</strong></p>
                                <p class="text-slate-400">Switch: <strong
                                        class="text-indigo-400">{{ $switch4da }}</strong></p>
                            </div>
                            <div class="space-y-2">
                                <p class="text-slate-400">Ruter: <strong
                                        class="text-indigo-400">{{ $ruter4da }}</strong></p>
                                <p class="text-slate-400">Camaras: <strong
                                        class="text-indigo-400">{{ $camaras4da }}</strong></p>
                                <p class="text-slate-400">Sevidor/es: <strong
                                        class="text-indigo-400">{{ $servidor4da }}</strong></p>
                                <p class="text-slate-400">Central telefonica: <strong
                                        class="text-indigo-400">{{ $centralTelefonica4da }}</strong></p>
                            </div>
                        @elseif(auth()->user()->name === 'Comisaria Quinta')
                            <div class="space-y-2">
                                <p class="text-slate-400">Total de computadoras: <strong
                                        class="text-indigo-400">{{ $quintaPc }}</strong></p>
                                <p class="text-slate-400">Impresoras laser: <strong
                                        class="text-indigo-400">{{ $impresoraLaser5da }}</strong></p>
                                <p class="text-slate-400">Impresora a chorro: <strong
                                        class="text-indigo-400">{{ $impresoraChorro5da }}</strong></p>
                                <p class="text-slate-400">Switch: <strong
                                        class="text-indigo-400">{{ $switch5da }}</strong></p>
                            </div>
                            <div class="space-y-2">
                                <p class="text-slate-400">Ruter: <strong
                                        class="text-indigo-400">{{ $ruter5da }}</strong></p>
                                <p class="text-slate-400">Camaras: <strong
                                        class="text-indigo-400">{{ $camaras5da }}</strong></p>
                                <p class="text-slate-400">Sevidor/es: <strong
                                        class="text-indigo-400">{{ $servidor5da }}</strong></p>
                                <p class="text-slate-400">Central telefonica: <strong
                                        class="text-indigo-400">{{ $centralTelefonica5da }}</strong></p>
                            </div>
                        @elseif(auth()->user()->name === 'Comisaria de Genero y Familia N° 1')
                            <div class="space-y-2">
                                <p class="text-slate-400">Total de computadoras: <strong
                                        class="text-indigo-400">{{ $flia1Pc }}</strong></p>
                                <p class="text-slate-400">Impresoras laser: <strong
                                        class="text-indigo-400">{{ $impresoraLaserFlia1 }}</strong></p>
                                <p class="text-slate-400">Impresora a chorro: <strong
                                        class="text-indigo-400">{{ $impresoraChorroFlia1 }}</strong></p>
                                <p class="text-slate-400">Switch: <strong
                                        class="text-indigo-400">{{ $switchFlia1 }}</strong></p>
                            </div>
                            <div class="space-y-2">
                                <p class="text-slate-400">Ruter: <strong
                                        class="text-indigo-400">{{ $ruterFlia1 }}</strong></p>
                                <p class="text-slate-400">Camaras: <strong
                                        class="text-indigo-400">{{ $camarasFlia1 }}</strong></p>
                                <p class="text-slate-400">Sevidor/es: <strong
                                        class="text-indigo-400">{{ $servidorFlia1 }}</strong></p>
                                <p class="text-slate-400">Central telefonica: <strong
                                        class="text-indigo-400">{{ $centralTelefonicaFlia1 }}</strong></p>
                            </div>
                        @elseif(auth()->user()->name === 'Comisaria de Genero y Familia N° 2')
                            <div class="space-y-2">
                                <p class="text-slate-400">Total de computadoras: <strong
                                        class="text-indigo-400">{{ $flia2Pc }}</strong></p>
                                <p class="text-slate-400">Impresoras laser: <strong
                                        class="text-indigo-400">{{ $impresoraLaserFlia2 }}</strong></p>
                                <p class="text-slate-400">Impresora a chorro: <strong
                                        class="text-indigo-400">{{ $impresoraChorroFlia2 }}</strong></p>
                                <p class="text-slate-400">Switch: <strong
                                        class="text-indigo-400">{{ $switchFlia2 }}</strong></p>
                            </div>
                            <div class="space-y-2">
                                <p class="text-slate-400">Ruter: <strong
                                        class="text-indigo-400">{{ $ruterFlia2 }}</strong></p>
                                <p class="text-slate-400">Camaras: <strong
                                        class="text-indigo-400">{{ $camarasFlia2 }}</strong></p>
                                <p class="text-slate-400">Sevidor/es: <strong
                                        class="text-indigo-400">{{ $servidorFlia2 }}</strong></p>
                                <p class="text-slate-400">Central telefonica: <strong
                                        class="text-indigo-400">{{ $centralTelefonicaFlia2 }}</strong></p>
                            </div>
                        @elseif(auth()->user()->name === 'Servicios Especiales')
                            <div class="space-y-2">
                                <p class="text-slate-400">Total de computadoras: <strong
                                        class="text-indigo-400">{{ $serviciosPc }}</strong></p>
                                <p class="text-slate-400">Impresoras laser: <strong
                                        class="text-indigo-400">{{ $impresoraLaserServicios }}</strong></p>
                                <p class="text-slate-400">Impresora a chorro: <strong
                                        class="text-indigo-400">{{ $impresoraChorroServicios }}</strong></p>
                                <p class="text-slate-400">Switch: <strong
                                        class="text-indigo-400">{{ $switchServicios }}</strong></p>
                            </div>
                            <div class="space-y-2">
                                <p class="text-slate-400">Ruter: <strong
                                        class="text-indigo-400">{{ $ruterServicios }}</strong></p>
                                <p class="text-slate-400">Camaras: <strong
                                        class="text-indigo-400">{{ $camarasServicios }}</strong></p>
                                <p class="text-slate-400">Sevidor/es: <strong
                                        class="text-indigo-400">{{ $servidorServicios }}</strong></p>
                                <p class="text-slate-400">Central telefonica: <strong
                                        class="text-indigo-400">{{ $centralTelefonicaServicios }}</strong></p>
                            </div>
                        @elseif(auth()->user()->name === 'Custodia Gubernamental')
                            <div class="space-y-2">
                                <p class="text-slate-400">Total de computadoras: <strong
                                        class="text-indigo-400">{{ $custodiaPc }}</strong></p>
                                <p class="text-slate-400">Impresoras laser: <strong
                                        class="text-indigo-400">{{ $impresoraLaserCustodia }}</strong></p>
                                <p class="text-slate-400">Impresora a chorro: <strong
                                        class="text-indigo-400">{{ $impresoraChorroCustodia }}</strong></p>
                                <p class="text-slate-400">Switch: <strong
                                        class="text-indigo-400">{{ $switchCustodia }}</strong></p>
                            </div>
                            <div class="space-y-2">
                                <p class="text-slate-400">Ruter: <strong
                                        class="text-indigo-400">{{ $ruterCustoadia }}</strong></p>
                                <p class="text-slate-400">Camaras: <strong
                                        class="text-indigo-400">{{ $camarasCustodia }}</strong></p>
                                <p class="text-slate-400">Sevidor/es: <strong
                                        class="text-indigo-400">{{ $servidorCustodia }}</strong></p>
                                <p class="text-slate-400">Central telefonica: <strong
                                        class="text-indigo-400">{{ $centralTelefonicaCustoadia }}</strong></p>
                            </div>
                        @else
                            <div class="col-span-2">
                                <p class="text-gray-400 text-xl italic">Bienvenido, {{ auth()->user()->name }}</p>
                            </div>
                        @endif
                    </div>
                @else
                    <p class="text-gray-600 font-bold mb-2 text-xl">Bienvenido, Usuario no autenticado</p>
                @endif
            </div>

            <div class="glass-panel rounded-3xl p-8 overflow-hidden">
                <h3 class="text-white font-bold mb-6 text-xl">Resumen de Equipamiento (PCs)</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b border-white/10">
                                <th class="py-4 font-semibold text-slate-400">Dependencia</th>
                                <th class="py-4 font-semibold text-slate-400 text-center">Total PCs</th>
                                <th class="py-4 font-semibold text-slate-400 text-right">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @foreach ([['Comisaría Primera', $primeraPc], ['Comisaría Segunda', $segundaPc], ['Comisaría Tercera', $terceraPc], ['Comisaría Cuarta', $cuartaPc], ['Comisaría Quinta', $quintaPc]] as $item)
                                <tr class="hover:bg-white/5 transition-colors">
                                    <td class="py-4 text-white font-medium">{{ $item[0] }}</td>
                                    <td class="py-4 text-center font-bold text-indigo-400">{{ $item[1] }}</td>
                                    <td class="py-4 text-right">
                                        <span
                                            class="bg-emerald-500/10 text-emerald-400 px-2 py-1 rounded text-xs border border-emerald-500/20">OPERATIVO</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
