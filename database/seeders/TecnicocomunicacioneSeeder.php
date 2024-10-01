<?php

namespace Database\Seeders;

use App\Models\Tecnicocomunicacione;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TecnicocomunicacioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tecnicocomunicacione::create([
            'nombre' => 'Sin datos'
        ]);
        Tecnicocomunicacione::create([
            'nombre' => 'Todos'
        ]);
        Tecnicocomunicacione::create([
            'nombre' => 'Adrian Soza'
        ]);
        Tecnicocomunicacione::create([
            'nombre' => 'Dario Carrasco'
        ]);
        Tecnicocomunicacione::create([
            'nombre' => 'Facundo Griffith'
        ]);
        Tecnicocomunicacione::create([
            'nombre' => 'Adrian Soza, Dario Carrasco'
        ]);
        Tecnicocomunicacione::create([
            'nombre' => 'Adrian Soza, Facundo Griffith'
        ]);
        Tecnicocomunicacione::create([
            'nombre' => 'Dario Carrasco, Facundo Griffith'
        ]);

    }
}
