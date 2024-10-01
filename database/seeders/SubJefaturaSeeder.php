<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubJefatura;

class SubJefaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubJefatura::create([
            'tipo_oficina' => 'Sin dato'
        ]);
        SubJefatura::create([
            'tipo_oficina' => 'Otros'
        ]);
        SubJefatura::create([
            'tipo_oficina' => ' Sub Jefe de policia'
        ]);
        SubJefatura::create([
            'tipo_oficina' => 'Direccion regional zona sur'
        ]);
    }
}
