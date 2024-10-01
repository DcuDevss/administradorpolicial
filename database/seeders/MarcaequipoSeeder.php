<?php

namespace Database\Seeders;

use App\Models\Marcaequipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcaequipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Marcaequipo::create([
            'nombre' => 'Sin datos'
        ]);
        Marcaequipo::create([
            'nombre' => 'otros'
        ]);
        Marcaequipo::create([
            'nombre' => 'Motorola'
        ]);
        Marcaequipo::create([
            'nombre' => 'Kenwood'
        ]);
        Marcaequipo::create([
            'nombre' => 'Yaesu'
        ]);
        Marcaequipo::create([
            'nombre' => 'Hytera'
        ]);
        Marcaequipo::create([
            'nombre' => 'Alcom'
        ]);
        Marcaequipo::create([
            'nombre' => 'otros'
        ]);
        Marcaequipo::create([
            'nombre' => 'Sin datos'
        ]);
    }
}
