<div>
    <style>
        .btn-pdf {
            background-color: #4f46e5 !important;
            color: #ffffff !important;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            box-shadow: 0 1px 3px rgba(0,0,0,.2);
            text-decoration: none;
            transition: all .2s ease-in-out;
        }
        .btn-pdf:hover {
            background-color: #4338ca !important;
            box-shadow: 0 4px 6px rgba(0,0,0,.25);
            transform: translateY(-1px);
        }
        #pdf-content td { color: #000000 !important; }
    </style>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Dependencia</label>
        <select class="w-full form-control" wire:model="dependenciaId">
            <option value="" selected disabled>Seleccione dependencia</option>

            @foreach($dependencias as $d)
                <option value="{{ is_array($d) ? $d['id'] : $d->id }}">
                    {{ is_array($d) ? $d['nombre'] : $d->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <button type="button"
                class="btn-pdf"
                onclick="descargarPdfEquiposRg()"
                @disabled(empty($registros))>
            Generar PDF
        </button>
    </div>

    <div id="pdf-content" style="background:#fff;color:#000;padding:20mm;width:210mm;margin:auto;">
        <div style="display:flex; justify-content:flex-end; margin-bottom:8mm;">
            <div style="text-align:right; font-size:12px;">
                <strong>Fecha:</strong> {{ now()->format('d/m/Y H:i') }}
            </div>
        </div>

        <h2 style="text-align:center;margin-bottom:4mm;">
            Inventario Equipos de Comunicación
        </h2>

        @php
            $depNombre = '-';
            if (!empty($dependenciaId)) {
                $match = collect($dependencias)->first(fn($x) =>
                    (is_array($x) ? (int)$x['id'] : (int)$x->id) === (int)$dependenciaId
                );
                $depNombre = is_array($match) ? ($match['nombre'] ?? '-') : ($match->nombre ?? '-');
            }
        @endphp

        <div style="width:100%; text-align:center;">
            <p style="margin:3mm 0 0 0;">
                <strong>Dependencia: {{ $depNombre }} Tolhuin</strong>
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
            <tbody tbody style="background:#ffffff;color:#000000;">
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
                        <td colspan="4" style="border:1px solid #ddd;padding:8px;text-align:center;">
                            Sin datos
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div wire:ignore>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
        <script>
            window.descargarPdfEquiposRg = function () {
                const el = document.getElementById('pdf-content');
                if (!el) return;

                html2pdf().set({
                    margin: 0,
                    filename: `inventario_${Date.now()}.pdf`,
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2, backgroundColor: '#ffffff' },
                    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                }).from(el).save();
            }
        </script>
    </div>
</div>
