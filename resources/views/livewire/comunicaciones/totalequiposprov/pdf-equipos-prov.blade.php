<div>

    {{-- estilos reutilizables --}}
    <x-inventario.pdf-styles />

    <div class="mb-4 mt-8">
        <button type="button"
                class="btn-pdf"
                onclick="descargarPdfProvincial()"
                @disabled(empty($registros))>
            Generar PDF Provincial
        </button>
    </div>

    {{-- CONTENIDO PDF --}}
    <div id="pdf-content" class="pdf-container">

        <div style="display:flex; justify-content:flex-end; margin-bottom:8mm;">
            <div style="font-size:12px;">
                <strong>Fecha:</strong> {{ now()->format('d/m/Y H:i') }}
            </div>
        </div>

        <h2 style="text-align:center;margin-bottom:4mm;">
            Inventario Provincial Equipos de Comunicación
        </h2>

        <table class="pdf-table">
            <thead>
                <tr>
                    <th>Ciudad</th>
                    <th>Dependencia</th>
                    <th>Tipo equipo</th>
                    <th>Nro serie</th>
                    <th>Condición</th>
                    <th>Fecha inventario</th>
                </tr>
            </thead>

            <tbody>
                @forelse($registros as $r)
                    <tr>
                        <td>{{ $r->ciudad ?? '-' }}</td>
                        <td>{{ $r->dependencia ?? '-' }}</td>
                        <td>{{ $r->tipo_equipo ?? '-' }}</td>
                        <td>{{ $r->nro_serie ?? '-' }}</td>
                        <td>{{ $r->condicion_equipo_comunicacion ?? '-' }}</td>
                        <td>
                            {{ $r->fecha_inventario
                                ? \Carbon\Carbon::parse($r->fecha_inventario)->format('d/m/Y')
                                : '-' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
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
            window.descargarPdfProvincial = function () {
                const el = document.getElementById('pdf-content');
                if (!el) return;

                html2pdf().set({
                    margin: [25, 15, 20, 15],
                    filename: `inventario_provincial_${Date.now()}.pdf`,
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 1.4, backgroundColor: '#ffffff' },
                    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                }).from(el).save();
            }
        </script>
    </div>
</div>
