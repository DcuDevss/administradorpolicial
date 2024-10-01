<?php

namespace Database\Seeders;

use App\Models\DependenciaTolhuin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DependenciaTolhuinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DependenciaTolhuin::create([
            'nombre' => 'Otras'
        ]);
        DependenciaTolhuin::create([
            'nombre' => 'Sin datos'
        ]);
        DependenciaTolhuin::create([
            'nombre' => 'Comisaria de Tolhuin'
        ]);
        DependenciaTolhuin::create([
            'nombre' => 'Comisaria de Familia y Genero Tolhuin'
        ]);
        DependenciaTolhuin::create([
            'nombre' => 'Policia Cientifica Tolhuin'
        ]);
        DependenciaTolhuin::create([
            'nombre' => 'D.R.Z.C'
        ]);
        DependenciaTolhuin::create([
            'nombre' => 'Investigaciones Tolhuin'
        ]);
        DependenciaTolhuin::create([
            'nombre' => 'Brigada Narco Criminalidad Tolhuin'
        ]);
        DependenciaTolhuin::create([
            'nombre' => 'Brigada Delitos complejos Tolhuin'
        ]);
        DependenciaTolhuin::create([
            'nombre' => 'Brigada Rural'
        ]);
        DependenciaTolhuin::create([
            'nombre' => 'Repetidora Cerro Michi'
        ]);
        DependenciaTolhuin::create([
            'nombre' => 'Repetidora Estancia Tepi'
        ]);
        DependenciaTolhuin::create([
            'nombre' => 'Dto. Lago Escondido 460'
        ]);
        DependenciaTolhuin::create([
            'nombre' => 'Dto. Control de Ruta 480'
        ]);

    }
}
