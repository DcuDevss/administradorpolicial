<div>

    <x-inventario.pdf-styles />

    <div class="mb-4 mt-8">
        <button
            type="button"
            class="btn-pdf"
            onclick="descargarPdfEquiposInvestigaciones()"
            @disabled(empty($registros))
        >
            Generar PDF
        </button>
    </div>


    <div id="pdf-content">

        <div style="display:flex; justify-content:flex-end; margin-bottom:8mm;">
            <div style="font-size:12px;">
                <strong>Fecha:</strong> {{ now()->format('d/m/Y H:i') }}
            </div>
        </div>

        <h2>
            Inventario Equipos Investigaciones
        </h2>


        <table>
            <thead>
                <tr>
                    <th style="width:18%;">Oficina</th>
                    <th style="width:16%;">Tipo equipo</th>
                    <th style="width:16%;">Marca</th>
                    <th style="width:16%;">Modelo</th>
                    <th style="width:22%;">Detalles</th>
                    <th style="width:12%;">Fecha</th>
                </tr>
            </thead>

            <tbody>
            @forelse($registros as $r)
                <tr>
                    <td>{{ $r->oficina ?? '-' }}</td>
                    <td>{{ $r->tipo ?? '-' }}</td>
                    <td>{{ $r->marca ?? '-' }}</td>
                    <td>{{ $r->modelo ?? '-' }}</td>
                    <td>{{ $r->detalles_inventario ?? '-' }}</td>
                    <td>
                        {{ $r->fecha_inventario
                            ? \Carbon\Carbon::parse($r->fecha_inventario)->format('d/m/Y')
                            : '-' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;">Sin datos</td>
                </tr>
            @endforelse
            </tbody>
        </table>

    </div>


    {{-- script --}}
    <div wire:ignore>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
        <script>
            window.descargarPdfEquiposInvestigaciones = function () {
                const el = document.getElementById('pdf-content');

                html2pdf().set({
                    margin: [25, 15, 20, 15],
                    filename: `inventario_investigaciones_${Date.now()}.pdf`,
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 1.4, backgroundColor: '#ffffff' },
                    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                }).from(el).save();
            }
        </script>
    </div>

</div>
