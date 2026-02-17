<?php

namespace App\Http\Livewire\Comunicaciones\Totalequiposush;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PdfEquipos extends Component
{
    // 0 = todas
    public $dependenciaTabla = 0;

    public $dependencias = [];
    public $registros = [];

    public function mount()
    {
        $this->dependencias = [
            'comunicacionesprimeras' => 'Comunicaciones Primera',
            'comunicacionessegundas' => 'Comunicaciones Segunda',
            'comunicacionesterceras' => 'Comunicaciones Tercera',
            'comunicacionescuartas'  => 'Comunicaciones Cuarta',
            'comunicacionesquintas'  => 'Comunicaciones Quinta',
            'comunicacionesadministracions' => 'Administración',
            'comunicacionesautomotores' => 'Automotores',
            'comunicacionescientificas' => 'Científica',
            'comunicacionescomplejos' => 'Complejos',
            'comunicacionescustodias' => 'Custodias',
            'comunicacionesdesus' => 'DESU',
            'comunicacionesdto365s' => 'DTO 365',
            'comunicacionesfamilia1s' => 'Familia 1',
            'comunicacionesfamilia2s' => 'Familia 2',
            'comunicacionesinvestigacions' => 'Investigación',
            'comunicacionesnarcos' => 'Narcos',
            'comunicacionesrecursos' => 'Recursos',
            'comunicacionesjefaturas' => 'Jefaturas',
        ];

        // cargar todas al iniciar
        $this->cargar();
    }

    public function updatedDependenciaTabla()
    {
        $this->cargar();
    }

    public function cargar()
    {
        /*
        ─────────────────────────────
        TODAS (UNION ALL)
        ─────────────────────────────
        */
        if (!$this->dependenciaTabla) {

            $queries = [];

            foreach ($this->dependencias as $tabla => $label) {
                $queries[] = DB::table($tabla)
                    ->leftJoin('equipocomunicacions', 'equipocomunicacions.id', '=', $tabla.'.equipocomunicacion_id')
                    ->select(
                        DB::raw("'{$label}' as dependencia"),
                        'equipocomunicacions.nombre as tipo_equipo',
                        $tabla.'.nro_serie',
                        $tabla.'.condicion_equipo_comunicacion',
                        $tabla.'.fecha_inventario'
                    );
            }

            $query = array_shift($queries);

            foreach ($queries as $q) {
                $query->unionAll($q);
            }

            $this->registros = DB::query()
                ->fromSub($query, 't')
                ->orderBy('tipo_equipo')
                ->get()
                ->toArray();

            return;
        }

        /*
        ─────────────────────────────
        UNA SOLA
        ─────────────────────────────
        */
        $tabla = $this->dependenciaTabla;

        $this->registros = DB::table($tabla)
            ->leftJoin('equipocomunicacions', 'equipocomunicacions.id', '=', $tabla.'.equipocomunicacion_id')
            ->select(
                DB::raw("'{$this->dependencias[$tabla]}' as dependencia"),
                'equipocomunicacions.nombre as tipo_equipo',
                $tabla.'.nro_serie',
                $tabla.'.condicion_equipo_comunicacion',
                $tabla.'.fecha_inventario'
            )
            ->orderBy('equipocomunicacions.nombre')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.comunicaciones.totalequiposush.pdf-equipos');
    }
}
