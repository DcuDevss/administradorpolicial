@extends('layouts.app-tecnico')
@section('content')

    <div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 mt-10">

            <div class=" m-auto max-w-sm">
                <div class="flex rounded-lg h-full bg-black p-8 flex-col">

                    <div class="container ml-6 my-3">
                        @if (auth()->check())
                            @if (auth()->user()->name === 'Comisaria Primera')
                                <div>

                                    <div class="flex items-center mb-3">
                                        <div
                                            class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                        <h2 class="text-white text-lg font-medium">Comisaria Primera</h2>
                                    </div>

                                    <p class="text-white">Total de computadoras: <strong
                                            class="text-red-800">{{ $primeraPc }}</strong></p>
                                    <p class="text-white">Impresoras laser: <strong
                                            class="text-red-800">{{ $impresoraLaser }}</strong></p>
                                    <p class="text-white">Impresora a chorro: <strong
                                            class="text-red-800">{{ $impresoraChorro }}</strong></p>
                                    <p class="text-white">Switch: <strong class="text-red-800">{{ $switch }}</strong>
                                    </p>
                                    <p class="text-white">Ruter: <strong class="text-red-800">{{ $ruter }}</strong>
                                    </p>
                                    <p class="text-white">Camaras:<strong class="text-red-800">{{ $camaras }}</strong>
                                    </p>
                                    <p class="text-white">Sevidor/es:<strong
                                            class="text-red-800">{{ $servidor }}</strong></p>
                                    <p class="text-white">Central telefonica:<strong
                                            class="text-red-800">{{ $centralTelefonica }}</strong></p>
                                </div>
                            @elseif(auth()->user()->name === 'Comisaria Segunda')
                                <div>

                                    <div class="flex items-center mb-3">
                                        <div
                                            class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                viewBox="0 0 24 24">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                        <h2 class="text-white text-lg font-medium">Comisaria Segunda</h2>
                                    </div>

                                    <p class="text-white">Total de computadoras: <strong
                                            class="text-red-800">{{ $segundaPc }}</strong></p>
                                    <p class="text-white">Impresoras laser: <strong
                                            class="text-red-800">{{ $impresoraLaser2da }}</strong></p>
                                    <p class="text-white">Impresora a chorro: <strong
                                            class="text-red-800">{{ $impresoraChorro2da }}</strong></p>
                                    <p class="text-white">Switch: <strong class="text-red-800">{{ $switch2da }}</strong>
                                    </p>
                                    <p class="text-white">Ruter: <strong class="text-red-800">{{ $ruter2da }}</strong>
                                    </p>
                                    <p class="text-white">Camaras:<strong class="text-red-800">{{ $camaras2da }}</strong>
                                    </p>
                                    <p class="text-white">Sevidor/es:<strong
                                            class="text-red-800">{{ $servidor2da }}</strong></p>
                                    <p class="text-white">Central telefonica:<strong
                                            class="text-red-800">{{ $centralTelefonica2da }}</strong></p>
                                </div>
                            @elseif(auth()->user()->name === 'Comisaria Tercera')
                                <div>

                                    <div class="flex items-center mb-3">
                                        <div
                                            class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                viewBox="0 0 24 24">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                        <h2 class="text-white text-lg font-medium">Comisaria Tercera</h2>
                                    </div>


                                    <p class="text-white">Total de computadoras: <strong
                                            class="text-red-800">{{ $terceraPc }}</strong></p>
                                    <p class="text-white">Impresoras laser: <strong
                                            class="text-red-800">{{ $impresoraLaser3da }}</strong></p>
                                    <p class="text-white">Impresora a chorro: <strong
                                            class="text-red-800">{{ $impresoraChorro3da }}</strong></p>
                                    <p class="text-white">Switch: <strong class="text-red-800">{{ $switch3da }}</strong>
                                    </p>
                                    <p class="text-whwite">Ruter: <strong class="text-red-800">{{ $ruter3da }}</strong>
                                    </p>
                                    <p class="text-white">Camaras:<strong class="text-red-800">{{ $camaras3da }}</strong>
                                    </p>
                                    <p class="text-white">Sevidor/es:<strong
                                            class="text-red-800">{{ $servidor3da }}</strong></p>
                                    <p class="text-white">Central telefonica:<strong
                                            class="text-red-800">{{ $centralTelefonica3da }}</strong></p>
                                </div>
                            @elseif(auth()->user()->name === 'Comisaria Cuarta')
                                <div>

                                    <div class="flex items-center mb-3">
                                        <div
                                            class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                viewBox="0 0 24 24">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                        <h2 class="text-white text-lg font-medium">Comisaria Cuarta</h2>
                                    </div>



                                    <p class="text-white">Total de computadoras: <strong
                                            class="text-red-800">{{ $cuartaPc }}</strong></p>
                                    <p class="text-white">Impresoras laser: <strong
                                            class="text-red-800">{{ $impresoraLaser4da }}</strong></p>
                                    <p class="text-white">Impresora a chorro: <strong
                                            class="text-red-800">{{ $impresoraChorro4da }}</strong></p>
                                    <p class="text-white">Switch: <strong class="text-red-800">{{ $switch4da }}</strong>
                                    </p>
                                    <p class="text-white">Ruter: <strong
                                            class="text-red-800">{{ $ruter4da }}</strong></p>
                                    <p class="text-white">Camaras:<strong
                                            class="text-red-800">{{ $camaras4da }}</strong></p>
                                    <p class="text-white">Sevidor/es:<strong
                                            class="text-red-800">{{ $servidor4da }}</strong></p>
                                    <p class="text-white">Central telefonica:<strong
                                            v>{{ $centralTelefonica4da }}</strong></p>
                                </div>
                            @elseif(auth()->user()->name === 'Comisaria Quinta')
                                <div>

                                    <div class="flex items-center mb-3">
                                        <div
                                            class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                viewBox="0 0 24 24">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                        <h2 class="text-white text-lg font-medium">Comisaria Quinta</h2>
                                    </div>

                                    <p class="text-white">Total de computadoras: <strong
                                            class="text-red-800">{{ $quintaPc }}</strong></p>
                                    <p class="text-white">Impresoras laser: <strong
                                            class="text-red-800">{{ $impresoraLaser5da }}</strong></p>
                                    <p class="text-white">Impresora a chorro: <strong
                                            class="text-red-800">{{ $impresoraChorro5da }}</strong></p>
                                    <p class="text-white">Switch: <strong
                                            class="text-red-800">{{ $switch5da }}</strong></p>
                                    <p class="text-white">Ruter: <strong
                                            class="text-red-800">{{ $ruter5da }}</strong></p>
                                    <p class="text-white">Camaras:<strong
                                            class="text-red-800">{{ $camaras5da }}</strong></p>
                                    <p class="text-white">Sevidor/es:<strong
                                            class="text-red-800">{{ $servidor5da }}</strong></p>
                                    <p class="text-white">Central telefonica:<strong
                                            class="text-red-800">{{ $centralTelefonica5da }}</strong></p>
                                </div>
                            @elseif(auth()->user()->name === 'Comisaria de Genero y Familia N° 1')
                                <div>

                                    <div class="flex items-center mb-3">
                                        <div
                                            class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                viewBox="0 0 24 24">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                        <h2 class="text-white text-lg font-medium">Comisaria Genero y familia N° 1</h2>
                                    </div>


                                    <p class="text-white">Total de computadoras: <strong
                                            class="text-red-800">{{ $flia1Pc }}</strong></p>
                                    <p class="text-white">Impresoras laser: <strong
                                            class="text-red-800">{{ $impresoraLaserFlia1 }}</strong></p>
                                    <p class="text-white">Impresora a chorro: <strong
                                            class="text-red-800">{{ $impresoraChorroFlia1 }}</strong></p>
                                    <p class="text-white">Switch: <strong
                                            class="text-red-800">{{ $switchFlia1 }}</strong></p>
                                    <p class="text-white">Ruter: <strong
                                            class="text-red-800">{{ $ruterFlia1 }}</strong></p>
                                    <p class="text-white">Camaras:<strong
                                            class="text-red-800">{{ $camarasFlia1 }}</strong></p>
                                    <p class="text-white">Sevidor/es:<strong
                                            class="text-red-800">{{ $servidorFlia1 }}</strong></p>
                                    <p class="text-white">Central telefonica:<strong
                                            v>{{ $centralTelefonicaFlia1 }}</strong></p>
                                </div>
                            @elseif(auth()->user()->name === 'Comisaria de Genero y Familia N° 2')
                                <div>

                                    <div class="flex items-center mb-3">
                                        <div
                                            class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                viewBox="0 0 24 24">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                        <h2 class="text-white text-lg font-medium">Comisaria de genero y familia N° 2</h2>
                                    </div>

                                    <p class="text-white">Total de computadoras: <strong
                                            class="text-red-800">{{ $flia2Pc }}</strong></p>
                                    <p class="text-white">Impresoras laser: <strong
                                            class="text-red-800">{{ $impresoraLaserFlia2 }}</strong></p>
                                    <p class="text-white">Impresora a chorro: <strong
                                            class="text-red-800">{{ $impresoraChorroFlia2 }}</strong></p>
                                    <p class="text-white">Switch: <strong
                                            class="text-red-800">{{ $switchFlia2 }}</strong></p>
                                    <p class="text-white">Ruter: <strong
                                            class="text-red-800">{{ $ruterFlia2 }}</strong></p>
                                    <p class="text-white">Camaras:<strong
                                            class="text-red-800">{{ $camarasFlia2 }}</strong></p>
                                    <p class="text-white">Sevidor/es:<strong
                                            class="text-red-800">{{ $servidorFlia2 }}</strong></p>
                                    <p class="text-white">Central telefonica:<strong
                                            class="text-red-800">{{ $centralTelefonicaFlia2 }}</strong></p>
                                </div>
                            @elseif(auth()->user()->name === 'Servicios Especiales')
                                <div>
                                    <div class="flex items-center mb-3">
                                        <div
                                            class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                viewBox="0 0 24 24">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                        <h2 class="text-white text-lg font-medium">Servicios Especiales</h2>
                                    </div>
                                    <p class="text-white">Total de computadoras: <strong
                                            class="text-red-800">{{ $serviciosPc }}</strong></p>
                                    <p class="text-white">Impresoras laser: <strong
                                            class="text-red-800">{{ $impresoraLaserServicios }}</strong></p>
                                    <p class="text-white">Impresora a chorro: <strong
                                            class="text-red-800">{{ $impresoraChorroServicios }}</strong></p>
                                    <p class="text-white">Switch: <strong
                                            class="text-red-800">{{ $switchServicios }}</strong></p>
                                    <p class="text-white">Ruter: <strong
                                            class="text-red-800">{{ $ruterServicios }}</strong></p>
                                    <p class="text-white">Camaras:<strong
                                            class="text-red-800">{{ $camarasServicios }}</strong></p>
                                    <p class="text-white">Sevidor/es:<strong
                                            class="text-red-800">{{ $servidorServicios }}</strong></p>
                                    <p class="text-white">Central telefonica:<strong
                                            class="text-red-800">{{ $centralTelefonicaServicios }}</strong></p>
                                </div>
                            @elseif(auth()->user()->name === 'Custodia Gubernamental')
                                <div>
                                    <div class="flex items-center mb-3">
                                        <div
                                            class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                viewBox="0 0 24 24">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                        <h2 class="text-white text-lg font-medium">Custodia Gubernamental</h2>
                                    </div>
                                    <p class="text-white">Total de computadoras: <strong
                                            class="text-red-800">{{ $custodiaPc }}</strong></p>
                                    <p class="text-white">Impresoras laser: <strong
                                            class="text-red-800">{{ $impresoraLaserCustodia }}</strong></p>
                                    <p class="text-white">Impresora a chorro: <strong
                                            class="text-red-800">{{ $impresoraChorroCustodia }}</strong></p>
                                    <p class="text-white">Switch: <strong
                                            class="text-red-800">{{ $switchCustodia }}</strong></p>
                                    <p class="text-white">Ruter: <strong
                                            class="text-red-800">{{ $ruterCustoadia }}</strong></p>
                                    <p class="text-white">Camaras:<strong
                                            class="text-red-800">{{ $camarasCustodia }}</strong></p>
                                    <p class="text-white">Sevidor/es:<strong
                                            class="text-red-800">{{ $servidorCustodia }}</strong></p>
                                    <p class="text-white">Central telefonica:<strong
                                            class="text-red-800">{{ $centralTelefonicaCustoadia }}</strong></p>
                                </div>
                            @else
                                <div>
                                    <p class="text-gray-600 font-bold mb-2 text-xl">Bienvenido, {{ auth()->user()->name }}
                                    </p>
                                    <!-- Otra información para otros usuarios autenticados -->
                                </div>
                            @endif
                        @else
                            <div>
                                <p class="text-gray-600 font-bold mb-2 text-xl">Bienvenido, Usuario no autenticado</p>
                                <!-- Otra información para usuarios no autenticados -->
                            </div>
                        @endif
                    </div>
                </div>
            </div>







            {{-- <div class="container ml-6 my-3">
        @if (auth()->check())
            @if (auth()->user()->name === 'Comisaria Primera')
                <div>
                    <p class="text-blue-600 font-bold mb-2 text-xl">Dispositivos Informaticos, Comisaria Primera</p>
                    <p class="text-green-600 font-bold mb-2 text-xl">Total de computadoras en ComisariaPrimera: <strong
                            class="text-red-800">{{ $primeraPc }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Impresoras laser: <strong
                                class="text-red-800">{{ $impresoraLaser }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Impresora a chorro: <strong
                                class="text-red-800">{{ $impresoraChorro }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Switch: <strong
                                class="text-red-800">{{ $switch }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Ruter: <strong
                                class="text-red-800">{{ $ruter }}</strong></p>
                <p class="text-green-800 font-bold mb-2 text-xl">Camaras:<strong
                                class="text-red-800">{{ $camaras }}</strong></p>
                <p class="text-green-800 font-bold mb-2 text-xl">Sevidor/es:<strong
                                class="text-red-800">{{ $servidor }}</strong></p>
                <p class="text-green-800 font-bold mb-2 text-xl">Central telefonica:<strong
                                v>{{ $centralTelefonica }}</strong></p>
        </div>
        @elseif(auth()->user()->name === 'Comisaria Segunda')
        <div>
                <p class="text-blue-600 font-bold mb-2 text-xl">Dispositivos Informaticos, Comisaria Segunda</p>
                <p class="text-green-600 font-bold mb-2 text-xl">Total de computadoras: <strong
                                class="text-red-800">{{ $segundaPc }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Impresoras laser: <strong
                                class="text-red-800">{{ $impresoraLaser2da }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Impresora a chorro: <strong
                                class="text-red-800">{{ $impresoraChorro2da }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Switch: <strong
                                class="text-red-800">{{ $switch2da }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Ruter: <strong
                                class="text-red-800">{{ $ruter2da }}</strong></p>
                <p class="text-green-800 font-bold mb-2 text-xl">Camaras:<strong
                                class="text-red-800">{{ $camaras2da }}</strong></p>
                <p class="text-green-800 font-bold mb-2 text-xl">Sevidor/es:<strong
                                class="text-red-800">{{ $servidor2da }}</strong></p>
                <p class="text-green-800 font-bold mb-2 text-xl">Central telefonica:<strong
                                v>{{ $centralTelefonica2da }}</strong></p>
        </div>
        @elseif(auth()->user()->name === 'Comisaria Tercera')
        <div>
                <p class="text-blue-600 font-bold mb-2 text-xl">Dispositivos Informáticos, Comisaria Tercera</p>
                <p class="text-green-600 font-bold mb-2 text-xl">Total de computadoras: <strong
                                class="text-red-800">{{ $terceraPc }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Impresoras laser: <strong
                                class="text-red-800">{{ $impresoraLaser3da }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Impresora a chorro: <strong
                                class="text-red-800">{{ $impresoraChorro3da }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Switch: <strong
                                class="text-red-800">{{ $switch3da }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Ruter: <strong
                                class="text-red-800">{{ $ruter3da }}</strong></p>
                <p class="text-green-800 font-bold mb-2 text-xl">Camaras:<strong
                                class="text-red-800">{{ $camaras3da }}</strong></p>
                <p class="text-green-800 font-bold mb-2 text-xl">Sevidor/es:<strong
                                class="text-red-800">{{ $servidor3da }}</strong></p>
                <p class="text-green-800 font-bold mb-2 text-xl">Central telefonica:<strong
                                v>{{ $centralTelefonica3da }}</strong></p>
        </div>
        @elseif(auth()->user()->name === 'Comisaria Cuarta')
        <div>
                <p class="text-blue-600 font-bold mb-2 text-xl">Dispositivos Informáticos, Comisaria Cuarta</p>
                <p class="text-green-600 font-bold mb-2 text-xl">Total de computadoras: <strong
                                class="text-red-800">{{ $cuartaPc }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Impresoras laser: <strong
                                class="text-red-800">{{ $impresoraLaser4da }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Impresora a chorro: <strong
                                class="text-red-800">{{ $impresoraChorro4da }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Switch: <strong
                                class="text-red-800">{{ $switch4da }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Ruter: <strong
                                class="text-red-800">{{ $ruter4da }}</strong></p>
                <p class="text-green-800 font-bold mb-2 text-xl">Camaras:<strong
                                class="text-red-800">{{ $camaras4da }}</strong></p>
                <p class="text-green-800 font-bold mb-2 text-xl">Sevidor/es:<strong
                                class="text-red-800">{{ $servidor4da }}</strong></p>
                <p class="text-green-800 font-bold mb-2 text-xl">Central telefonica:<strong
                                v>{{ $centralTelefonica4da }}</strong></p>
        </div>
        @elseif(auth()->user()->name === 'Comisaria Quinta')
        <div>
                <p class="text-blue-600 font-bold mb-2 text-xl">Dispositivos Informáticos, Comisaria Quinta</p>
                <p class="text-green-600 font-bold mb-2 text-xl">Total de computadoras: <strong
                                class="text-red-800">{{ $quintaPc }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Impresoras laser: <strong
                                class="text-red-800">{{ $impresoraLaser5da }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Impresora a chorro: <strong
                                class="text-red-800">{{ $impresoraChorro5da }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Switch: <strong
                                class="text-red-800">{{ $switch5da }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Ruter: <strong
                                class="text-red-800">{{ $ruter5da }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Camaras:<strong
                                class="text-red-800">{{ $camaras5da }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Sevidor/es:<strong
                                class="text-red-800">{{ $servidor5da }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Central telefonica:<strong
                                v>{{ $centralTelefonica5da }}</strong></p>
        </div>
        @elseif(auth()->user()->name === 'Comisaria de Genero y Familia N° 1')
        <div>
                <p class="text-blue-600 font-bold mb-2 text-xl">Dispositivos Informáticos, Comisaria Genero y Famila
                        N° 1 </p>
                <p class="text-green-600 font-bold mb-2 text-xl">Total de computadoras: <strong
                                class="text-red-800">{{ $flia1Pc }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Impresoras laser: <strong
                                class="text-red-800">{{ $impresoraLaserFlia1 }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Impresora a chorro: <strong
                                class="text-red-800">{{ $impresoraChorroFlia1 }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Switch: <strong
                                class="text-red-800">{{ $switchFlia1 }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Ruter: <strong
                                class="text-red-800">{{ $ruterFlia1 }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Camaras:<strong
                                class="text-red-800">{{ $camarasFlia1 }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Sevidor/es:<strong
                                class="text-red-800">{{ $servidorFlia1 }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Central telefonica:<strong
                                v>{{ $centralTelefonicaFlia1 }}</strong></p>
        </div>
        @elseif(auth()->user()->name === 'Comisaria de Genero y Familia N° 2')
        <div>
                <p class="text-blue-600 font-bold mb-2 text-xl">Dispositivos Informáticos, Comisaria Genero y Famila
                        N° 2 </p>
                <p class="text-green-600 font-bold mb-2 text-xl">Total de computadoras: <strong
                                class="text-red-800">{{ $flia2Pc }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Impresoras laser: <strong
                                class="text-red-800">{{ $impresoraLaserFlia2 }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Impresora a chorro: <strong
                                class="text-red-800">{{ $impresoraChorroFlia2 }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Switch: <strong
                                class="text-red-800">{{ $switchFlia2 }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Ruter: <strong
                                class="text-red-800">{{ $ruterFlia2 }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Camaras:<strong
                                class="text-red-800">{{ $camarasFlia2 }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Sevidor/es:<strong
                                class="text-red-800">{{ $servidorFlia2 }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Central telefonica:<strong
                                v>{{ $centralTelefonicaFlia2 }}</strong></p>
        </div>
        @elseif(auth()->user()->name === 'Servicios Especiales')
        <div>
                <p class="text-blue-600 font-bold mb-2 text-xl">Dispositivos Informáticos, Servicios Especiales
                </p>
                <p class="text-green-600 font-bold mb-2 text-xl">Total de computadoras: <strong
                                class="text-red-800">{{ $serviciosPc }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Impresoras laser: <strong
                                class="text-red-800">{{ $impresoraLaserServicios }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Impresora a chorro: <strong
                                class="text-red-800">{{ $impresoraChorroServicios }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Switch: <strong
                                class="text-red-800">{{ $switchServicios }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Ruter: <strong
                                class="text-red-800">{{ $ruterServicios }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Camaras:<strong
                                class="text-red-800">{{ $camarasServicios }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Sevidor/es:<strong
                                class="text-red-800">{{ $servidorServicios }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Central telefonica:<strong
                                v>{{ $centralTelefonicaServicios }}</strong></p>
        </div>
        @elseif(auth()->user()->name === 'Custodia Gubernamental')
        <div>
                <p class="text-blue-600 font-bold mb-2 text-xl">Dispositivos Informáticos, Custodia Gubernamental
                </p>
                <p class="text-green-600 font-bold mb-2 text-xl">Total de computadoras: <strong
                                class="text-red-800">{{ $custodiaPc }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Impresoras laser: <strong
                                class="text-red-800">{{ $impresoraLaserCustodia }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Impresora a chorro: <strong
                                class="text-red-800">{{ $impresoraChorroCustodia }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Switch: <strong
                                class="text-red-800">{{ $switchCustodia }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Ruter: <strong
                                class="text-red-800">{{ $ruterCustoadia }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Camaras:<strong
                                class="text-red-800">{{ $camarasCustodia }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Sevidor/es:<strong
                                class="text-red-800">{{ $servidorCustodia }}</strong></p>
                <p class="text-green-600 font-bold mb-2 text-xl">Central telefonica:<strong
                                v>{{ $centralTelefonicaCustoadia }}</strong></p>
        </div>
        @else
        <div>
                <p class="text-gray-600 font-bold mb-2 text-xl">Bienvenido, {{ auth()->user()->name }}</p>
                <!-- Otra información para otros usuarios autenticados -->
        </div>
        @endif
        @else
        <div>
                <p class="text-gray-600 font-bold mb-2 text-xl">Bienvenido, Usuario no autenticado</p>
                <!-- Otra información para usuarios no autenticados -->
        </div>
        @endif
</div> --}}



            <div class="p-4  border-black border-2 rounded-lg">
                <form wire:submit.prevent="enviarNotificacion" class="max-w-md mx-auto">
                    <div class="mb-4">
                        <label for="tecnico_id" class="block font-medium mb-1 text-white">Seleccionar Técnico:</label>
                        <select wire:model="tecnico_id" class="w-full rounded-md border border-gray-300 py-2 px-3">
                            <option value="">Seleccionar técnico...</option>
                            @foreach ($tecnicos as $tecnico)
                                <option value="{{ $tecnico->id }}">{{ $tecnico->name }}</option>
                            @endforeach
                        </select>
                        @error('tecnico_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="mensaje" class="block font-medium mb-1 text-white">Mensaje:</label>
                        <textarea wire:model="mensaje" class="w-full rounded-md border border-gray-300 py-2 px-3 resize-none" rows="4"></textarea>
                        @error('mensaje')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="activa" class="block font-medium mb-1 text-white">Marcar Orden de trabajo
                            activa:</label>
                        <input type="checkbox" wire:model="activa" class="form-checkbox">
                    </div>

                    <button type="submit"
                        class="bg-black hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded">Enviar
                        Notificación</button>
                </form>

            </div>


            {{-- <div class="card">
        <p class="">Dispositivos Informáticos, Comisaria Cuarta</p>
        <p class="text-blue-600 font-bold mb-2 text-xl">Dispositivos Informaticos, Comisaria Primera</p>
                    <p class="">Total de computadoras en ComisariaPrimera: <strong
                            class="">{{ $primeraPc }}</strong></p>
<p class="">Impresoras laser: <strong
                class="">{{ $impresoraLaser }}</strong></p>
<p class="">Impresora a chorro: <strong
                class="">{{ $impresoraChorro }}</strong></p>
<p class="">Switch: <strong
                class="">{{ $switch }}</strong></p>
<p class="">Ruter: <strong
                class="">{{ $ruter }}</strong></p>
<p class="">Camaras:<strong
                class="">{{ $camaras }}</strong></p>
<p class="">Sevidor/es:<strong
                class="">{{ $servidor }}</strong></p>
<p class="">Central telefonica:<strong>{{ $centralTelefonica }}</strong></p>

</div> --}}

            <div class="m-auto max-w-sm">
                <div class="flex rounded-lg h-full bg-black p-8 flex-col">

                    <div class="container ml-6 my-3">
                        @if (auth()->check())
                            @if (auth()->user()->name === 'Comisaria Primera')
                                <div>

                                    <div class="flex items-center mb-3">
                                        <div
                                            class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                viewBox="0 0 24 24">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                        <h2 class="text-white text-lg font-medium">Comisaria Primera</h2>
                                    </div>

                                    <p class="text-white">Total de computadoras: <strong
                                            class="text-red-800">{{ $primeraPc }}</strong></p>
                                    <p class="text-white">Impresoras laser: <strong
                                            class="text-red-800">{{ $impresoraLaser }}</strong></p>
                                    <p class="text-white">Impresora a chorro: <strong
                                            class="text-red-800">{{ $impresoraChorro }}</strong></p>
                                    <p class="text-white">Switch: <strong
                                            class="text-red-800">{{ $switch }}</strong></p>
                                    <p class="text-white">Ruter: <strong
                                            class="text-red-800">{{ $ruter }}</strong></p>
                                    <p class="text-white">Camaras:<strong
                                            class="text-red-800">{{ $camaras }}</strong></p>
                                    <p class="text-white">Sevidor/es:<strong
                                            class="text-red-800">{{ $servidor }}</strong></p>
                                    <p class="text-white">Central telefonica:<strong
                                            class="text-red-800">{{ $centralTelefonica }}</strong></p>
                                </div>
                            @elseif(auth()->user()->name === 'Comisaria Segunda')
                                <div>

                                    <div class="flex items-center mb-3">
                                        <div
                                            class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                viewBox="0 0 24 24">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                        <h2 class="text-white text-lg font-medium">Comisaria Segunda</h2>
                                    </div>

                                    <p class="text-white">Total de computadoras: <strong
                                            class="text-red-800">{{ $segundaPc }}</strong></p>
                                    <p class="text-white">Impresoras laser: <strong
                                            class="text-red-800">{{ $impresoraLaser2da }}</strong></p>
                                    <p class="text-white">Impresora a chorro: <strong
                                            class="text-red-800">{{ $impresoraChorro2da }}</strong></p>
                                    <p class="text-white">Switch: <strong
                                            class="text-red-800">{{ $switch2da }}</strong></p>
                                    <p class="text-white">Ruter: <strong
                                            class="text-red-800">{{ $ruter2da }}</strong></p>
                                    <p class="text-white">Camaras:<strong
                                            class="text-red-800">{{ $camaras2da }}</strong></p>
                                    <p class="text-white">Sevidor/es:<strong
                                            class="text-red-800">{{ $servidor2da }}</strong></p>
                                    <p class="text-white">Central telefonica:<strong
                                            class="text-red-800">{{ $centralTelefonica2da }}</strong></p>
                                </div>
                            @elseif(auth()->user()->name === 'Comisaria Tercera')
                                <div>

                                    <div class="flex items-center mb-3">
                                        <div
                                            class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                viewBox="0 0 24 24">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                        <h2 class="text-white text-lg font-medium">Comisaria Tercera</h2>
                                    </div>


                                    <p class="text-white">Total de computadoras: <strong
                                            class="text-red-800">{{ $terceraPc }}</strong></p>
                                    <p class="text-white">Impresoras laser: <strong
                                            class="text-red-800">{{ $impresoraLaser3da }}</strong></p>
                                    <p class="text-white">Impresora a chorro: <strong
                                            class="text-red-800">{{ $impresoraChorro3da }}</strong></p>
                                    <p class="text-white">Switch: <strong
                                            class="text-red-800">{{ $switch3da }}</strong></p>
                                    <p class="text-whwite">Ruter: <strong
                                            class="text-red-800">{{ $ruter3da }}</strong></p>
                                    <p class="text-white">Camaras:<strong
                                            class="text-red-800">{{ $camaras3da }}</strong></p>
                                    <p class="text-white">Sevidor/es:<strong
                                            class="text-red-800">{{ $servidor3da }}</strong></p>
                                    <p class="text-white">Central telefonica:<strong
                                            class="text-red-800">{{ $centralTelefonica3da }}</strong></p>
                                </div>
                            @elseif(auth()->user()->name === 'Comisaria Cuarta')
                                <div>

                                    <div class="flex items-center mb-3">
                                        <div
                                            class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                viewBox="0 0 24 24">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                        <h2 class="text-white text-lg font-medium">Comisaria Cuarta</h2>
                                    </div>



                                    <p class="text-white">Total de computadoras: <strong
                                            class="text-red-800">{{ $cuartaPc }}</strong></p>
                                    <p class="text-white">Impresoras laser: <strong
                                            class="text-red-800">{{ $impresoraLaser4da }}</strong></p>
                                    <p class="text-white">Impresora a chorro: <strong
                                            class="text-red-800">{{ $impresoraChorro4da }}</strong></p>
                                    <p class="text-white">Switch: <strong
                                            class="text-red-800">{{ $switch4da }}</strong></p>
                                    <p class="text-white">Ruter: <strong
                                            class="text-red-800">{{ $ruter4da }}</strong></p>
                                    <p class="text-white">Camaras:<strong
                                            class="text-red-800">{{ $camaras4da }}</strong></p>
                                    <p class="text-white">Sevidor/es:<strong
                                            class="text-red-800">{{ $servidor4da }}</strong></p>
                                    <p class="text-white">Central telefonica:<strong
                                            v>{{ $centralTelefonica4da }}</strong></p>
                                </div>
                            @elseif(auth()->user()->name === 'Comisaria Quinta')
                                <div>

                                    <div class="flex items-center mb-3">
                                        <div
                                            class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                viewBox="0 0 24 24">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                        <h2 class="text-white text-lg font-medium">Comisaria Quinta</h2>
                                    </div>

                                    <p class="text-white">Total de computadoras: <strong
                                            class="text-red-800">{{ $quintaPc }}</strong></p>
                                    <p class="text-white">Impresoras laser: <strong
                                            class="text-red-800">{{ $impresoraLaser5da }}</strong></p>
                                    <p class="text-white">Impresora a chorro: <strong
                                            class="text-red-800">{{ $impresoraChorro5da }}</strong></p>
                                    <p class="text-white">Switch: <strong
                                            class="text-red-800">{{ $switch5da }}</strong></p>
                                    <p class="text-white">Ruter: <strong
                                            class="text-red-800">{{ $ruter5da }}</strong></p>
                                    <p class="text-white">Camaras:<strong
                                            class="text-red-800">{{ $camaras5da }}</strong></p>
                                    <p class="text-white">Sevidor/es:<strong
                                            class="text-red-800">{{ $servidor5da }}</strong></p>
                                    <p class="text-white">Central telefonica:<strong
                                            class="text-red-800">{{ $centralTelefonica5da }}</strong></p>
                                </div>
                            @elseif(auth()->user()->name === 'Comisaria de Genero y Familia N° 1')
                                <div>

                                    <div class="flex items-center mb-3">
                                        <div
                                            class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                viewBox="0 0 24 24">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                        <h2 class="text-white text-lg font-medium">Comisaria Genero y familia N° 1</h2>
                                    </div>


                                    <p class="text-white">Total de computadoras: <strong
                                            class="text-red-800">{{ $flia1Pc }}</strong></p>
                                    <p class="text-white">Impresoras laser: <strong
                                            class="text-red-800">{{ $impresoraLaserFlia1 }}</strong></p>
                                    <p class="text-white">Impresora a chorro: <strong
                                            class="text-red-800">{{ $impresoraChorroFlia1 }}</strong></p>
                                    <p class="text-white">Switch: <strong
                                            class="text-red-800">{{ $switchFlia1 }}</strong></p>
                                    <p class="text-white">Ruter: <strong
                                            class="text-red-800">{{ $ruterFlia1 }}</strong></p>
                                    <p class="text-white">Camaras:<strong
                                            class="text-red-800">{{ $camarasFlia1 }}</strong></p>
                                    <p class="text-white">Sevidor/es:<strong
                                            class="text-red-800">{{ $servidorFlia1 }}</strong></p>
                                    <p class="text-white">Central telefonica:<strong
                                            v>{{ $centralTelefonicaFlia1 }}</strong></p>
                                </div>
                            @elseif(auth()->user()->name === 'Comisaria de Genero y Familia N° 2')
                                <div>

                                    <div class="flex items-center mb-3">
                                        <div
                                            class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                viewBox="0 0 24 24">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                        <h2 class="text-white text-lg font-medium">Comisaria de genero y familia N° 2</h2>
                                    </div>

                                    <p class="text-white">Total de computadoras: <strong
                                            class="text-red-800">{{ $flia2Pc }}</strong></p>
                                    <p class="text-white">Impresoras laser: <strong
                                            class="text-red-800">{{ $impresoraLaserFlia2 }}</strong></p>
                                    <p class="text-white">Impresora a chorro: <strong
                                            class="text-red-800">{{ $impresoraChorroFlia2 }}</strong></p>
                                    <p class="text-white">Switch: <strong
                                            class="text-red-800">{{ $switchFlia2 }}</strong></p>
                                    <p class="text-white">Ruter: <strong
                                            class="text-red-800">{{ $ruterFlia2 }}</strong></p>
                                    <p class="text-white">Camaras:<strong
                                            class="text-red-800">{{ $camarasFlia2 }}</strong></p>
                                    <p class="text-white">Sevidor/es:<strong
                                            class="text-red-800">{{ $servidorFlia2 }}</strong></p>
                                    <p class="text-white">Central telefonica:<strong
                                            class="text-red-800">{{ $centralTelefonicaFlia2 }}</strong></p>
                                </div>
                            @elseif(auth()->user()->name === 'Servicios Especiales')
                                <div>
                                    <div class="flex items-center mb-3">
                                        <div
                                            class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                viewBox="0 0 24 24">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                        <h2 class="text-white text-lg font-medium">Servicios Especiales</h2>
                                    </div>
                                    <p class="text-white">Total de computadoras: <strong
                                            class="text-red-800">{{ $serviciosPc }}</strong></p>
                                    <p class="text-white">Impresoras laser: <strong
                                            class="text-red-800">{{ $impresoraLaserServicios }}</strong></p>
                                    <p class="text-white">Impresora a chorro: <strong
                                            class="text-red-800">{{ $impresoraChorroServicios }}</strong></p>
                                    <p class="text-white">Switch: <strong
                                            class="text-red-800">{{ $switchServicios }}</strong></p>
                                    <p class="text-white">Ruter: <strong
                                            class="text-red-800">{{ $ruterServicios }}</strong></p>
                                    <p class="text-white">Camaras:<strong
                                            class="text-red-800">{{ $camarasServicios }}</strong></p>
                                    <p class="text-white">Sevidor/es:<strong
                                            class="text-red-800">{{ $servidorServicios }}</strong></p>
                                    <p class="text-white">Central telefonica:<strong
                                            class="text-red-800">{{ $centralTelefonicaServicios }}</strong></p>
                                </div>
                            @elseif(auth()->user()->name === 'Custodia Gubernamental')
                                <div>
                                    <div class="flex items-center mb-3">
                                        <div
                                            class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                viewBox="0 0 24 24">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                        <h2 class="text-white text-lg font-medium">Custodia Gubernamental</h2>
                                    </div>
                                    <p class="text-white">Total de computadoras: <strong
                                            class="text-red-800">{{ $custodiaPc }}</strong></p>
                                    <p class="text-white">Impresoras laser: <strong
                                            class="text-red-800">{{ $impresoraLaserCustodia }}</strong></p>
                                    <p class="text-white">Impresora a chorro: <strong
                                            class="text-red-800">{{ $impresoraChorroCustodia }}</strong></p>
                                    <p class="text-white">Switch: <strong
                                            class="text-red-800">{{ $switchCustodia }}</strong></p>
                                    <p class="text-white">Ruter: <strong
                                            class="text-red-800">{{ $ruterCustoadia }}</strong></p>
                                    <p class="text-white">Camaras:<strong
                                            class="text-red-800">{{ $camarasCustodia }}</strong></p>
                                    <p class="text-white">Sevidor/es:<strong
                                            class="text-red-800">{{ $servidorCustodia }}</strong></p>
                                    <p class="text-white">Central telefonica:<strong
                                            class="text-red-800">{{ $centralTelefonicaCustoadia }}</strong></p>
                                </div>
                            @else
                                <div>
                                    <p class="text-gray-600 font-bold mb-2 text-xl">Bienvenido,
                                        {{ auth()->user()->name }}</p>
                                    <!-- Otra información para otros usuarios autenticados -->
                                </div>
                            @endif
                        @else
                            <div>
                                <p class="text-gray-600 font-bold mb-2 text-xl">Bienvenido, Usuario no autenticado</p>
                                <!-- Otra información para usuarios no autenticados -->
                            </div>
                        @endif
                    </div>
                </div>
            </div>





        </div>

    </div>
    {{-- @livewire('ver-respuestas', ['tecnico_id' => $tecnico_id]) --}}
    {{-- <div class="p-4">
    <!-- ... -->
    <h2>Mensajes Recibidos:</h2>
    @foreach ($messages as $message)
        <div class="message">
            <span class="sender">{{ $message->sender->name }}:</span>
{{ $message->content }}
</div>
@endforeach
</div>

resources/views/livewire/crear-notificacion.blade.php --}}

    {{-- <div class="p-4">
    <form wire:submit.prevent="enviarNotificacion" class="max-w-md mx-auto">
        <div class="mb-4">
            <label for="tecnico_id" class="block font-medium mb-1">Seleccionar Técnico:</label>
            <select wire:model="tecnico_id" class="w-full rounded-md border border-gray-300 py-2 px-3">
                <option value="">Seleccionar técnico...</option>
                @foreach ($tecnicos as $tecnico)
                    <option value="{{ $tecnico->id }}">{{ $tecnico->name }}</option>
@endforeach
</select>
@error('tecnico_id')
<span class="text-red-500 text-sm">{{ $message }}</span>
@enderror
</div>

<div class="mb-4">
        <label for="mensaje" class="block font-medium mb-1">Mensaje:</label>
        <textarea wire:model="mensaje" class="w-full rounded-md border border-gray-300 py-2 px-3 resize-none" rows="4"></textarea>
        @error('mensaje')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
</div>

<div class="mb-4">
        <label for="activa" class="block font-medium mb-1">Marcar Orden de trabajo activa:</label>
        <input type="checkbox" wire:model="activa" class="form-checkbox">
</div>

<button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Enviar Notificación</button>
</form>
</div>

@if ($mensajeTecnico)
<div class="p-4">
        <h2 class="text-xl font-bold mb-2">Respuesta del Técnico:</h2>
        <p>{{ $mensajeTecnico }}</p>
</div>
@endif
--}}
@endsection
