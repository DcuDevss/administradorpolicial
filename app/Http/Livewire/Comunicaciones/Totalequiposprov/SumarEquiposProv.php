<?php

namespace App\Http\Livewire\Comunicaciones\Totalequiposprov;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SumarEquiposProv extends Component
{
    public $totalEquipoBase;
    public $totalHt;
    public $totalRepetidora;
    public $totalFuentePoder;
    public $totalBaliza;
    public $totalAntena;
    public $totalOtros;
    public $totalSinDatos;
    public $totalPtt;
    public $totalComandoBaliza;

    public function mount()
    {
        $this->contarProvincial();
    }

    protected function sumarUshuaia(int $id)
    {
        $tablas = [
            'comunicacionesprimeras',
            'comunicacionessegundas',
            'comunicacionesterceras',
            'comunicacionescuartas',
            'comunicacionesquintas',
            'comunicacionesadministracions',
            'comunicacionesautomotores',
            'comunicacionescientificas',
            'comunicacionescomplejos',
            'comunicacionescustodias',
            'comunicacionesdesus',
            'comunicacionesdto365s',
            'comunicacionesfamilia1s',
            'comunicacionesfamilia2s',
            'comunicacionesinvestigacions',
            'comunicacionesnarcos',
            'comunicacionesrecursos',
            'comunicacionesjefaturas',
        ];

        $suma = 0;

        foreach ($tablas as $tabla) {
            $suma += DB::table($tabla)
                ->where('equipocomunicacion_id', $id)
                ->count();
        }

        return $suma;
    }

    protected function sumarRg(int $id)
    {
        return DB::table('comunicacionesrgs')
            ->where('equipocomunicacion_id', $id)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();
    }

    protected function sumarTolhuin(int $id)
    {
        return DB::table('comunicacionestolhuins')
            ->where('equipocomunicacion_id', $id)
            ->whereNotNull('dependencia_tolhuin_id')
            ->count();
    }

    protected function total(int $id)
    {
        return
            $this->sumarUshuaia($id) +
            $this->sumarRg($id) +
            $this->sumarTolhuin($id);
    }

    public function contarProvincial()
    {
        $this->totalOtros   = $this->total(3);
        $this->totalSinDatos   = $this->total(3);
        $this->totalEquipoBase   = $this->total(3);
        $this->totalHt           = $this->total(4);
        $this->totalRepetidora   = $this->total(5);
        $this->totalFuentePoder  = $this->total(6);
        $this->totalBaliza       = $this->total(7);
        $this->totalAntena       = $this->total(8);
        $this->totalOtros        = $this->total(1);
        $this->totalSinDatos     = $this->total(2);
        $this->totalPtt        = $this->total(9);
        $this->totalComandoBaliza     = $this->total(10);
    }

    public function render()
    {
        return view('livewire.comunicaciones.totalequiposprov.sumar-equipos-prov');
    }
}
