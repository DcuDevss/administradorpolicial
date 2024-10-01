<div class="flex justify-center mx-auto">
    <div x-data="{ dataTable: null }" x-init="dataTable = new simpleDatatable($refs.table)">
        <div class="mx-auto">
            <table x-ref="table" class="table-auto w-full sm:w-3/4 md:w-2/3 lg:w-1/2 mx-auto">
                <thead>
                    <tr>
                        <th class="px-3 py-2">ID</th>
                        <th class="px-33 py-2">Oficina</th>
                        <th class="px-3 py-2">Dispositivo</th>
                        <th class="px-3 py-2">Tipo de ram</th>
                        <th class="px-3 py-2">Cantidad RAM</th>
                        <th class="px-3 py-2">Slot Ram</th>
                        <th class="px-3 py-2">Marca</th>
                        <th class="px-3 py-2">Modelo</th>
                        <th class="px-3 py-2">Procesador</th>
                        <th class="px-3 py-2">Tipo de discos</th>
                        <th class="px-3 py-2">Almacenamiento</th>
                        <th class="px-3 py-2">Monitor</th>
                        <th class="px-3 py-2">Sistema Operativo</th>
                        <th class="px-3 py-2">Teclado</th>
                        <th class="px-3 py-2">Mouse</th>
                        <th class="px-3 py-2">Impresora</th>
                        <th class="px-3 py-2">Fecha de Servicio</th>
                        <th class="px-3 py-2">Activo</th>
                        <th class="px-3 py-2">Detalles del Servicio</th>
                        <th class="px-3 py-2">Código QR</th> <!-- Nueva columna para el código QR -->
                        <th class="px-3 py-2">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comisariaPri as $comisaria)
                        <tr>
                            <td class="border px-4 py-2">{{ $comisaria->id }}</td>
                            <td class="border px-4 py-2">{{ $comisaria->tipodeoficina->nombre }}</td>
                            <td class="border px-4 py-2">{{ $comisaria->tipodispositivo->nombre }}</td>
                            <td class="border px-4 py-2">{{ $comisaria->tipo_ram }}</td>
                            <td class="border px-4 py-2">{{ $comisaria->cantidadram->cantidad }}</td>
                            <td class="border px-4 py-2">{{ $comisaria->slotmemoria->cantidad }}</td>
                            <td class="border px-4 py-2">{{ $comisaria->marca }}</td>
                            <td class="border px-4 py-2">{{ $comisaria->modelo }}</td>
                            <td class="border px-4 py-2">{{ $comisaria->procesador }}</td>
                            <td class="border px-4 py-2">{{ $comisaria->tipo_disco }}</td>
                            <td class="border px-4 py-2">{{ $comisaria->cant_almacenamiento }}</td>
                            <td class="border px-4 py-2">{{ $comisaria->monitor }}</td>
                            <td class="border px-4 py-2">{{ $comisaria->sistema_operativo }}</td>
                            <td class="border px-4 py-2">{{ $comisaria->tipo_teclado }}</td>
                            <td class="border px-4 py-2">{{ $comisaria->tipo_mouse }}</td>
                            <td class="border px-4 py-2">{{ $comisaria->tipo_impresora }}</td>
                            <td class="border px-4 py-2">{{ $comisaria->fecha_inventario }}</td>
                            <td class="border px-4 py-2">
                                @if ($comisaria->activo)
                                    <span class="px-2 py-1 bg-blue-600 text-white rounded">Activo</span>
                                @else
                                    <span class="px-2 py-1 bg-red-600 text-white rounded">Inactivo</span>
                                @endif
                            </td>

                            <td class="border px-4 py-2">{{ $comisaria->detalles_inventario }}</td>
                            <td class="border px-4 py-2">
                                @if ($comisaria->codigo_qr)
                                    <div x-data="{ open: false }">
                                        <img x-on:click="open = !open"
                                            src="{{ asset('storage/codigoQR/comisariaPrimera/' . $comisaria->codigo_qr) }}"
                                            alt="Código QR" class="cursor-pointer">

                                        <div x-show="open"
                                            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                                            <div class="relative">
                                                <img src="{{ asset('storage/codigoQR/comisariaPrimera/' . $comisaria->codigo_qr) }}"
                                                    alt="Código QR" class="max-w-full max-h-full">
                                                <button x-on:click="open = false"
                                                    class="absolute top-0 right-0 m-3 text-white text-2xl cursor-pointer">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ asset('storage/codigoQR/comisariaPrimera/' . $comisaria->codigo_qr) }}"
                                        download>
                                        <button
                                            class="mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Descargar
                                            QR</button>
                                    </a>
                                @endif
                            </td>
                            <td class="border px-4 py-2">

                                <a href="{{ route('EditComisaria1', $comisaria->id) }}"
                                    class="inline-block bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 rounded">
                                    Editar
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

</div>



@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js"></script>
    <script>
        function simpleDatatable(table) {
            return {
                table,
                sortColumn: '',
                sortDirection: 'asc',
                init() {
                    this.sortColumn = this.table.querySelector('thead th:first-child').textContent;
                    this.sortTable();
                },
                sortTable() {
                    const column = Array.from(this.table.querySelectorAll('thead th')).find(th => th.textContent === this
                        .sortColumn);
                    const columnIndex = Array.from(this.table.querySelectorAll('thead th')).indexOf(column);

                    const rows = Array.from(this.table.querySelectorAll('tbody tr'));

                    rows.sort((a, b) => {
                        const aValue = a.querySelectorAll('td')[columnIndex].textContent.trim();
                        const bValue = b.querySelectorAll('td')[columnIndex].textContent.trim();

                        return (this.sortDirection === 'asc' ? 1 : -1) * aValue.localeCompare(bValue, undefined, {
                            numeric: true,
                            sensitivity: 'base'
                        });
                    });


                    rows.forEach(row => this.table.querySelector('tbody').appendChild(row));
                },
                sortBy(column) {
                    if (column === this.sortColumn) {
                        this.sortDirection = this.sortDirection === 'asc' ? 'desc' : 'asc';
                    } else {
                        this.sortColumn = column;
                        this.sortDirection = 'asc';
                    }

                    this.sortTable();
                },
            };
        }
    </script>
@endpush
