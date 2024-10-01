<?php

namespace Database\Seeders;

use App\Models\DependenciaRiogrande;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DependenciaRiograndeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DependenciaRiogrande::create([
            'nombre' => 'Otras'
        ]);
        DependenciaRiogrande::create([
            'nombre' => 'Sin datos'
        ]);
        DependenciaRiogrande::create([
            'nombre' => 'Comisaria Primera R.G'
        ]);
        DependenciaRiogrande::create([
            'nombre' => 'Comisaria Segunda R.G'
        ]);
        DependenciaRiogrande::create([
            'nombre' => 'Comisaria Tercera R.G'
        ]);
        DependenciaRiogrande::create([
            'nombre' => 'Comisaria Cuarta R.G'
        ]);
        DependenciaRiogrande::create([
            'nombre' => 'Comisaria Quinta R.G'
        ]);
        DependenciaRiogrande::create([
            'nombre' => 'Comisaria de Familia y Genero R.G'
        ]);
        DependenciaRiogrande::create([
            'nombre' => 'Division servicios especiales R.G'
        ]);
        DependenciaRiogrande::create([
            'nombre' => 'D.R.Z.N'
        ]);
        DependenciaRiogrande::create([
            'nombre' => 'Escuela de Policia'
        ]);
        DependenciaRiogrande::create([
            'nombre' => 'Repetidora Cerro Laucha'
        ]);
        DependenciaRiogrande::create([
            'nombre' => 'Central Comunicaciones R.G'
        ]);
        DependenciaRiogrande::create([
            'nombre' => 'Investigaciones R.G'
        ]);
        DependenciaRiogrande::create([
            'nombre' => 'Bienestar General R.G'
        ]);
        DependenciaRiogrande::create([
            'nombre' => 'Brigada Narco Criminalidad R.G'
        ]);
        DependenciaRiogrande::create([
            'nombre' => 'Brigada Delitos complejos R.G'
        ]);
        DependenciaRiogrande::create([
            'nombre' => 'Automotores'
        ]);
       
    }
}
