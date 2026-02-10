<?php

namespace App\Http\Livewire\Informatica\Inventario;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\DependenciaUshuaia;

class InventarioPdfUshuaia extends Component
{
    public $dependencias = [];

    // forzamos int (evita bugs raros con where)
    public int $dependenciaSeleccionada = 0;

    public $registros = [];

    public function mount()
    {
        $this->dependencias = DependenciaUshuaia::orderBy('nombre')
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

        /*
        ─────────────────────────────
        Subquery:
        - último registro por equipo
        - COALESCE evita perder los NULL
        ─────────────────────────────
        */
        $sub = DB::table('generalinformaticas')
            ->selectRaw('MAX(id) as id')
            ->where('dependencia_ushuaia_id', $dep)
            ->groupBy(DB::raw('COALESCE(codigo_qr, id)'));

        $this->registros = DB::table('generalinformaticas as t1')
            ->joinSub($sub, 't2', fn ($join) =>
                $join->on('t1.id', '=', 't2.id')
            )
            ->join('tipodispositivos', 'tipodispositivos.id', '=', 't1.tipodispositivo_id')
            ->select(
                'tipodispositivos.nombre as tipo',
                't1.marca',
                't1.detalles_inventario'
            )
            ->orderBy('t1.tipodispositivo_id')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.informatica.inventario.inventario-pdf-ushuaia');
    }
}
