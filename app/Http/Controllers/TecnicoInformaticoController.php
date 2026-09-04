<?php

namespace App\Http\Controllers;

use App\Services\Reparaciones\ResumenReparacionesService;

class TecnicoInformaticoController extends Controller
{
    public function index(ResumenReparacionesService $service)
    {
        return view('tecnico-informatico', $service->obtener());
    }
}
