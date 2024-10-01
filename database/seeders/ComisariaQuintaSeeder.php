<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ComisariaQuinta;

class ComisariaQuintaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ComisariaQuinta::create([
            'tipo_oficina' => 'Jefe'
        ]);
        ComisariaQuinta::create([
            'tipo_oficina' => 'Segundo Jefe'
        ]);
        ComisariaQuinta::create([
            'tipo_oficina' => 'Of. de servicio'
        ]);
        ComisariaQuinta::create([
            'tipo_oficina' => 'Of. de dia'
        ]);
        ComisariaQuinta::create([
            'tipo_oficina' => 'Of. de guardia'
        ]);
        ComisariaQuinta::create([
            'tipo_oficina' => 'Tramaites generales'
        ]);
        ComisariaQuinta::create([
            'tipo_oficina' => 'Of. sumariante'
        ]);
        ComisariaQuinta::create([
            'tipo_oficina' => 'Of. administrativa'
        ]);
        ComisariaQuinta::create([
            'tipo_oficina' => 'Of. de automotores'
        ]);
        ComisariaQuinta::create([
            'tipo_oficina' => 'Otros'
        ]);

        //------------TIPO EQUIPO
        ComisariaQuinta::create([
            'tipo_equipo' => 'Pc'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'Notebook'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'Netbook'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'Monitor de pc'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'Celular'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'Tablet'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'Telefono fijo'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'Telefono inalambrico'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'Impresora laser'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'Impresora a chorro'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'Switch'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'Ruter'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'UPS'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'Central telefonica'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'Estacion de trabajo'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'Servidor'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'Estabilizador de tension'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'Auriculares'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'Cable estructurado'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'TV'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'Central telefonica'
        ]);
        ComisariaQuinta::create([
            'tipo_equipo' => 'Otros'
        ]);
    }
}
