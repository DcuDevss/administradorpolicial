<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ComisariaSegunda;

class ComisariaSegundaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ComisariaSegunda::create([
            'tipo_oficina' => 'Jefe'
        ]);
        ComisariaSegunda::create([
            'tipo_oficina' => 'Segundo Jefe'
        ]);
        ComisariaSegunda::create([
            'tipo_oficina' => 'Of. de servicio'
        ]);
        ComisariaSegunda::create([
            'tipo_oficina' => 'Of. de dia'
        ]);
        ComisariaSegunda::create([
            'tipo_oficina' => 'Of. de guardia'
        ]);
        ComisariaSegunda::create([
            'tipo_oficina' => 'Tramaites generales'
        ]);
        ComisariaSegunda::create([
            'tipo_oficina' => 'Of. sumariante'
        ]);
        ComisariaSegunda::create([
            'tipo_oficina' => 'Of. administrativa'
        ]);
        ComisariaSegunda::create([
            'tipo_oficina' => 'Of. de automotores'
        ]);
        ComisariaSegunda::create([
            'tipo_oficina' => 'Otros'
        ]);

        //------------TIPO EQUIPO
        ComisariaSegunda::create([
            'tipo_equipo' => 'Pc'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'Notebook'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'Netbook'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'Monitor de pc'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'Celular'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'Tablet'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'Telefono fijo'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'Telefono inalambrico'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'Impresora laser'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'Impresora a chorro'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'Switch'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'Ruter'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'UPS'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'Central telefonica'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'Estacion de trabajo'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'Servidor'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'Estabilizador de tension'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'Auriculares'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'Cable estructurado'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'TV'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'Central telefonica'
        ]);
        ComisariaSegunda::create([
            'tipo_equipo' => 'Otros'
        ]);
    }
}
