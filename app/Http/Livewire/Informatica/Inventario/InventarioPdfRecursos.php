<?php

namespace App\Http\Livewire\Informatica\Inventario;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class InventarioPdfRecursos extends Component
{
    public $registros = [];

    public function mount()
    {
        $this->registros = DB::table('recursoshumanosgenerales as t1')
            ->leftJoin('tipodispositivos', 'tipodispositivos.id', '=', 't1.tipodispositivo_id')
            ->leftJoin('recurso_humanos', 'recurso_humanos.id', '=', 't1.recurso_humano_id')
            ->select(
                'tipodispositivos.nombre as tipo',
                't1.marca',
                't1.modelo',
                't1.detalles_inventario',
                't1.fecha_inventario',
                'recurso_humanos.nombre as oficina'
            )
            ->orderBy('t1.tipodispositivo_id')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.informatica.inventario.inventario-pdf-recurso');
    }
}
