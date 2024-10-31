<?php

namespace App\Http\Livewire\Comunicaciones\Totalequiposush;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SumarEquipos extends Component
{

    public $sumaHt;
    public $sumaEquipoBase;
    public $sumaRepetidora;
    public $sumaFuentePoder;
    public $sumaBaliza;
    public $sumaAntena;
    public $sumaOtros;
    public $sumaSinDatos;

    public function mount()
    {
        $this->contarEquipos();
    }

    public function contarEquipos()
    {
        // Sumar equipo base de todas las tablas
        $this->sumaEquipoBase = DB::table('comunicacionesprimeras')->where('equipocomunicacion_id', 3)->count()
                            + DB::table('comunicacionessegundas')->where('equipocomunicacion_id', 3)->count()
                            + DB::table('comunicacionesterceras')->where('equipocomunicacion_id', 3)->count()
                            + DB::table('comunicacionescuartas')->where('equipocomunicacion_id', 3)->count()
                            + DB::table('comunicacionesquintas')->where('equipocomunicacion_id', 3)->count()
                            + DB::table('comunicacionesadministracions')->where('equipocomunicacion_id', 3)->count()
                            + DB::table('comunicacionesautomotores')->where('equipocomunicacion_id', 3)->count()
                            + DB::table('comunicacionescientificas')->where('equipocomunicacion_id', 3)->count()
                            + DB::table('comunicacionescomplejos')->where('equipocomunicacion_id', 3)->count()
                            + DB::table('comunicacionescustodias')->where('equipocomunicacion_id', 3)->count()
                            + DB::table('comunicacionesdesus')->where('equipocomunicacion_id', 3)->count()
                            + DB::table('comunicacionesdto365s')->where('equipocomunicacion_id', 3)->count()
                            + DB::table('comunicacionesfamilia1s')->where('equipocomunicacion_id', 3)->count()
                            + DB::table('comunicacionesinvestigacions')->where('equipocomunicacion_id', 3)->count()
                            + DB::table('comunicacionesnarcos')->where('equipocomunicacion_id', 3)->count()
                            + DB::table('comunicacionesrecursos')->where('equipocomunicacion_id', 3)->count()
                            + DB::table('comunicacionesjefaturas')->where('equipocomunicacion_id', 3)->count();

        // Sumar HT de todas las tablas
        $this->sumaHt = DB::table('comunicacionesprimeras')->where('equipocomunicacion_id', 4)->count()
                    + DB::table('comunicacionessegundas')->where('equipocomunicacion_id', 4)->count()
                    + DB::table('comunicacionesterceras')->where('equipocomunicacion_id', 4)->count()
                    + DB::table('comunicacionescuartas')->where('equipocomunicacion_id', 4)->count()
                    + DB::table('comunicacionesquintas')->where('equipocomunicacion_id', 4)->count()
                    + DB::table('comunicacionesadministracions')->where('equipocomunicacion_id', 4)->count()
                    + DB::table('comunicacionesautomotores')->where('equipocomunicacion_id', 4)->count()
                    + DB::table('comunicacionescientificas')->where('equipocomunicacion_id', 4)->count()
                    + DB::table('comunicacionescomplejos')->where('equipocomunicacion_id', 4)->count()
                    + DB::table('comunicacionescustodias')->where('equipocomunicacion_id', 4)->count()
                    + DB::table('comunicacionesdesus')->where('equipocomunicacion_id', 4)->count()
                    + DB::table('comunicacionesdto365s')->where('equipocomunicacion_id', 4)->count()
                    + DB::table('comunicacionesfamilia1s')->where('equipocomunicacion_id', 4)->count()
                    + DB::table('comunicacionesinvestigacions')->where('equipocomunicacion_id', 4)->count()
                    + DB::table('comunicacionesnarcos')->where('equipocomunicacion_id', 4)->count()
                    + DB::table('comunicacionesrecursos')->where('equipocomunicacion_id', 4)->count()
                    + DB::table('comunicacionesjefaturas')->where('equipocomunicacion_id', 4)->count();

        // Sumar Repetidora
        $this->sumaRepetidora = DB::table('comunicacionesprimeras')->where('equipocomunicacion_id', 5)->count()
                            + DB::table('comunicacionessegundas')->where('equipocomunicacion_id', 5)->count()
                            + DB::table('comunicacionesterceras')->where('equipocomunicacion_id', 5)->count()
                            + DB::table('comunicacionescuartas')->where('equipocomunicacion_id', 5)->count()
                            + DB::table('comunicacionesquintas')->where('equipocomunicacion_id', 5)->count()
                            + DB::table('comunicacionesadministracions')->where('equipocomunicacion_id', 5)->count()
                            + DB::table('comunicacionesautomotores')->where('equipocomunicacion_id', 5)->count()
                            + DB::table('comunicacionescientificas')->where('equipocomunicacion_id', 5)->count()
                            + DB::table('comunicacionescomplejos')->where('equipocomunicacion_id', 5)->count()
                            + DB::table('comunicacionescustodias')->where('equipocomunicacion_id', )->count()
                            + DB::table('comunicacionesdesus')->where('equipocomunicacion_id', 5)->count()
                            + DB::table('comunicacionesdto365s')->where('equipocomunicacion_id', 5)->count()
                            + DB::table('comunicacionesfamilia1s')->where('equipocomunicacion_id', 5)->count()
                            + DB::table('comunicacionesinvestigacions')->where('equipocomunicacion_id', 5)->count()
                            + DB::table('comunicacionesnarcos')->where('equipocomunicacion_id', 5)->count()
                            + DB::table('comunicacionesrecursos')->where('equipocomunicacion_id', 5)->count()
                            + DB::table('comunicacionesjefaturas')->where('equipocomunicacion_id', 5)->count();

        // Sumar Fuente de poder
        $this->sumaFuentePoder = DB::table('comunicacionesprimeras')->where('equipocomunicacion_id', 6)->count()
                            + DB::table('comunicacionessegundas')->where('equipocomunicacion_id', 6)->count()
                            + DB::table('comunicacionesterceras')->where('equipocomunicacion_id', 6)->count()
                            + DB::table('comunicacionescuartas')->where('equipocomunicacion_id', 6)->count()
                            + DB::table('comunicacionesquintas')->where('equipocomunicacion_id', 6)->count()
                            + DB::table('comunicacionesadministracions')->where('equipocomunicacion_id', 6)->count()
                            + DB::table('comunicacionesautomotores')->where('equipocomunicacion_id', 6)->count()
                            + DB::table('comunicacionescientificas')->where('equipocomunicacion_id', 6)->count()
                            + DB::table('comunicacionescomplejos')->where('equipocomunicacion_id', 6)->count()
                            + DB::table('comunicacionescustodias')->where('equipocomunicacion_id', 6)->count()
                            + DB::table('comunicacionesdesus')->where('equipocomunicacion_id', 6)->count()
                            + DB::table('comunicacionesdto365s')->where('equipocomunicacion_id', 6)->count()
                            + DB::table('comunicacionesfamilia1s')->where('equipocomunicacion_id', 6)->count()
                            + DB::table('comunicacionesinvestigacions')->where('equipocomunicacion_id', 6)->count()
                            + DB::table('comunicacionesnarcos')->where('equipocomunicacion_id', 6)->count()
                            + DB::table('comunicacionesrecursos')->where('equipocomunicacion_id', 6)->count()
                            + DB::table('comunicacionesjefaturas')->where('equipocomunicacion_id', 6)->count();

        // Sumar Baliza
        $this->sumaBaliza = DB::table('comunicacionesprimeras')->where('equipocomunicacion_id', 7)->count()
                        + DB::table('comunicacionessegundas')->where('equipocomunicacion_id', 7)->count()
                        + DB::table('comunicacionesterceras')->where('equipocomunicacion_id', 7)->count()
                        + DB::table('comunicacionescuartas')->where('equipocomunicacion_id', 7)->count()
                        + DB::table('comunicacionesquintas')->where('equipocomunicacion_id', 7)->count()
                        + DB::table('comunicacionesadministracions')->where('equipocomunicacion_id', 7)->count()
                        + DB::table('comunicacionesautomotores')->where('equipocomunicacion_id', 7)->count()
                        + DB::table('comunicacionescientificas')->where('equipocomunicacion_id', 7)->count()
                        + DB::table('comunicacionescomplejos')->where('equipocomunicacion_id', 7)->count()
                        + DB::table('comunicacionescustodias')->where('equipocomunicacion_id', 7)->count()
                        + DB::table('comunicacionesdesus')->where('equipocomunicacion_id', 7)->count()
                        + DB::table('comunicacionesdto365s')->where('equipocomunicacion_id', 7)->count()
                        + DB::table('comunicacionesfamilia1s')->where('equipocomunicacion_id', 7)->count()
                        + DB::table('comunicacionesinvestigacions')->where('equipocomunicacion_id', 7)->count()
                        + DB::table('comunicacionesnarcos')->where('equipocomunicacion_id', 7)->count()
                        + DB::table('comunicacionesrecursos')->where('equipocomunicacion_id', 7)->count()
                        + DB::table('comunicacionesjefaturas')->where('equipocomunicacion_id', 7)->count();

        // Sumar Antena
        $this->sumaAntena = DB::table('comunicacionesprimeras')->where('equipocomunicacion_id', 8)->count()
                        + DB::table('comunicacionessegundas')->where('equipocomunicacion_id', 8)->count()
                        + DB::table('comunicacionesterceras')->where('equipocomunicacion_id', 8)->count()
                        + DB::table('comunicacionescuartas')->where('equipocomunicacion_id', 8)->count()
                        + DB::table('comunicacionesquintas')->where('equipocomunicacion_id', 8)->count()
                        + DB::table('comunicacionesadministracions')->where('equipocomunicacion_id', 8)->count()
                        + DB::table('comunicacionesautomotores')->where('equipocomunicacion_id', 8)->count()
                        + DB::table('comunicacionescientificas')->where('equipocomunicacion_id', 8)->count()
                        + DB::table('comunicacionescomplejos')->where('equipocomunicacion_id', 8)->count()
                        + DB::table('comunicacionescustodias')->where('equipocomunicacion_id', 8)->count()
                        + DB::table('comunicacionesdesus')->where('equipocomunicacion_id', 8)->count()
                        + DB::table('comunicacionesdto365s')->where('equipocomunicacion_id', 8)->count()
                        + DB::table('comunicacionesfamilia1s')->where('equipocomunicacion_id', 8)->count()
                        + DB::table('comunicacionesinvestigacions')->where('equipocomunicacion_id', 8)->count()
                        + DB::table('comunicacionesnarcos')->where('equipocomunicacion_id', 8)->count()
                        + DB::table('comunicacionesrecursos')->where('equipocomunicacion_id', 8)->count()
                        + DB::table('comunicacionesjefaturas')->where('equipocomunicacion_id', 8)->count();

        // Sumar Otros
        $this->sumaOtros = DB::table('comunicacionesprimeras')->where('equipocomunicacion_id', 1)->count()
                    + DB::table('comunicacionessegundas')->where('equipocomunicacion_id', 1)->count()
                    + DB::table('comunicacionesterceras')->where('equipocomunicacion_id', 1)->count()
                    + DB::table('comunicacionescuartas')->where('equipocomunicacion_id', 1)->count()
                    + DB::table('comunicacionesquintas')->where('equipocomunicacion_id', 1)->count()
                    + DB::table('comunicacionesadministracions')->where('equipocomunicacion_id', 1)->count()
                    + DB::table('comunicacionesautomotores')->where('equipocomunicacion_id', 1)->count()
                    + DB::table('comunicacionescientificas')->where('equipocomunicacion_id', 1)->count()
                    + DB::table('comunicacionescomplejos')->where('equipocomunicacion_id', 1)->count()
                    + DB::table('comunicacionescustodias')->where('equipocomunicacion_id', 1)->count()
                    + DB::table('comunicacionesdesus')->where('equipocomunicacion_id', 1)->count()
                    + DB::table('comunicacionesdto365s')->where('equipocomunicacion_id', 1)->count()
                    + DB::table('comunicacionesfamilia1s')->where('equipocomunicacion_id', 1)->count()
                    + DB::table('comunicacionesinvestigacions')->where('equipocomunicacion_id', 1)->count()
                    + DB::table('comunicacionesnarcos')->where('equipocomunicacion_id', 1)->count()
                    + DB::table('comunicacionesrecursos')->where('equipocomunicacion_id', 1)->count()
                    + DB::table('comunicacionesjefaturas')->where('equipocomunicacion_id', 1)->count();

        // Sumar Sin datos
        $this->sumaSinDatos = DB::table('comunicacionesprimeras')->where('equipocomunicacion_id', 2)->count()
                    + DB::table('comunicacionessegundas')->where('equipocomunicacion_id', 2)->count()
                    + DB::table('comunicacionesterceras')->where('equipocomunicacion_id', 2)->count()
                    + DB::table('comunicacionescuartas')->where('equipocomunicacion_id', 2)->count()
                    + DB::table('comunicacionesquintas')->where('equipocomunicacion_id', 2)->count()
                    + DB::table('comunicacionesadministracions')->where('equipocomunicacion_id', 2)->count()
                    + DB::table('comunicacionesautomotores')->where('equipocomunicacion_id', 2)->count()
                    + DB::table('comunicacionescientificas')->where('equipocomunicacion_id', 2)->count()
                    + DB::table('comunicacionescomplejos')->where('equipocomunicacion_id', 2)->count()
                    + DB::table('comunicacionescustodias')->where('equipocomunicacion_id', 2)->count()
                    + DB::table('comunicacionesdesus')->where('equipocomunicacion_id', 2)->count()
                    + DB::table('comunicacionesdto365s')->where('equipocomunicacion_id', 2)->count()
                    + DB::table('comunicacionesfamilia1s')->where('equipocomunicacion_id', 2)->count()
                    + DB::table('comunicacionesinvestigacions')->where('equipocomunicacion_id', 2)->count()
                    + DB::table('comunicacionesnarcos')->where('equipocomunicacion_id', 2)->count()
                    + DB::table('comunicacionesrecursos')->where('equipocomunicacion_id', 2)->count()
                    + DB::table('comunicacionesjefaturas')->where('equipocomunicacion_id', 2)->count();
    }




    public function render()
    {
        return view('livewire.comunicaciones.totalequiposush.sumar-equipos');
    }
}
