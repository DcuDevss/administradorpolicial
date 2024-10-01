<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Investigacione;

class InvestigacioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Investigacione::create([
            'nombre' => 'Sin dato'
        ]);
        Investigacione::create([
            'nombre' => 'Otros'
        ]);
        Investigacione::create([
            'nombre' => 'Jefe\Director'
        ]);
        Investigacione::create([
            'nombre' => 'Segundo Jefe\Sub dierctor'
        ]);
        Investigacione::create([
            'nombre' => 'Prontuario'
        ]);
        Investigacione::create([
            'nombre' => 'Repar'
        ]);
        Investigacione::create([
            'nombre' => 'Of.Judicial'
        ]);
        Investigacione::create([
            'nombre' => 'Convenio policial'
        ]);
        Investigacione::create([
            'nombre' => 'Mesa de entrada'
        ]);
        Investigacione::create([
            'nombre' => 'Carta ciudadania'
        ]);
        Investigacione::create([
            'nombre' => 'Division delitos complejo'
        ]);
        Investigacione::create([
            'nombre' => 'Brigda narcocriminalidad'
        ]);
        Investigacione::create([
            'nombre' => 'Policia Cientifica'
        ]);
        Investigacione::create([
            'nombre' => 'detal de prontuarios'
        ]);

    }
}
