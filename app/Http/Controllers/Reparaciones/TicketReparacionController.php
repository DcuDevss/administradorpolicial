<?php

namespace App\Http\Controllers\Reparaciones;

use App\Http\Controllers\Controller;
use App\Models\TicketReparacion;
use Barryvdh\DomPDF\Facade\Pdf;

class TicketReparacionController extends Controller
{
    public function imprimir(TicketReparacion $ticket)
    {
        $ticket->load([
            'solicitud',
            'activo.dependencia',
            'activo.categoria',
            'recepcion',
        ]);

        $pdf = Pdf::loadView(
            'reparaciones.tickets.imprimir',
            [
                'ticket' => $ticket,
            ]
        );

        return $pdf->stream(
            $ticket->numero . '.pdf'
        );
    }

    
}
