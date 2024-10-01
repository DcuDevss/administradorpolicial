<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ComisariaCuarta;

class ComisariaCuartaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ComisariaCuarta::create([
            'tipo_oficina' => 'Jefe',
            'tipo_equipo' => 'Pc',
        ]);
        ComisariaCuarta::create([
            'tipo_oficina' => 'Segundo Jefe',
            'tipo_equipo' => 'Notebook',

        ]);
        ComisariaCuarta::create([
            'tipo_oficina' => 'Of. de servicio',
            'tipo_equipo' => 'Netbook',
        ]);
        ComisariaCuarta::create([
            'tipo_oficina' => 'Of. de dia',
            'tipo_equipo' => 'Monitor de pc',
        ]);
        ComisariaCuarta::create([
            'tipo_oficina' => 'Of. de guardia',
            'tipo_equipo' => 'Celular',

        ]);
        ComisariaCuarta::create([
            'tipo_oficina' => 'Tramaites generales',
            'tipo_equipo' => 'Tablet',
        ]);
        ComisariaCuarta::create([
            'tipo_oficina' => 'Of. sumariante',
            'tipo_equipo' => 'Telefono fijo',
        ]);
        ComisariaCuarta::create([
            'tipo_oficina' => 'Of. administrativa',
            'tipo_equipo' => 'Telefono inalambrico',
        ]);
        ComisariaCuarta::create([
            'tipo_oficina' => 'Of. de automotores',
            'tipo_equipo' => 'Impresora laser',
        ]);
        ComisariaCuarta::create([
            'tipo_oficina' => 'Otros',
            'tipo_equipo' => 'Impresora a chorro',
        ]);

        //------------TIPO EQUIPO
       /* ComisariaCuarta::create([
            'tipo_equipo' => 'Pc'
        ]);
        ComisariaCuarta::create([
            'tipo_equipo' => 'Notebook'
        ]);
        ComisariaCuarta::create([
            'tipo_equipo' => 'Netbook'
        ]);
        ComisariaCuarta::create([
            'tipo_equipo' => 'Monitor de pc'
        ]);
        ComisariaCuarta::create([
            'tipo_equipo' => 'Celular'
        ]);
        ComisariaCuarta::create([
            'tipo_equipo' => 'Tablet'
        ]);
        ComisariaCuarta::create([
            'tipo_equipo' => 'Telefono fijo'
        ]);
        ComisariaCuarta::create([
            'tipo_equipo' => 'Telefono inalambrico'
        ]);
        ComisariaCuarta::create([
            'tipo_equipo' => 'Impresora laser'
        ]);
        ComisariaCuarta::create([
            'tipo_equipo' => 'Impresora a chorro'
        ]);*/
        ComisariaCuarta::create([
            'tipo_equipo' => 'Switch'
        ]);
        ComisariaCuarta::create([
            'tipo_equipo' => 'Ruter'
        ]);
        ComisariaCuarta::create([
            'tipo_equipo' => 'UPS'
        ]);
        ComisariaCuarta::create([
            'tipo_equipo' => 'Central telefonica'
        ]);
        ComisariaCuarta::create([
            'tipo_equipo' => 'Estacion de trabajo'
        ]);
        ComisariaCuarta::create([
            'tipo_equipo' => 'Servidor'
        ]);
        ComisariaCuarta::create([
            'tipo_equipo' => 'Estabilizador de tension'
        ]);
        ComisariaCuarta::create([
            'tipo_equipo' => 'Auriculares'
        ]);
        ComisariaCuarta::create([
            'tipo_equipo' => 'Cable estructurado'
        ]);
        ComisariaCuarta::create([
            'tipo_equipo' => 'TV'
        ]);
        ComisariaCuarta::create([
            'tipo_equipo' => 'Central telefonica'
        ]);
        ComisariaCuarta::create([
            'tipo_equipo' => 'Otros'
        ]);
    }
}
