<?php

namespace App\Http\Livewire\Informatica\Inventario;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class InventarioPdfGeneral extends Component
{
    public $registros = [];

    public function mount()
    {
        $this->cargar();
    }

    public function cargar()
    {
        $this->registros = collect()

            ->merge($this->traer(
                'generalinformaticas',
                'dependencia_ushuaias',
                'dependencia_ushuaia_id'
            ))

            ->merge($this->traer(
                'riograndegenerales',
                'dependencia_riograndes',
                'dependencia_riogrande_id'
            ))

            ->merge($this->traer(
                'tolhuingenerales',
                'dependencia_tolhuins',
                'dependencia_tolhuin_id'
            ))

            ->merge($this->traer(
                'administraciongenerales',
                'administracions',
                'administracion_id'
            ))

            ->merge($this->traer(
                'jefaturagenerales',
                'jefaturas',
                'jefatura_id'
            ))

            ->merge($this->traer(
                'investigacionesgenerales',
                'investigaciones',
                'investigacione_id'
            ))

            ->merge($this->traer(
                'recursoshumanosgenerales',
                'recurso_humanos',
                'recurso_humano_id'
            ))

            ->sortBy('lugar')
            ->values()
            ->toArray();
    }

    /*
    ─────────────────────────────
    Query genérica reutilizable
    ─────────────────────────────
    */
    private function traer($tabla, $tablaDependencia, $campoFk)
    {
        $sub = DB::table($tabla)
            ->selectRaw('MAX(id) as id')
            ->groupBy(DB::raw('COALESCE(codigo_qr, id)'));

        return DB::table("$tabla as t1")
            ->joinSub($sub, 't2', fn ($join) =>
                $join->on('t1.id', '=', 't2.id')
            )
            ->join('tipodispositivos', 'tipodispositivos.id', '=', 't1.tipodispositivo_id')
            ->leftJoin("$tablaDependencia as d", "d.id", '=', "t1.$campoFk")

            ->select(
                'd.nombre as lugar',
                'tipodispositivos.nombre as tipo',
                't1.marca',
                't1.detalles_inventario as detalles'
            )
            ->get()

            ->map(fn ($r) => [
                'lugar' => $r->lugar ?? '-',
                'tipo' => $r->tipo ?? '-',
                'marca' => $r->marca ?? '-',
                'detalles_inventario' => $r->detalles_inventario ?? '-',
            ]);
    }

    public function render()
    {
        return view('livewire.informatica.inventario.inventario-pdf-general');
    }
}
