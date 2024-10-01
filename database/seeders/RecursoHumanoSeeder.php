<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RecursoHumano;

class RecursoHumanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RecursoHumano::create([
            'nombre' => 'Sin dato'
        ]);
        RecursoHumano::create([
            'nombre' => 'Otros'
        ]);
        RecursoHumano::create([
            'nombre' => 'Jefe\Director'
        ]);
        RecursoHumano::create([
            'nombre' => 'Segundo Jefe\Sub dierctor'
        ]);
        RecursoHumano::create([
            'nombre' => ' Seguros ART'
        ]);
        RecursoHumano::create([
            'nombre' => 'Haberes/remuneraciones'
        ]);
        RecursoHumano::create([
            'nombre' => 'Archivos documental e informatico'
        ]);
        RecursoHumano::create([
            'nombre' => 'Of. de informatica'
        ]);
        RecursoHumano::create([
            'nombre' => 'Retiros y pensiones'
        ]);
        RecursoHumano::create([
            'nombre' => 'Junta permanente calificatoria'
        ]);
        RecursoHumano::create([
            'nombre' => 'Asignaciones familiares'
        ]);
        RecursoHumano::create([
            'nombre' => 'Of. guardia/mesa entrada'
        ]);
        RecursoHumano::create([
            'nombre' => 'Of. secretaria'
        ]);
        RecursoHumano::create([
            'nombre' => 'Of. de servidor'
        ]);
        RecursoHumano::create([
            'nombre' => 'Sumario Policial'
        ]);
         RecursoHumano::create([
            'nombre' => 'Bienestar Policial'
        ]);

    }
}
