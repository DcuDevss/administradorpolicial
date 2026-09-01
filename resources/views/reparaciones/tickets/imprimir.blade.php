<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>{{ $ticket->numero }}</title>

    <style>

        @page {
            size: 72mm 210mm;
            margin: 4mm;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            width: 64mm;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 8px;
            line-height: 1.35;
            color: #111;
        }

        .header {
            text-align: center;
            border-bottom: 1px solid #111;
            padding-bottom: 5px;
            margin-bottom: 7px;
        }

        .titulo {
            font-size: 12px;
            font-weight: bold;
        }

        .subtitulo {
            font-size: 8px;
            margin-top: 2px;
        }

        .ticket {
            text-align: center;
            font-size: 15px;
            font-weight: bold;
            margin: 7px 0;
        }

        .estado {
            text-align: center;
            font-size: 9px;
            font-weight: bold;
            border: 1px solid #111;
            padding: 3px;
            margin-bottom: 8px;
        }

        .seccion {
            margin-top: 7px;
            page-break-inside: avoid;
        }

        .seccion-titulo {
            font-size: 8px;
            font-weight: bold;
            border-bottom: 1px solid #999;
            padding-bottom: 2px;
            margin-bottom: 3px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        td {
            padding: 2px 1px;
            vertical-align: top;
            border-bottom: 1px solid #ddd;
            word-wrap: break-word;
        }

        .label {
            width: 36%;
            font-weight: bold;
        }

        .valor {
            width: 64%;
        }

        .firmas {
            margin-top: 18px;
            page-break-inside: avoid;
        }

        .firma {
            width: 48%;
            display: inline-block;
            vertical-align: top;
            text-align: center;
            font-size: 7px;
        }

        .linea {
            border-top: 1px solid #111;
            margin-top: 20px;
            padding-top: 3px;
        }

        .pie {
            margin-top: 10px;
            padding-top: 5px;
            border-top: 1px solid #999;
            text-align: center;
            font-size: 7px;
        }

        .codigo {
            margin-top: 5px;
            text-align: center;
            font-size: 8px;
            font-weight: bold;
        }

        .texto-largo {
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

    </style>

</head>

<body>

    {{-- =========================================================
         ENCABEZADO
    ========================================================== --}}

    <div class="header">

        <div class="titulo">
            ÁREA DE REPARACIONES
        </div>

        <div class="subtitulo">
            Comprobante de recepción de equipo
        </div>

    </div>


    {{-- =========================================================
         NÚMERO DE TICKET
    ========================================================== --}}

    <div class="ticket">
        {{ $ticket->numero }}
    </div>


    <div class="estado">
        EQUIPO RECIBIDO
    </div>


    {{-- =========================================================
         DATOS DEL ACTIVO
    ========================================================== --}}

    <div class="seccion">

        <div class="seccion-titulo">
            DATOS DEL ACTIVO
        </div>

        <table>

            <tr>
                <td class="label">Identificador</td>
                <td class="valor">
                    #{{ $ticket->activo?->id ?? '—' }}
                </td>
            </tr>

            <tr>
                <td class="label">Tipo</td>
                <td class="valor">
                    {{ $ticket->activo?->categoria?->nombre ?? '—' }}
                </td>
            </tr>

            <tr>
                <td class="label">Marca</td>
                <td class="valor">
                    {{ $ticket->activo?->marca?->nombre ?? '—' }}
                </td>
            </tr>

            <tr>
                <td class="label">Modelo</td>
                <td class="valor">
                    {{ $ticket->activo?->modelo ?? '—' }}
                </td>
            </tr>

            <tr>
                <td class="label">N.º serie</td>
                <td class="valor">
                    {{ $ticket->activo?->numero_serie ?? '—' }}
                </td>
            </tr>

            <tr>
                <td class="label">Código patrimonial</td>
                <td class="valor">
                    {{ $ticket->activo?->codigo_patrimonial ?? '—' }}
                </td>
            </tr>

            <tr>
                <td class="label">Dependencia</td>
                <td class="valor">
                    {{ $ticket->activo?->dependencia?->nombre ?? '—' }}
                </td>
            </tr>

        </table>

    </div>


    {{-- =========================================================
         DATOS DE RECEPCIÓN
    ========================================================== --}}

    <div class="seccion">

        <div class="seccion-titulo">
            DATOS DE RECEPCIÓN
        </div>

        <table>

            <tr>
                <td class="label">Fecha y hora</td>
                <td class="valor">
                    {{ $ticket->recepcion?->fecha_recepcion?->format('d/m/Y H:i') ?? '—' }}
                </td>
            </tr>

            <tr>
                <td class="label">Entrega</td>
                <td class="valor">
                    {{ $ticket->recepcion?->persona_entrega_nombre ?? '—' }}
                </td>
            </tr>

            <tr>
                <td class="label">Estado físico</td>
                <td class="valor texto-largo">
                    {{ $ticket->recepcion?->estado_fisico ?? '—' }}
                </td>
            </tr>

            <tr>
                <td class="label">Accesorios</td>
                <td class="valor texto-largo">
                    {{ $ticket->recepcion?->accesorios ?? '—' }}
                </td>
            </tr>

            <tr>
                <td class="label">Observaciones</td>
                <td class="valor texto-largo">
                    {{ $ticket->recepcion?->observaciones ?? '—' }}
                </td>
            </tr>

        </table>

    </div>


    {{-- =========================================================
         SOLICITUD
    ========================================================== --}}

    <div class="seccion">

        <div class="seccion-titulo">
            SOLICITUD DE REPARACIÓN
        </div>

        <table>

            <tr>
                <td class="label">Solicitud</td>
                <td class="valor">
                    #{{ $ticket->solicitud?->id ?? '—' }}
                </td>
            </tr>

            <tr>
                <td class="label">Motivo</td>
                <td class="valor texto-largo">
                    {{ $ticket->solicitud?->titulo ?? '—' }}
                </td>
            </tr>

            <tr>
                <td class="label">Descripción</td>
                <td class="valor texto-largo">
                    {{ $ticket->solicitud?->descripcion ?? '—' }}
                </td>
            </tr>

            <tr>
                <td class="label">Prioridad</td>
                <td class="valor">
                    {{ ucfirst($ticket->solicitud?->prioridad ?? '—') }}
                </td>
            </tr>

        </table>

    </div>


    {{-- =========================================================
         FIRMAS
    ========================================================== --}}

    <div class="firmas">

        <div class="firma">

            <div class="linea">
                Firma y aclaración
            </div>

            <div>
                Persona que entrega
            </div>

        </div>

        <div class="firma">

            <div class="linea">
                Firma y aclaración
            </div>

            <div>
                Personal de Reparaciones
            </div>

        </div>

    </div>


    {{-- =========================================================
         PIE
    ========================================================== --}}

    <div class="pie">

        <strong>{{ $ticket->numero }}</strong>

        <br>

        Conservar este comprobante para identificar el equipo.

        <div class="codigo">
            Código de verificación
            <br>
            {{ $ticket->codigo_verificacion }}
        </div>

    </div>

</body>

</html>