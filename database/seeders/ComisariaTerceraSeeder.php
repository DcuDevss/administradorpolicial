<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ComisariaTercera;

class ComisariaTerceraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ComisariaTercera::create([
            'tipo_oficina' => 'Jefe'
        ]);
        ComisariaTercera::create([
            'tipo_oficina' => 'Segundo Jefe'
        ]);
        ComisariaTercera::create([
            'tipo_oficina' => 'Of. de servicio'
        ]);
        ComisariaTercera::create([
            'tipo_oficina' => 'Of. de dia'
        ]);
        ComisariaTercera::create([
            'tipo_oficina' => 'Of. de guardia'
        ]);
        ComisariaTercera::create([
            'tipo_oficina' => 'Tramaites generales'
        ]);
        ComisariaTercera::create([
            'tipo_oficina' => 'Of. sumariante'
        ]);
        ComisariaTercera::create([
            'tipo_oficina' => 'Of. administrativa'
        ]);
        ComisariaTercera::create([
            'tipo_oficina' => 'Of. de automotores'
        ]);
        ComisariaTercera::create([
            'tipo_oficina' => 'Otros'
        ]);

        //------------TIPO EQUIPO
        ComisariaTercera::create([
            'tipo_equipo' => 'Pc'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'Notebook'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'Netbook'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'Monitor de pc'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'Celular'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'Tablet'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'Telefono fijo'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'Telefono inalambrico'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'Impresora laser'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'Impresora a chorro'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'Switch'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'Ruter'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'UPS'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'Central telefonica'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'Estacion de trabajo'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'Servidor'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'Estabilizador de tension'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'Auriculares'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'Cable estructurado'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'TV'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'Central telefonica'
        ]);
        ComisariaTercera::create([
            'tipo_equipo' => 'Otros'
        ]);
    }
}
