<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bienestare;
use App\Models\Cantidadram;
use App\Models\Cientifica;
use App\Models\ComisariaCuarta;
use App\Models\ComisariaPrimera;
use App\Models\ComisariaSegunda;
use App\Models\ComisariaTercera;
use App\Models\Equipocomunicacion;
use App\Models\Investigacione;
use App\Models\Jefatura;
use App\Models\RecursoHumano;
use App\Models\SubJefatura;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(TipodeoficinaSeeder::class);
        $this->call(TipodispositivoSeeder::class);
        $this->call(CantidadramSeeder::class);
       // $this->call(TurnosCalendesSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UserSeeder::class);
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
