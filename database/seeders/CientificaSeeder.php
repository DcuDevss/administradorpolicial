<?php

namespace Database\Seeders;

use App\Models\Cientifica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CientificaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cientifica::create([
            'nombre' => 'Otras'
        ]);
        Cientifica::create([
            'nombre' => 'Sin datos'
        ]);
        Cientifica::create([
            'nombre' => 'jefe'
        ]);
        Cientifica::create([
            'nombre' => 'Of. de guardia 1'
        ]);
        Cientifica::create([
            'nombre' => 'Of. de guardia 2'
        ]);
        Cientifica::create([
            'nombre' => 'Of. administrativa'
        ]);
        Cientifica::create([
            'nombre' => 'Of. Accidente vial'
        ]);
        Cientifica::create([
            'nombre' => 'Of. MIS (huellas e inspecciones)'
        ]);
        Cientifica::create([
            'nombre' => 'Sistemas MBIS'
        ]);
       

    }
}
