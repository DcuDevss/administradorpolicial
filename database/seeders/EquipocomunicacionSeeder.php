<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Equipocomunicacion;

class EquipocomunicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Equipocomunicacion::create([
            'nombre' => 'Otros'
        ]);
        Equipocomunicacion::create([
            'nombre' => 'Sin datos'
        ]);
        Equipocomunicacion::create([
            'nombre' => 'Equipo base'
        ]);
        Equipocomunicacion::create([
            'nombre' => 'Ht'
        ]);
        Equipocomunicacion::create([
            'nombre' => 'Repetidora'
        ]);
        Equipocomunicacion::create([
            'nombre' => 'Fuente de poder'
        ]);
        Equipocomunicacion::create([
            'nombre' => 'Baliza'
        ]);
        Equipocomunicacion::create([
            'nombre' => 'Antena'
        ]);


    }
}
