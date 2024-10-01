<?php

namespace Database\Seeders;

use App\Models\Bienestare;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BienestareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bienestare::create([
            'nombre' => 'Sin dato'
        ]);
        Bienestare::create([
            'nombre' => 'Otros'
        ]);
        Bienestare::create([
            'nombre' => 'Jefe'
        ]);
        Bienestare::create([
            'nombre' => 'Of. de Medicos'
        ]);
        Bienestare::create([
            'nombre' => 'Of. de Certificados'
        ]);
        Bienestare::create([
            'nombre' => 'Of. administrativa'
        ]);
        Bienestare::create([
            'nombre' => 'Mesa de entrada'
        ]);
       
    }
}
