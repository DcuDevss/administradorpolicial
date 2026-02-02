<div class="bg-slate-800 text-gray-900 tracking-wider leading-normal m-4">
    {{--  <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto  px-2"> --}}
    <div class="max-w mx-auto sm:px-6 lg:px-8 ">
        <section class=" bg-white text-gray-600 rounded-md px-1">
            <div class="w-full  mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <div class="py-3">
                    <div class="overflow-x-auto">
                        <div class=" pb-3">
                            <select class="rounded-md ml-3" wire:model="perPage">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select>
                            <input type="text" class="form-input text-gray-500 ml-6 rounded-md" wire:model="search"
                                placeholder="Ingrese la busqueda">
                            <button wire:click="clear" class="ml-2"><span class="fa fa-eraser"></span></button>

                        </div>
                        <table class="w-full table-auto">
                            <thead class="text-xs font-semibold uppercase text-gray-900 bg-slate-400">
                                <tr>
                                    <th class="p-1   text-center text-xs text-red-500">
                                        Nro
                                        @if ($sort1 == 'id')
                                            @if ($direction1 == 'asc')
                                                <i class="fas fa-sort-up text-yellow-400"></i>
                                            @else
                                                <i class="fas fa-sort-down text-yellow-400"></i>
                                            @endif
                                        @else
                                            <i class="fas fa-sort text-yellow-400"></i>
                                        @endif
                                    </th>
                                    <th class="p-1  text-center  text-xs text-blue-800 cursor-pointer">

                                        Administracion
                                    </th>
                                    {{-- <th class="p-1   text-center text-xs text-blue-800">

                                        Oficinias operativas
                                    </th>
                                     <th class="p-1   text-center text-xs text-blue-800">

                                        Jefatura
                                    </th>

                                    <th class="p-1   text-center text-xs text-blue-800">

                                        Investigacione
                                    </th>
                                    <th class="p-1   texte-center text-xs text-blue-800">
                                        Administracion

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Recursos humanos

                                    </th>

                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Servicios especiales

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                       Destacamentos

                                    </th> --}}

                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Tipo de dispositivos

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Marca

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Modelo

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Procesador

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Sistema operativo

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Tipo de ram

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Cantidad de ram

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Slot de memoria ram

                                    </th>

                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Tipo de disco

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Cantidad de almacenamiento

                                    </th>
                                    {{-- <th class="p-1   text-center text-xs text-blue-800">
                                        Tipo de mouse

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Tipo de teclado

                                    </th> --}}
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Fecha de servis

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Tipo de service

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Fecha de inventario

                                    </th> {{-- --}}
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Software

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Detalle del inventario

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Codigo Qr

                                    </th>

                                    <th class="p-1   text-right text-xs text-blue-800">
                                        Acciones
                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Estado

                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                @foreach ($administra as $comu)
                                    <tr>
                                        <td class="text-center py-6 font-bold">{{ $comu->id }}</td>
                                        <td class="text-center py-6 font-bold">
                                            {{ $comu->administracion->nombre ?? '----' }}</td>
                                        {{-- <td class="text-center py-6 font-bold">{{ $comu->tipodeoficina->nombre ?? '----' }}</td>
                                       <td class="text-center py-6 font-bold">{{ $comu->jefatura->nombre ?? '----' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->investigacione->nombre ?? '----' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->administracion->nombre ?? '----' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->recursohumano->nombre ?? '----' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->serviciosespeciale->nombre ?? '----' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->destacamento->nombre ?? '----' }}</td> --}}
                                        <td class="text-center py-6 font-bold">
                                            {{ $comu->tipodispositivo->nombre ?? '----' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->marca ?? '----' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->modelo ?? '----' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->procesador ?? '----' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->sistema_operativo ?? '----' }}
                                        </td>
                                        <td class="text-center py-6 font-bold">{{ $comu->tipo_ram ?? '----' }}</td>
                                        <td class="text-center py-6 font-bold">
                                            {{ $comu->cantidadram->cantidad ?? '----' }}</td>
                                        <td class="text-center py-6 font-bold">
                                            {{ $comu->slotmemoria->cantidad ?? '----' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->tipo_disco ?? '----' }}</td>
                                        <td class="text-center py-6 font-bold">
                                            {{ $comu->cant_almacenamiento ?? '----' }}</td>
                                        {{-- <td class="text-center py-6 font-bold">{{ $comu->tipo_mouse}}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->tipo_teclado}}</td> --}}
                                        <td class="text-center py-6 font-bold">{{ $comu->fecha_service ?? '----' }}
                                        </td>
                                        <td class="text-center py-6 font-bold">{{ $comu->tipo_service ?? '----' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->fecha_inventario ?? '----' }}
                                        </td>
                                        <td class="text-center py-6 font-bold">
                                            {{ $comu->softwares_instalados ?? '----' }}</td>{{-- --}}
                                        <td class="text-center py-6 font-bold">
                                            {{ $comu->detalles_inventario ?? '----' }}</td>

                                        <td class="border px-4 py-2">
                                            @if ($comu->codigo_qr)
                                                <div x-data="{ open: false }">
                                                    <img x-on:click="open = !open"
                                                        src="{{ asset('storage/codigoQR/Administracion/' . $comu->codigo_qr) }}"
                                                        alt="Código QR" class="cursor-pointer">

                                                    <div x-show="open"
                                                        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                                                        <div class="relative">
                                                            <img src="{{ asset('storage/codigoQR/Administracion/' . $comu->codigo_qr) }}"
                                                                alt="Código QR" class="max-w-full max-h-full">
                                                            <button x-on:click="open = false"
                                                                class="absolute top-0 right-0 m-3 text-white text-2xl cursor-pointer">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ asset('storage/codigoQR/Administracion/' . $comu->codigo_qr) }}"
                                                    download>
                                                    <button
                                                        class="mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Descargar
                                                        QR</button>
                                                </a>
                                            @endif
                                        </td>

                                        <td class="text-center py-6 font-bold">
                                            @if ($comu->activo)
                                                <span class="px-2 py-1 bg-blue-600 text-white rounded">Activo</span>
                                            @else
                                                <span class="px-2 py-1 bg-red-600 text-white rounded">Inactivo</span>
                                            @endif
                                        </td>

                                        <td class="text-center py-2 flex flex-col space-y-2">
                                            <a href="{{ route('editAdministracionGeneral', $comu->id) }}"
                                                class="inline-block bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 mr-1 rounded">
                                                Editar
                                            </a>
                                            <a href="{{ route('historial-administracion-general', $comu->id) }}"
                                                class="inline-block bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 mr-1 rounded">
                                                Modificaciones
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div
                            class="bg-white px-4 py-3 text-justify  items-center justify-between border-gray-200 sm:px-6 float-right">
                            {{ $administra->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
