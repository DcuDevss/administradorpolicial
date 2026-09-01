<?php

namespace Database\Seeders;

use App\Models\CategoriaActivo;
use Illuminate\Database\Seeder;

class CategoriaActivoSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            'PC / CPU',
            'Notebook',
            'Monitor',
            'Impresora',
            'Teléfono',
            'Router',
            'Switch',
            'NAS',
            'UPS',
            'Equipo de comunicaciones',
            'Equipo de radio',
            'Equipo de guardia radio',
            'Herramienta común',
            'Herramienta de medición',
            'Instrumento de medición',
            'Periférico',
            'Otro',
        ];

        foreach ($categorias as $nombre) {
            CategoriaActivo::firstOrCreate(
                ['nombre' => $nombre],
                ['activa' => true]
            );
        }
    }
}
