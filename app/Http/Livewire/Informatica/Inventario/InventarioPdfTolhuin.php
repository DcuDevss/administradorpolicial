<?php

namespace App\Http\Livewire\Informatica\Inventario;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\DependenciaTolhuin;

class InventarioPdfTolhuin extends Component
{
    public $dependencias = [];

    public int $dependenciaSeleccionada = 0;

    public $registros = [];

    public function mount()
    {
        $this->dependencias = DependenciaTolhuin::orderBy('nombre')
            ->pluck('nombre', 'id')
            ->toArray();
    }

    public function updatedDependenciaSeleccionada()
    {
        if (!$this->dependenciaSeleccionada) {
            $this->registros = [];
            return;
        }

        $dep = (int) $this->dependenciaSeleccionada;

        // último registro por equipo
        $sub = DB::table('tolhuingenerales')
            ->selectRaw('MAX(id) as id')
            ->where('dependencia_tolhuin_id', $dep)
            ->groupBy(DB::raw('COALESCE(codigo_qr, id)'));

        $this->registros = DB::table('tolhuingenerales as t1')
            ->joinSub($sub, 't2', fn ($join) =>
                $join->on('t1.id', '=', 't2.id')
            )
            ->join('tipodispositivos', 'tipodispositivos.id', '=', 't1.tipodispositivo_id')
            ->select(
                'tipodispositivos.nombre as tipo',
                't1.marca',
                't1.detalles_inventario',
                't1.fecha_inventario'
            )
            ->orderBy('t1.tipodispositivo_id')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.informatica.inventario.inventario-pdf-tolhuin');
    }
}
