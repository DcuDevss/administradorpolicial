<?php

namespace Database\Seeders;

use App\Models\Administracion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdministracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Administracion::create([
            'nombre' => 'Sin dato'
        ]);
        Administracion::create([
            'nombre' => 'Otros'
        ]);
        Administracion::create([
            'nombre' => 'Jefe\Director'
        ]);
        Administracion::create([
            'nombre' => 'Segundo Jefe\Sub dierctor'
        ]);
        Administracion::create([
            'nombre' => 'Servicios y seguros'
        ]);
        Administracion::create([
            'nombre' => 'Adicional'
        ]);
        Administracion::create([
            'nombre' => 'Compras'
        ]);
        Administracion::create([
            'nombre' => 'Combustibles'
        ]);
        Administracion::create([
            'nombre' => 'Patrimonio'
        ]);
        Administracion::create([
            'nombre' => 'Juridico/Contable'
        ]);
        Administracion::create([
            'nombre' => 'Tesoreria'
        ]);
        Administracion::create([
            'nombre' => 'Taller Automotores'
        ]);
        Administracion::create([
            'nombre' => 'Verificacion automotores'
        ]);
        Administracion::create([
            'nombre' => 'Armeria'
        ]);
    }
}
