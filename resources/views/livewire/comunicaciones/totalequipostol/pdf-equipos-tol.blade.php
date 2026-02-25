<div>

    {{-- estilos globales PDF --}}
    <x-inventario.pdf-styles />

    {{-- SELECT --}}
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Dependencia</label>

        <select class="w-full form-control" wire:model="dependenciaId">
            <option value="0">Todas</option>

            @foreach($dependencias as $d)
                <option value="{{ is_array($d) ? $d['id'] : $d->id }}">
                    {{ is_array($d) ? $d['nombre'] : $d->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- BOTÓN --}}
    <div class="mb-4">
        <button
            type="button"
            class="btn-pdf"
            onclick="descargarPdfEquiposRg()"
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

        <h2>
            Inventario Equipos de Comunicación
        </h2>

        @php
            $depNombre = 'Todas';

            if ($dependenciaId) {
                $match = collect($dependencias)->first(fn($x) =>
                    (is_array($x) ? (int)$x['id'] : (int)$x->id) === (int)$dependenciaId
                );

                $depNombre = is_array($match)
                    ? ($match['nombre'] ?? '-')
                    : ($match->nombre ?? '-');
            }
        @endphp

        <p style="text-align:center;margin-bottom:6mm;">
            <strong>Dependencia: {{ $depNombre }} Tolhuin</strong>
        </p>


        {{-- TABLA --}}
        <table class="pdf-table">
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
                        <td colspan="4" class="text-center">
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
            window.descargarPdfEquiposRg = function () {
                const el = document.getElementById('pdf-content');
                if (!el) return;

                html2pdf().set({
                    margin: [25, 15, 20, 15],
                    filename: `inventario_tolhuin_${Date.now()}.pdf`,
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 1.4, backgroundColor: '#ffffff' },
                    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                }).from(el).save();
            }
        </script>
    </div>

</div>
