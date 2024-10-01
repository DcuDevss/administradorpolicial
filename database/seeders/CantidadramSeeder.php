<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cantidadram;

class CantidadramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cantidadram::create([
            'cantidad' => 'otras'
        ]);
        Cantidadram::create([
            'cantidad' => 'no posee'
        ]);
        Cantidadram::create([
            'cantidad' => '2'
        ]);
        Cantidadram::create([
            'cantidad' => '4'
        ]);
        Cantidadram::create([
            'cantidad' => '6'
        ]);
        Cantidadram::create([
            'cantidad' => '8'
        ]);
        Cantidadram::create([
            'cantidad' => '10'
        ]);
        Cantidadram::create([
            'cantidad' => '12'
        ]);
        Cantidadram::create([
            'cantidad' => '14'
        ]);
        Cantidadram::create([
            'cantidad' => '16'
        ]);
        Cantidadram::create([
            'cantidad' => '18'
        ]);
        Cantidadram::create([
            'cantidad' => '22'
        ]);
        Cantidadram::create([
            'cantidad' => '24'
        ]);
        Cantidadram::create([
            'cantidad' => '26'
        ]);
        Cantidadram::create([
            'cantidad' => '28'
        ]);
        Cantidadram::create([
            'cantidad' => '30'
        ]);
        Cantidadram::create([
            'cantidad' => '32'
        ]);
        Cantidadram::create([
            'cantidad' => '64'
        ]);

    }
}
