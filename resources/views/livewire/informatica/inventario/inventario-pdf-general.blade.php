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

        /* =========================
        CONTENEDOR PDF
        ========================= */
        #pdf-content{
            padding: 30mm 20mm 20mm 20mm;
            background:#fff !important;
            color:#000 !important;
            width:100%;
            margin:auto;
        }

        /* =========================
        TABLA
        ========================= */
        #pdf-content table{
            width:100%;
            border-collapse:collapse;
            table-layout:fixed;
            font-size:12px;
        }

        /* 🔹 encabezado NEGRO */
        #pdf-content thead{
            display: table-header-group;
        }

        #pdf-content thead th{
            background:#000 !important;
            color:#fff !important;
            font-weight:600;
        }

        /* 🔹 cuerpo BLANCO */
        #pdf-content tbody td{
            background:#fff !important;
            color:#000 !important;
        }

        /* no cortar filas entre páginas */
        #pdf-content tr{
            page-break-inside: avoid;
        }

        #pdf-content th,
        #pdf-content td{
            border:1px solid #ddd;
            padding:6px;
            word-break: break-word;
            overflow-wrap: break-word;
            white-space: normal;
        }

        /* =========================
        ANCHOS COLUMNAS
        ========================= */
        .col-dep   { width:22%; }
        .col-tipo  { width:18%; }
        .col-marca { width:18%; }
        .col-det   { width:42%; }
    </style>



    {{-- BOTON --}}
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


    {{-- CONTENIDO PDF --}}
    <div id="pdf-content">

        <div style="display:flex; justify-content:flex-end; margin-bottom:8mm;">
            <div style="font-size:12px;">
                <strong>Fecha:</strong> {{ now()->format('d/m/Y H:i') }}
            </div>
        </div>

        <h2 style="text-align:center;margin-bottom:6mm;">
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
