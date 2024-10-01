<?php

namespace Database\Seeders;

use App\Models\Terceradestacamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TerceradestacamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Terceradestacamento::create([
            'nombre' => 'Otros'
        ]);
        Terceradestacamento::create([
            'nombre' => 'Sin datos'
        ]);
        Terceradestacamento::create([
            'nombre' => '365 control de ruta'
        ]);
        Terceradestacamento::create([
            'nombre' => '350 Almanza '
        ]);
        Terceradestacamento::create([
            'nombre' => '352 Ruta J'
        ]);

    }
}
