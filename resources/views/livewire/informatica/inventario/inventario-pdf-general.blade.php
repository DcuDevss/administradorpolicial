<div>

    <x-inventario.pdf-styles />

    <div class="mb-4 mt-8">
        <button
            type="button"
            class="btn-pdf"
            onclick="descargarPdfGeneral()"
            @disabled(empty($registros))
        >
            Generar PDF General
        </button>
    </div>

    <div id="pdf-content">

        <div style="display:flex; justify-content:flex-end; margin-bottom:8mm;">
            <div style="font-size:12px;">
                <strong>Fecha:</strong> {{ now()->format('d/m/Y H:i') }}
            </div>
        </div>

        <h2>
            Inventario General Equipos de Informática
        </h2>

        <table>
            <thead>
                <tr>
                    <th class="col-dep">Dependencia</th>
                    <th class="col-tipo">Tipo equipo</th>
                    <th class="col-marca">Marca</th>
                    <th class="col-det">Detalles</th>
                </tr>
            </thead>

            <tbody>
            @forelse($registros as $r)
                <tr>
                    <td>{{ $r['lugar'] ?? '-' }}</td>
                    <td>{{ $r['tipo'] ?? '-' }}</td>
                    <td>{{ $r['marca'] ?? '-' }}</td>
                    <td>{{ $r['detalles_inventario'] ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align:center;">Sin datos</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{-- SCRIPT PDF --}}
    <div wire:ignore>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
        <script>
            window.descargarPdfGeneral = function () {
                const el = document.getElementById('pdf-content');

                html2pdf().set({
                    margin: [25, 15, 20, 15],
                    filename: `inventario_general_${Date.now()}.pdf`,
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 1.4, backgroundColor: '#ffffff' },
                    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                }).from(el).save();
            }
        </script>
    </div>
</div>
