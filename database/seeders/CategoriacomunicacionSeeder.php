<?php

namespace Database\Seeders;

use App\Models\Categoriacomunicacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriacomunicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   // $table->enum('categoria', ['herramienta_comun', 'herramienta_medicion', 'equipo_informatico', 'equipo_radio', 'equipo_guardia_radio', 'otro']);
    public function run(): void
    {
        Categoriacomunicacion::create([
            'name' => 'Herramienta comun'
        ]);
        Categoriacomunicacion::create([
            'name' => 'Herramienta medicion'
        ]);
        Categoriacomunicacion::create([
            'name' => 'Equipo informatico'
        ]);
        Categoriacomunicacion::create([
            'name' => 'Equipo radio'
        ]);
        Categoriacomunicacion::create([
            'name' => 'Equipo guardia radio'
        ]);
        Categoriacomunicacion::create([
            'name' => 'Otros'
        ]);


    }
}
