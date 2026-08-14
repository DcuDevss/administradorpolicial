<div>

    <x-inventario.pdf-styles />


    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">
            Categoría
        </label>

        <select class="w-full form-control" wire:model="categoriaTabla">
            <option value="0">Todas</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria['id'] }}">
                        {{ $categoria['name'] }}
                    </option>
                @endforeach
        </select>
    </div>
    
    {{-- CONTENIDO PDF --}}
    <div id="pdf-content-dcu" class="pdf-wrapper">

        <div style="display:flex; justify-content:flex-end; margin-bottom:8mm;">
            <div style="font-size:12px;">
                <strong>Fecha:</strong> {{ now()->format('d/m/Y H:i') }}
            </div>
        </div>

        <h2 id="titulo_pdf">
            Inventario DCU
        </h2>

        <p style="text-align:center;margin-bottom:6mm;">
            <strong>
                Dependencia: DCU - Ushuaia
            </strong>
        </p>

        <table>
            <thead>
                <tr>
                    <th>Categoría</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Nro. serie</th>
                    <th>Estado</th>
                    <th>Fecha inventario</th>
                </tr>
            </thead>

            <tbody>
                @forelse($registros as $r)
                    <tr>
                        <td>{{ $r->categoria ?? '-' }}</td>
                        <td>{{ $r->nombre ?? '-' }}</td>
                        <td>{{ $r->marca ?? '-' }}</td>
                        <td>{{ $r->modelo ?? '-' }}</td>
                        <td>{{ $r->numero_serie ?? '-' }}</td>
                        <td>{{ $r->estado ?? '-' }}</td>
                        <td>
                            {{ $r->fecha_inventario
                                ? \Carbon\Carbon::parse($r->fecha_inventario)->format('d/m/Y')
                                : '-' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            Sin datos
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- html2pdf --}}
    <div wire:ignore>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

        <script>
            function descargarPdfDcu() {

                const el = document.getElementById('pdf-content-dcu');

                if (!el) return;

                html2pdf().set({
                    margin: [25, 15, 20, 15],

                    filename: `inventario_dcu_ushuaia_${Date.now()}.pdf`,

                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },

                    html2canvas: {
                        scale: 1.4,
                        backgroundColor: '#ffffff'
                    },

                    jsPDF: {
                        unit: 'mm',
                        format: 'a4',
                        orientation: 'landscape'
                    }

                }).from(el).save();
            }
        </script>

        </div>

            <div class="mb-4">
            <button
                type="button"
                class="btn-pdf"
                onclick="descargarPdfDcu()"
                @disabled(empty($registros))
            >
                Generar PDF
            </button>
        </div>

</div>
