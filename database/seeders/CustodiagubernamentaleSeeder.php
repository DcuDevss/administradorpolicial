<?php

namespace Database\Seeders;

use App\Models\Custodiagubernamentale;
//use App\Models\Custodiagubernamentallegislativa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustodiagubernamentaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Custodiagubernamentale::create([
            'nombre' => 'Otras'
        ]);
        Custodiagubernamentale::create([
            'nombre' => 'Sin datos'
        ]);
        Custodiagubernamentale::create([
            'nombre' => 'Of. del jefe'
        ]);
        Custodiagubernamentale::create([
            'nombre' => 'Of. del subjefe'
        ]);
        Custodiagubernamentale::create([
            'nombre' => 'Of. de guardia'
        ]);
        Custodiagubernamentale::create([
            'nombre' => 'Of sistema de video vigilancia'
        ]);
        Custodiagubernamentale::create([
            'nombre' => 'Planta baja'
        ]);
        Custodiagubernamentale::create([
            'nombre' => 'Primer piso'
        ]);
        Custodiagubernamentale::create([
            'nombre' => 'Segundo piso'
        ]);
        Custodiagubernamentale::create([
            'nombre' => 'Superior tribunal de justicia'
        ]);
        Custodiagubernamentale::create([
            'nombre' => 'Presidencia'
        ]);
        Custodiagubernamentale::create([
            'nombre' => 'Legislatura'
        ]);
        Custodiagubernamentale::create([
            'nombre' => 'Cadic vivienda gubernamental'
        ]);
        Custodiagubernamentale::create([
            'nombre' => 'Casa de gobierno'
        ]);

    }
}
