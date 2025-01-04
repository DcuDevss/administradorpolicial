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
            'Nuevo',
            'Regular',
            'Sin servicio',
        ];

        foreach ($estados as $estado) {
            EstadoEquipo::create(['nombre' => $estado]);
        }
    }
}
