<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jefatura;


class JefaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jefatura::create([
            'nombre' => 'Otros'
        ]);
        Jefatura::create([
            'nombre' => 'Sin dato'
        ]);
        Jefatura::create([
            'nombre' => 'Jefe de policia'
        ]);
        Jefatura::create([
            'nombre' => 'sub Jefe de policia'
        ]);
        Jefatura::create([
            'nombre' => 'Of. de guardia/mesa de entrada'
        ]);
        Jefatura::create([
            'nombre' => 'Asesoria letrada'
        ]);
        Jefatura::create([
            'nombre' => 'Analisis criminal'
        ]);
        Jefatura::create([
            'nombre' => 'Of. de informacion institucional'
        ]);
        Jefatura::create([
            'nombre' => 'secretaria general'
        ]);
        Jefatura::create([
            'nombre' => 'D.G.R.Z.S'
        ]);
        Jefatura::create([
            'nombre' => 'U.R.S'
        ]);
        Jefatura::create([
            'nombre' => 'Sub Jefatura'
        ]);
    }
}
