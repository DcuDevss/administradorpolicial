<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EstadoEquipo;

class EstadoEquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [
            'Dañado',
            'Fuera de servicio',
            'Sin antena',
            'Partido',
            'Regular',
            'Buen estado',
        ];

        foreach ($estados as $estado) {
            EstadoEquipo::create(['nombre' => $estado]);
        }
    }
}
