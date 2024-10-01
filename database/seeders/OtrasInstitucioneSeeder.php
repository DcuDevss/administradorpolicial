<?php

namespace Database\Seeders;

use App\Models\OtrasInstitucione;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OtrasInstitucioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OtrasInstitucione::create([
            'nombre' => 'Sin datos'
        ]);
        OtrasInstitucione::create([
            'nombre' => 'Otros'
        ]);
        OtrasInstitucione::create([
            'nombre' => 'Gobierno TDF'
        ]);
        OtrasInstitucione::create([
            'nombre' => 'Policia Seguridad Aeropuertaria'
        ]);
        OtrasInstitucione::create([
            'nombre' => 'Policia Federal Argentina'
        ]);
        OtrasInstitucione::create([
            'nombre' => 'Gendarmeria Argentina'
        ]);
        OtrasInstitucione::create([
            'nombre' => 'Prefectura Naval Argentina'
        ]);
        OtrasInstitucione::create([
            'nombre' => 'Armada Argentina'
        ]);
        OtrasInstitucione::create([
            'nombre' => 'Vialidad Provincial'
        ]);
        OtrasInstitucione::create([
            'nombre' => 'H.R.U'
        ]);
        OtrasInstitucione::create([
            'nombre' => 'Central de Emergencias Medicas'
        ]);
        OtrasInstitucione::create([
            'nombre' => 'Central 911'
        ]);
        OtrasInstitucione::create([
            'nombre' => 'Proteccion Civil'
        ]);
        OtrasInstitucione::create([
            'nombre' => 'Defensa Civil'
        ]);
        OtrasInstitucione::create([
            'nombre' => 'Parque nacional'
        ]);

    }
}
