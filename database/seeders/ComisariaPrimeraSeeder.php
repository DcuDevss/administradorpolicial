<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ComisariaPrimera;

class ComisariaPrimeraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ComisariaPrimera::create([
            'tipo_oficina' => 'Jefe'
        ]);
        ComisariaPrimera::create([
            'tipo_oficina' => 'Segundo Jefe'
        ]);
        ComisariaPrimera::create([
            'tipo_oficina' => 'Of. de servicio'
        ]);
        ComisariaPrimera::create([
            'tipo_oficina' => 'Of. de dia'
        ]);
        ComisariaPrimera::create([
            'tipo_oficina' => 'Of. de guardia'
        ]);
        ComisariaPrimera::create([
            'tipo_oficina' => 'Tramaites generales'
        ]);
        ComisariaPrimera::create([
            'tipo_oficina' => 'Of. sumariante'
        ]);
        ComisariaPrimera::create([
            'tipo_oficina' => 'Of. administrativas'
        ]);
        ComisariaPrimera::create([
            'tipo_oficina' => 'Of. de automotores'
        ]);
        ComisariaPrimera::create([
            'tipo_oficina' => 'Otros'
        ]);

        //------------TIPO EQUIPO
        ComisariaPrimera::create([
            'tipo_equipo' => 'Pc'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'Notebook'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'Netbook'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'Monitor de pc'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'Celular'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'Tablet'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'Telefono fijo'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'Telefono inalambrico'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'Impresora laser'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'Impresora a chorro'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'Switch'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'Ruter'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'UPS'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'Central telefonica'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'Estacion de trabajo'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'Servidor'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'Estabilizador de tension'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'Auriculares'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'Cable estructurado'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'TV'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'Central telefonica'
        ]);
        ComisariaPrimera::create([
            'tipo_equipo' => 'Otros'
        ]);

    }
}
