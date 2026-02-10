<div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-10 px-4">

        <div class="w-full">
            <div
                class="flex rounded-xl h-full bg-black/60 backdrop-blur-md p-8 flex-col border border-white/10 shadow-2xl">
                <div class="container">
                    @if (auth()->check())
                        @php
                            $userName = auth()->user()->name;
                            $dependencias = [
                                'Comisaria Primera' => [
                                    'titulo' => 'Comisaría Primera',
                                    'pc' => $primeraPc,
                                    'laser' => $impresoraLaser,
                                    'chorro' => $impresoraChorro,
                                    'switch' => $switch,
                                    'ruter' => $ruter,
                                    'camaras' => $camaras,
                                    'servidor' => $servidor,
                                    'central' => $centralTelefonica,
                                ],
                                'Comisaria Segunda' => [
                                    'titulo' => 'Comisaría Segunda',
                                    'pc' => $segundaPc,
                                    'laser' => $impresoraLaser2da,
                                    'chorro' => $impresoraChorro2da,
                                    'switch' => $switch2da,
                                    'ruter' => $ruter2da,
                                    'camaras' => $camaras2da,
                                    'servidor' => $servidor2da,
                                    'central' => $centralTelefonica2da,
                                ],
                                'Comisaria Tercera' => [
                                    'titulo' => 'Comisaría Tercera',
                                    'pc' => $terceraPc,
                                    'laser' => $impresoraLaser3da,
                                    'chorro' => $impresoraChorro3da,
                                    'switch' => $switch3da,
                                    'ruter' => $ruter3da,
                                    'camaras' => $camaras3da,
                                    'servidor' => $servidor3da,
                                    'central' => $centralTelefonica3da,
                                ],
                                'Comisaria Cuarta' => [
                                    'titulo' => 'Comisaría Cuarta',
                                    'pc' => $cuartaPc,
                                    'laser' => $impresoraLaser4da,
                                    'chorro' => $impresoraChorro4da,
                                    'switch' => $switch4da,
                                    'ruter' => $ruter4da,
                                    'camaras' => $camaras4da,
                                    'servidor' => $servidor4da,
                                    'central' => $centralTelefonica4da,
                                ],
                                'Comisaria Quinta' => [
                                    'titulo' => 'Comisaría Quinta',
                                    'pc' => $quintaPc,
                                    'laser' => $impresoraLaser5da,
                                    'chorro' => $impresoraChorro5da,
                                    'switch' => $switch5da,
                                    'ruter' => $ruter5da,
                                    'camaras' => $camaras5da,
                                    'servidor' => $servidor5da,
                                    'central' => $centralTelefonica5da,
                                ],
                                'Comisaria de Genero y Familia N° 1' => [
                                    'titulo' => 'C. Género y Familia N° 1',
                                    'pc' => $flia1Pc,
                                    'laser' => $impresoraLaserFlia1,
                                    'chorro' => $impresoraChorroFlia1,
                                    'switch' => $switchFlia1,
                                    'ruter' => $ruterFlia1,
                                    'camaras' => $camarasFlia1,
                                    'servidor' => $servidorFlia1,
                                    'central' => $centralTelefonicaFlia1,
                                ],
                                'Comisaria de Genero y Familia N° 2' => [
                                    'titulo' => 'C. Género y Familia N° 2',
                                    'pc' => $flia2Pc,
                                    'laser' => $impresoraLaserFlia2,
                                    'chorro' => $impresoraChorroFlia2,
                                    'switch' => $switchFlia2,
                                    'ruter' => $ruterFlia2,
                                    'camaras' => $camarasFlia2,
                                    'servidor' => $servidorFlia2,
                                    'central' => $centralTelefonicaFlia2,
                                ],
                                'Servicios Especiales' => [
                                    'titulo' => 'Servicios Especiales',
                                    'pc' => $serviciosPc,
                                    'laser' => $impresoraLaserServicios,
                                    'chorro' => $impresoraChorroServicios,
                                    'switch' => $switchServicios,
                                    'ruter' => $ruterServicios,
                                    'camaras' => $camarasServicios,
                                    'servidor' => $servidorServicios,
                                    'central' => $centralTelefonicaServicios,
                                ],
                                'Custodia Gubernamental' => [
                                    'titulo' => 'Custodia Gubernamental',
                                    'pc' => $custodiaPc,
                                    'laser' => $impresoraLaserCustodia,
                                    'chorro' => $impresoraChorroCustodia,
                                    'switch' => $switchCustodia,
                                    'ruter' => $ruterCustodia,
                                    'camaras' => $camarasCustodia,
                                    'servidor' => $servidorCustodia,
                                    'central' => $centralTelefonicaCustodia,
                                ],
                            ];
                        @endphp

                        @if (isset($dependencias[$userName]))
                            @php $dep = $dependencias[$userName]; @endphp
                            <div>
                                <div class="flex items-center mb-6 border-b border-white/20 pb-4">
                                    <div
                                        class="w-10 h-10 mr-3 inline-flex items-center justify-center rounded-lg bg-indigo-600 text-white shadow-lg">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                        </svg>
                                    </div>
                                    <h2 class="text-white text-xl font-bold tracking-tight">{{ $dep['titulo'] }}</h2>
                                </div>

                                <div class="space-y-3 font-medium">
                                    <p class="text-gray-300 flex justify-between">Total computadoras: <span
                                            class="text-red-500 font-bold font-mono">{{ $dep['pc'] }}</span></p>
                                    <p class="text-gray-300 flex justify-between">Impresoras láser: <span
                                            class="text-red-500 font-bold font-mono">{{ $dep['laser'] }}</span></p>
                                    <p class="text-gray-300 flex justify-between">Impresora a chorro: <span
                                            class="text-red-500 font-bold font-mono">{{ $dep['chorro'] }}</span></p>
                                    <p class="text-gray-300 flex justify-between">Switch: <span
                                            class="text-red-500 font-bold font-mono">{{ $dep['switch'] }}</span></p>
                                    <p class="text-gray-300 flex justify-between">Ruter: <span
                                            class="text-red-500 font-bold font-mono">{{ $dep['ruter'] }}</span></p>
                                    <p class="text-gray-300 flex justify-between">Cámaras: <span
                                            class="text-red-500 font-bold font-mono">{{ $dep['camaras'] }}</span></p>
                                    <p class="text-gray-300 flex justify-between">Servidor/es: <span
                                            class="text-red-500 font-bold font-mono">{{ $dep['servidor'] }}</span></p>
                                    <p class="text-gray-300 flex justify-between">Central telefónica: <span
                                            class="text-red-500 font-bold font-mono">{{ $dep['central'] }}</span></p>
                                </div>
                            </div>
                        @else
                            <div
                                class="border-l-4 border-indigo-600 pl-4 py-3 bg-white/5 rounded-r-xl border border-white/10">
                                <p class="text-indigo-400 font-semibold text-xs uppercase tracking-widest mb-1">
                                    Bienvenido</p>
                                <p class="text-white font-black text-2xl tracking-tight">{{ auth()->user()->name }}</p>
                            </div>
                        @endif
                    @else
                        <div
                            class="border-l-4 border-red-600 pl-4 py-3 bg-white/5 rounded-r-xl border border-white/10 text-center">
                            <p class="text-red-400 font-semibold text-xs uppercase tracking-widest mb-1">Atención</p>
                            <p class="text-white font-black text-lg tracking-tight uppercase">Usuario no autenticado</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="lg:col-span-2">
            <div class="p-8 bg-black/40 backdrop-blur-md border border-white/10 rounded-xl shadow-2xl h-full">
                <h2 class="text-2xl font-bold text-white mb-8 flex items-center border-b border-white/10 pb-4">
                    <svg class="w-6 h-6 mr-3 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                    Nueva Notificación
                </h2>

                <form wire:submit.prevent="enviarNotificacion" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label for="tecnico_id"
                                class="block text-sm font-bold text-gray-400 uppercase tracking-wider">Asignar
                                Técnico</label>
                            <select wire:model="tecnico_id"
                                class="w-full rounded-lg border border-white/10 bg-gray-900/50 text-white py-3 px-4 focus:ring-2 focus:ring-indigo-500 outline-none transition-all appearance-none cursor-pointer">
                                <option value="">Seleccionar técnico del área...</option>
                                @foreach ($tecnicos as $tecnico)
                                    <option value="{{ $tecnico->id }}">{{ $tecnico->name }}</option>
                                @endforeach
                            </select>
                            @error('tecnico_id')
                                <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-end pb-1">
                            <label
                                class="flex items-center space-x-3 bg-white/5 p-3 rounded-lg border border-white/5 w-full cursor-pointer hover:bg-white/10 transition-colors">
                                <input type="checkbox" wire:model="activa"
                                    class="w-5 h-5 rounded border-white/20 text-indigo-600 focus:ring-indigo-500 bg-gray-900">
                                <span class="text-sm font-bold text-gray-300 uppercase tracking-tight">Orden de trabajo
                                    activa</span>
                            </label>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="mensaje"
                            class="block text-sm font-bold text-gray-400 uppercase tracking-wider">Detalle del
                            requerimiento</label>
                        <textarea wire:model="mensaje" placeholder="Describa el problema o solicitud detalladamente..."
                            class="w-full rounded-lg border border-white/10 bg-gray-900/50 text-white py-4 px-4 focus:ring-2 focus:ring-indigo-500 outline-none transition-all resize-none shadow-inner"
                            rows="6"></textarea>
                        @error('mensaje')
                            <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-end pt-4">
                        <button type="submit"
                            class="w-full md:w-auto bg-indigo-600 hover:bg-indigo-500 text-white font-black py-4 px-12 rounded-lg shadow-lg shadow-indigo-500/20 transition-all transform hover:-translate-y-1 active:scale-95 uppercase tracking-widest text-sm">
                            Enviar Notificación
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
