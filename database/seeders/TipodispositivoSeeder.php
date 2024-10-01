<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tipodispositivo;

class TipodispositivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tipodispositivo::create([
            'nombre' => 'otros'
        ]);
        Tipodispositivo::create([
            'nombre' => 'No posee'
        ]);
        Tipodispositivo::create([
            'nombre' => 'Pc'
        ]);
        Tipodispositivo::create([
            'nombre' => 'Monitor de Pc'
        ]);
        Tipodispositivo::create([
            'nombre' => 'Notebook'
        ]);
        Tipodispositivo::create([
            'nombre' => 'Netbook'
        ]);
        Tipodispositivo::create([
            'nombre' => 'Celular'
        ]);
        Tipodispositivo::create([
            'nombre' => 'Tablet'
        ]);
        Tipodispositivo::create([
            'nombre' => 'Telefono fijo'
        ]);
        Tipodispositivo::create([
            'nombre' => 'Telefono inalambrico'
        ]);
        Tipodispositivo::create([
            'nombre' => 'Impresora laser'
        ]);
        Tipodispositivo::create([
            'nombre' => 'Impresora a chorro'
        ]);
        Tipodispositivo::create([
            'nombre' => 'Switch'
        ]);
        Tipodispositivo::create([
            'nombre' => 'Ruter'
        ]);
        Tipodispositivo::create([
            'nombre' => 'UPS'
        ]);
        Tipodispositivo::create([
            'nombre' => 'Camaras video vigilancias'
        ]);
        Tipodispositivo::create([
            'nombre' => 'Estacion de trabajo'
        ]);
        Tipodispositivo::create([
            'nombre' => 'Servidor'
        ]);
        Tipodispositivo::create([
            'nombre' => 'Estabilizador de tension'
        ]);
        Tipodispositivo::create([
            'nombre' => 'Auriculares'
        ]);
        Tipodispositivo::create([
            'nombre' => 'Cable estructurado'
        ]);
        Tipodispositivo::create([
            'nombre' => 'Tv'
        ]);
        Tipodispositivo::create([
            'nombre' => 'Central telefonica'
        ]);


    }
}
