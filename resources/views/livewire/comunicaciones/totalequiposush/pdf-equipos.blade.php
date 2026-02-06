<div>
    <style>
    .btn-pdf {
        background-color: #4f46e5 !important; /* indigo-600 */
        color: #ffffff !important;
        font-weight: 600;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        box-shadow: 0 1px 3px rgba(0,0,0,.2);
    }

    .btn-pdf:hover {
        background-color: #4338ca !important; /* indigo-700 */
    }
    #pdf-content td {
        color: #000000 !important;
    }
    </style>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Dependencia</label>
        <select class="w-full form-control" wire:model="dependenciaTabla">
            <option value="" selected disabled>Seleccione dependencia</option>
            @foreach($dependencias as $tabla => $label)
                <option value="{{ $tabla }}">{{ $label }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <button type="button"
                class="btn-pdf"
                onclick="descargarPdfEquipos()">
            Generar PDF
        </button>
    </div>

    {{-- Esto es lo que se imprime --}}
    <div id="pdf-content" style="background:#fff;color:#000;padding:20mm;width:210mm;margin:auto;">
        <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:8mm;">
            <div style="text-align:right; font-size:12px;">
                <strong>Fecha:</strong> {{ now()->format('d/m/Y H:i') }}
            </div>
        </div>
        <h2 style="text-align:center;margin-bottom:4mm;">
            Inventario Equipos de Comunicación
        </h2>
        <div style="width:100%; text-align:center;">
            <p style="margin:3mm 0 0 0;">
                <strong>Dependencia: {{ $dependencias[$dependenciaTabla] ?? '-' }} Ushuaia</strong>
            </p>
        </div>

        <table style="width:100%;border-collapse:collapse;font-size:12px; background:#ffffff; color:#000000;">
            <thead>
                <tr>
                    <th style="border:1px solid #ddd;padding:6px;text-align:left;">Tipo equipo</th>
                    <th style="border:1px solid #ddd;padding:6px;text-align:left;">Nro serie</th>
                    <th style="border:1px solid #ddd;padding:6px;text-align:left;">Condición</th>
                    <th style="border:1px solid #ddd;padding:6px;text-align:left;">Fecha inventario</th>
                </tr>
            </thead>
            <tbody style="background:#ffffff;color:#000000;">
                @forelse($registros as $r)
                    <tr>
                        <td style="border:1px solid #ddd;padding:6px;color:#000000;">{{ $r->tipo_equipo ?? '-' }}</td>
                        <td style="border:1px solid #ddd;padding:6px;color:#000000;">{{ $r->nro_serie ?? '-' }}</td>
                        <td style="border:1px solid #ddd;padding:6px;color:#000000;">{{ $r->condicion_equipo_comunicacion ?? '-' }}</td>
                        <td style="border:1px solid #ddd;padding:6px;color:#000000;">
                            {{ $r->fecha_inventario ? \Carbon\Carbon::parse($r->fecha_inventario)->format('d/m/Y') : '-' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="border:1px solid #ddd;padding:8px;text-align:center;color:#000000;">
                            Sin datos
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- html2pdf --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        function descargarPdfEquipos() {
            const el = document.getElementById('pdf-content');
            const dep = @json($dependencias[$dependenciaTabla] ?? 'dependencia');

            html2pdf().set({
                margin: 0,
                filename: `inventario_${dep}.pdf`,
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            }).from(el).save();
        }
    </script>
</div>
