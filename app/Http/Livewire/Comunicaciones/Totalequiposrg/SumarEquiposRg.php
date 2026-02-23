<?php

namespace App\Http\Livewire\Comunicaciones\Totalequiposrg;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SumarEquiposRg extends Component
{
    public $sumaHt;
    public $sumaEquipoBase;
    public $sumaRepetidora;
    public $sumaFuentePoder;
    public $sumaBaliza;
    public $sumaAntena;
    public $sumaOtros;
    public $sumaSinDatos;
    public $sumaPtt;
    public $sumaComandoBaliza;

    public function mount()
    {
        $this->contarEquipos();
    }

    protected function sumarPorTipo(int $tipoId): int
    {
        return DB::table('comunicacionesrgs')
            ->where('equipocomunicacion_id', $tipoId)
            ->whereNotNull('dependencia_riogrande_id') // opcional, pero sigue la misma lógica que informática
            ->count();
    }

    public function contarEquipos()
    {
        // mismos IDs que Ushuaia:
        // 3 = Equipo base
        // 4 = HT
        // 5 = Repetidora
        // 6 = Fuente de poder
        // 7 = Baliza
        // 8 = Antena
        // 1 = Otros
        // 2 = Sin datos

        $this->sumaEquipoBase   = $this->sumarPorTipo(3);
        $this->sumaHt           = $this->sumarPorTipo(4);
        $this->sumaRepetidora   = $this->sumarPorTipo(5);
        $this->sumaFuentePoder  = $this->sumarPorTipo(6);
        $this->sumaBaliza       = $this->sumarPorTipo(7);
        $this->sumaAntena       = $this->sumarPorTipo(8);
        $this->sumaOtros        = $this->sumarPorTipo(1);
        $this->sumaSinDatos     = $this->sumarPorTipo(2);
        $this->sumaPtt     = $this->sumarPorTipo(9);
        $this->sumaComandoBaliza     = $this->sumarPorTipo(10);
    }

    public function render()
    {
        return view('livewire.comunicaciones.totalequiposrg.sumar-equipos-rg');
    }
}
