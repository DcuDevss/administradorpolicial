<?php

namespace App\Http\Livewire\Informatica\Inventario;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class InventarioPdfAdministracion extends Component
{
    public $registros = [];

    public function mount()
    {
        $this->registros = DB::table('administraciongenerales as t1')
            ->join('tipodispositivos', 'tipodispositivos.id', '=', 't1.tipodispositivo_id')
            ->leftJoin('administracions as a', 'a.id', '=', 't1.administracion_id') // relación oficina
            ->select(
                'tipodispositivos.nombre as tipo', // tipo de equipo
                'a.nombre as oficina',            // oficina donde está el equipo
                't1.marca',
                't1.detalles_inventario',
                't1.fecha_inventario'
            )
            ->orderBy('tipodispositivos.nombre')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.informatica.inventario.inventario-pdf-administracion');
    }
}
