<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tipodeoficina;

class TipodeoficinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tipodeoficina::create([
            'nombre' => 'Otras'
        ]);
        Tipodeoficina::create([
            'nombre' => 'Sin dato'
        ]);
        Tipodeoficina::create([
            'nombre' => 'jefe'
        ]);
        Tipodeoficina::create([
            'nombre' => 'Segundo jefe'
        ]);
        Tipodeoficina::create([
            'nombre' => 'Oficial de servicio'
        ]);
        Tipodeoficina::create([
            'nombre' => 'Oficina sumariante'
        ]);
        Tipodeoficina::create([
            'nombre' => 'Oficina de guardia'
        ]);
        Tipodeoficina::create([
            'nombre' => 'Oficina de dia'
        ]);
        Tipodeoficina::create([
            'nombre' => 'Oficina administrativa'
        ]);
        Tipodeoficina::create([
            'nombre' => 'Oficina de automotores'
        ]);
        Tipodeoficina::create([
            'nombre' => 'Destacamentos'
        ]);
        Tipodeoficina::create([
            'nombre' => 'Oficina de Suboficiales Superiores'
        ]);
        Tipodeoficina::create([
            'nombre' => 'Oficina de servicios Externos'
        ]);
        Tipodeoficina::create([
            'nombre' => 'Oficina de jefe de turno'
        ]);

    }
}
