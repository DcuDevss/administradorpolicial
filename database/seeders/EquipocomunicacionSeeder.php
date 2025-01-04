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
        $items = [
            'Otros',
            'Sin datos',
            'Equipo base',
            'Ht',
            'Repetidora',
            'Fuente de poder',
            'Baliza',
            'Antena',
            'Ptt',
            'Comando Baliza'
        ];

        foreach ($items as $nombre) {
            Equipocomunicacion::firstOrCreate(['nombre' => $nombre]);
        }
    }
}
