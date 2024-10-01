<?php

namespace Database\Seeders;

use App\Models\Sumario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SumarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sumario::create([
            'nombre' => 'Sin dato'
        ]);
        Sumario::create([
            'nombre' => 'Otros'
        ]);
        Sumario::create([
            'nombre' => 'Jefe'
        ]);
        Sumario::create([
            'nombre' => 'Of. general de sumario'
        ]);
    }
}
