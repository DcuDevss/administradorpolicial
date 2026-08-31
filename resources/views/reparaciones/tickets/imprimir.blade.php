<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>
        {{ $ticket->numero }}
    </title>

    <style>

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #111;
            margin: 30px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #111;
            padding-bottom: 15px;
        }

        .titulo {
            font-size: 20px;
            font-weight: bold;
        }

        .subtitulo {
            font-size: 12px;
            margin-top: 5px;
        }

        .ticket {
            text-align: center;
            font-size: 26px;
            font-weight: bold;
            margin: 25px 0;
        }

        .seccion {
            margin-top: 20px;
        }

        .seccion-titulo {
            font-size: 13px;
            font-weight: bold;
            border-bottom: 1px solid #999;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 7px;
            border-bottom: 1px solid #ddd;
        }

        .label {
            width: 35%;
            font-weight: bold;
        }

        .estado {
            text-align: center;
            font-size: 15px;
            font-weight: bold;
            margin: 20px 0;
        }

        .firmas {
            margin-top: 80px;
        }

        .firma {
            width: 45%;
            display: inline-block;
            text-align: center;
            vertical-align: top;
        }

        .linea {
            border-top: 1px solid #111;
            margin-top: 60px;
            padding-top: 8px;
        }

        .pie {
            margin-top: 40px;
            text-align: center;
            font-size: 10px;
        }

    </style>

</head>

<body>

    <div class="header">

        <div class="titulo">
            ÁREA DE REPARACIONES
        </div>

        <div class="subtitulo">
            Comprobante de recepción de equipo
        </div>

    </div>


    <div class="ticket">
        {{ $ticket->numero }}
    </div>


    <div class="estado">
        EQUIPO RECIBIDO
    </div>


    <div class="seccion">

        <div class="seccion-titulo">
            DATOS DEL ACTIVO
        </div>

        <table>

            <tr>
                <td class="label">
                    Activo
                </td>

                <td>
                    #{{ $ticket->activo->id }}
                </td>
            </tr>

            <tr>
                <td class="label">
                    Tipo
                </td>

                <td>
                    {{ $ticket->activo->categoria->nombre ?? '—' }}
                </td>
            </tr>

            <tr>
                <td class="label">
                    Dependencia
                </td>

                <td>
                    {{ $ticket->activo->dependencia->nombre ?? '—' }}
                </td>
            </tr>

            <tr>
                <td class="label">
                    Número de serie
                </td>

                <td>
                    {{ $ticket->activo->numero_serie ?? '—' }}
                </td>
            </tr>

            <tr>
                <td class="label">
                    Código patrimonial
                </td>

                <td>
                    {{ $ticket->activo->codigo_patrimonial ?? '—' }}
                </td>
            </tr>

        </table>

    </div>


    <div class="seccion">

        <div class="seccion-titulo">
            DATOS DE RECEPCIÓN
        </div>

        <table>

            <tr>
                <td class="label">
                    Fecha y hora
                </td>

                <td>
                    {{ $ticket->recepcion?->fecha_recepcion?->format('d/m/Y H:i') ?? '—' }}
                </td>
            </tr>

            <tr>
                <td class="label">
                    Persona que entrega
                </td>

                <td>
                    {{ $ticket->recepcion?->persona_entrega_nombre ?? '—' }}
                </td>
            </tr>

            <tr>
                <td class="label">
                    Estado físico
                </td>

                <td>
                    {{ $ticket->recepcion?->estado_fisico ?? '—' }}
                </td>
            </tr>

            <tr>
                <td class="label">
                    Accesorios
                </td>

                <td>
                    {{ $ticket->recepcion?->accesorios ?? '—' }}
                </td>
            </tr>

        </table>

    </div>


    <div class="seccion">

        <div class="seccion-titulo">
            SOLICITUD
        </div>

        <table>

            <tr>
                <td class="label">
                    Solicitud
                </td>

                <td>
                    #{{ $ticket->solicitud?->id }}
                </td>
            </tr>

            <tr>
                <td class="label">
                    Motivo
                </td>

                <td>
                    {{ $ticket->solicitud?->titulo ?? '—' }}
                </td>
            </tr>

            <tr>
                <td class="label">
                    Descripción
                </td>

                <td>
                    {{ $ticket->solicitud?->descripcion ?? '—' }}
                </td>
            </tr>

        </table>

    </div>


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


    <div class="pie">

        {{ $ticket->numero }}

        <br>

        Conservar este comprobante para la identificación del equipo.

    </div>

</body>

</html>