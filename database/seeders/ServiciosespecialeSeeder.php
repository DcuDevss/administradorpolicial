<?php

namespace Database\Seeders;

use App\Models\Serviciosespeciale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiciosespecialeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Serviciosespeciale::create([
            'nombre' => 'Otras'
        ]);
        Serviciosespeciale::create([
            'nombre' => 'Sin datos'
        ]);
        Serviciosespeciale::create([
            'nombre' => 'jefe'
        ]);
        Serviciosespeciale::create([
            'nombre' => 'sub jefe'
        ]);
        Serviciosespeciale::create([
            'nombre' => 'Seccion canes'
        ]);
        Serviciosespeciale::create([
            'nombre' => 'Operaciones tacticas'
        ]);
        Serviciosespeciale::create([
            'nombre' => 'Grupo infanteria'
        ]);
        Serviciosespeciale::create([
            'nombre' => 'Grupo especial Busqueda y rescate'
        ]);
        Serviciosespeciale::create([
            'nombre' => 'Seccion explosivos'
        ]);
        Serviciosespeciale::create([
            'nombre' => 'Of administrativa'
        ]);


    }
}
