<?php

namespace Database\Seeders;

use App\Models\Destacamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestacamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Destacamento::create([
            'nombre' => 'Sin datos'
        ]);
        Destacamento::create([
            'nombre' => 'Dto 365 Control de ruta'
        ]);
        Destacamento::create([
            'nombre' => 'Dto 350 Pto. Almanza'
        ]);
        Destacamento::create([
            'nombre' => 'Dto 352 Ingreso ruta J'
        ]);
        Destacamento::create([
            'nombre' => 'Dto 450 Cria 4ta'
        ]);
        Destacamento::create([
            'nombre' => 'Dto 550 Ingreo Andorra'
        ]);

    }
}
