<?php

namespace Database\Seeders;

use App\Models\Bienestare;
use App\Models\Cantidadram;
use App\Models\Cientifica;
use App\Models\Equipocomunicacion;
use App\Models\Investigacione;
use App\Models\Jefatura;
use App\Models\RecursoHumano;
use App\Models\Sumario;
use App\Models\Tipodeoficina;
use App\Models\Tipodispositivo;
use App\Models\Totaldependencia;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Datos base
        |--------------------------------------------------------------------------
        */

        $this->call(TipodeoficinaSeeder::class);
        $this->call(TipodispositivoSeeder::class);
        $this->call(CantidadramSeeder::class);

        // $this->call(TurnosCalendesSeeder::class);

        /*
        |--------------------------------------------------------------------------
        | Roles y permisos
        |--------------------------------------------------------------------------
        */

        $this->call(RolesSeeder::class);

        /*
        |--------------------------------------------------------------------------
        | Estructura organizacional
        |--------------------------------------------------------------------------
        |
        | Las dependencias deben existir antes de crear usuarios
        | vinculados a ellas.
        |
        */

        $this->call(DependenciaSeeder::class);
        $this->call(UbicacionSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(CategoriaActivoSeeder::class);
        /*
        |--------------------------------------------------------------------------
        | Usuarios
        |--------------------------------------------------------------------------
        |
        | Actualmente se ejecuta después de DependenciaSeeder para
        | permitir vincular usuarios a una dependencia.
        |
        */

        $this->call(UserSeeder::class);

        /*
        |--------------------------------------------------------------------------
        | Datos existentes del sistema
        |--------------------------------------------------------------------------
        */

        $this->call(SlotmemoriaSeeder::class);
        $this->call(EquipocomunicacionSeeder::class);
        $this->call(MarcaequipoSeeder::class);
        $this->call(TerceradestacamentoSeeder::class);
        $this->call(VhfantenaSeeder::class);

        $this->call(DependenciaUshuaiaSeeder::class);
        $this->call(DependenciaRiograndeSeeder::class);
        $this->call(DependenciaTolhuinSeeder::class);

        $this->call(TecnicocomunicacioneSeeder::class);
        $this->call(OtrasInstitucioneSeeder::class);
        $this->call(AdministracionSeeder::class);
        $this->call(JefaturaSeeder::class);
        $this->call(InvestigacioneSeeder::class);
        $this->call(RecursoHumanoSeeder::class);
        $this->call(DestacamentoSeeder::class);
        $this->call(ServiciosespecialeSeeder::class);
        $this->call(CustodiagubernamentaleSeeder::class);
        $this->call(BienestareSeeder::class);
        $this->call(SumarioSeeder::class);
        $this->call(CientificaSeeder::class);
        $this->call(TotaldependenciaSeeder::class);
        $this->call(CategoriacomunicacionSeeder::class);
    }
}
