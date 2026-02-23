<?php

namespace App\Http\Livewire\Comunicaciones\Totalequiposprov;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PdfEquiposProv extends Component
{
    public $registros = [];

    public function mount()
    {
        $this->cargar();
    }

    public function cargar()
    {
        $rg = DB::table('comunicacionesrgs as c')
            ->leftJoin('equipocomunicacions as e', 'e.id', '=', 'c.equipocomunicacion_id')
            ->leftJoin('dependencia_riograndes as d', 'd.id', '=', 'c.dependencia_riogrande_id')
            ->select(
                DB::raw("'Río Grande' as ciudad"),
                'd.nombre as dependencia',
                'e.nombre as tipo_equipo',
                'c.nro_serie',
                'c.condicion_equipo_comunicacion',
                'c.fecha_inventario'
            );

        $tol = DB::table('comunicacionestolhuins as c')
            ->leftJoin('equipocomunicacions as e', 'e.id', '=', 'c.equipocomunicacion_id')
            ->leftJoin('dependencia_tolhuins as d', 'd.id', '=', 'c.dependencia_tolhuin_id')
            ->select(
                DB::raw("'Tolhuin' as ciudad"),
                'd.nombre as dependencia',
                'e.nombre as tipo_equipo',
                'c.nro_serie',
                'c.condicion_equipo_comunicacion',
                'c.fecha_inventario'
            );

        $ushuaiaTablas = [
            'comunicacionesprimeras' => 'Primera',
            'comunicacionessegundas' => 'Segunda',
            'comunicacionesterceras' => 'Tercera',
            'comunicacionescuartas' => 'Cuarta',
            'comunicacionesquintas' => 'Quinta',
            'comunicacionesadministracions' => 'Administración',
            'comunicacionesautomotores' => 'Automotores',
            'comunicacionescientificas' => 'Científica',
            'comunicacionescomplejos' => 'Delitos Complejos',
            'comunicacionescustodias' => 'Custodia Gubernamental',
            'comunicacionesdesus' => 'D.S.E.U',
            'comunicacionesdto365s' => 'Dto. 365',
            'comunicacionesfamilia1s' => 'Familia 1',
            'comunicacionesfamilia2s' => 'Familia 2',
            'comunicacionesinvestigacions' => 'Investigaciones',
            'comunicacionesnarcos' => 'Narcocriminalidad',
            'comunicacionesrecursos' => 'Recursos Humanos',
            'comunicacionesjefaturas' => 'Jefatura',
        ];

        $ush = null;

        foreach ($ushuaiaTablas as $tabla => $label) {

            $q = DB::table("$tabla as c")
                ->leftJoin('equipocomunicacions as e', 'e.id', '=', 'c.equipocomunicacion_id')
                ->select(
                    DB::raw("'Ushuaia' as ciudad"),
                    DB::raw("'$label' as dependencia"),
                    'e.nombre as tipo_equipo',
                    'c.nro_serie',
                    'c.condicion_equipo_comunicacion',
                    'c.fecha_inventario'
                );

            $ush = $ush ? $ush->unionAll($q) : $q;
        }


        $this->registros = $rg
            ->unionAll($tol)
            ->unionAll($ush)
            ->orderBy('ciudad')
            ->orderBy('dependencia')
            ->orderBy('tipo_equipo')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.comunicaciones.totalequiposprov.pdf-equipos-prov');
    }
}
