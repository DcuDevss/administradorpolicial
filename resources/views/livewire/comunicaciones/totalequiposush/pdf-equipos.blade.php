<div>

    <x-inventario.pdf-styles />

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Dependencia</label>

        <select class="w-full form-control" wire:model="dependenciaTabla">
            <option value="0">Todas</option>

            @foreach($dependencias as $tabla => $label)
                <option value="{{ $tabla }}">{{ $label }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <button
            type="button"
            class="btn-pdf"
            onclick="descargarPdfEquipos()"
            @disabled(empty($registros))
        >
            Generar PDF
        </button>
    </div>

    {{-- CONTENIDO PDF --}}
    <div id="pdf-content" class="pdf-wrapper">

        <div style="display:flex; justify-content:flex-end; margin-bottom:8mm;">
            <div style="font-size:12px;">
                <strong>Fecha:</strong> {{ now()->format('d/m/Y H:i') }}
            </div>
        </div>

        <h2 id="titulo_pdf">
            Inventario Equipos de Comunicación
        </h2>

        <p style="text-align:center;margin-bottom:6mm;">
            <strong>
                Dependencia:
                {{ $dependenciaTabla == 0 ? 'Todas' : ($dependencias[$dependenciaTabla] ?? '-') }}
                Ushuaia
            </strong>
        </p>

        <table>
            <thead>
                <tr>
                    <th>Tipo equipo</th>
                    <th>Nro serie</th>
                    <th>Condición</th>
                    <th>Fecha inventario</th>
                </tr>
            </thead>

            <tbody>
                @forelse($registros as $r)
                    <tr>
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
                        <td colspan="4" class="text-center">Sin datos</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- html2pdf --}}
    <div wire:ignore>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

        <script>
            function descargarPdfEquipos() {
                const el = document.getElementById('pdf-content');
                if (!el) return;

                const dep = @json($dependenciaTabla == 0 ? 'todas' : ($dependencias[$dependenciaTabla] ?? 'dependencia'));

                html2pdf().set({
                    margin: [25, 15, 20, 15],
                    filename: `inventario_ushuaia_${dep}_${Date.now()}.pdf`,
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 1.4, backgroundColor: '#ffffff' },
                    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                }).from(el).save();
            }
        </script>
    </div>

</div>
