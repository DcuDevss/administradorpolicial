<?php

namespace Database\Seeders;

use App\Models\Vhfantena;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VhfantenaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vhfantena::create([
            'nombre' => 'Otros'
        ]);
        Vhfantena::create([
            'nombre' => 'Sin datos'
        ]);
        Vhfantena::create([
            'nombre' => 'Dipolo 2 elementos'
        ]);
        Vhfantena::create([
            'nombre' => 'Dipolo 4 elemntos'
        ]);
        Vhfantena::create([
            'nombre' => 'Dipolo 8 elementos'
        ]);
        Vhfantena::create([
            'nombre' => 'Yagi'
        ]);
        Vhfantena::create([
            'nombre' => 'Latigo'
        ]);
        Vhfantena::create([
            'nombre' => 'Ringo'
        ]);

    }
}
