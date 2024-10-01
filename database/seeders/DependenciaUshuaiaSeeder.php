<?php

namespace Database\Seeders;

use App\Models\DependenciaUshuaia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DependenciaUshuaiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DependenciaUshuaia::create([
            'nombre' => 'Otras'
        ]);
        DependenciaUshuaia::create([
            'nombre' => 'Sin datos'
        ]);
        DependenciaUshuaia::create([
            'nombre' => 'Comisaria Primera'
        ]);
        DependenciaUshuaia::create([
            'nombre' => 'Comisaria Segunda'
        ]);
        DependenciaUshuaia::create([
            'nombre' => 'Comisaria Tercera'
        ]);
        DependenciaUshuaia::create([
            'nombre' => 'Comisaria Cuarta'
        ]);
        DependenciaUshuaia::create([
            'nombre' => 'Comisaria Quinta'
        ]);
        DependenciaUshuaia::create([
            'nombre' => 'Comisaria de Familia y Genero 1'
        ]);
        DependenciaUshuaia::create([
            'nombre' => 'Comisaria de Familia y Genero 2'
        ]);
        DependenciaUshuaia::create([
            'nombre' => 'Division servicios especiales'
        ]);
      /*  DependenciaUshuaia::create([
            'nombre' => 'Jefatura'
        ]);
        DependenciaUshuaia::create([
            'nombre' => 'Administracion Policial'
        ]);
        DependenciaUshuaia::create([
            'nombre' => 'Recursos Humanos'
        ]);
        DependenciaUshuaia::create([
            'nombre' => 'Investigaciones Criminales'
        ]);*/
       /* DependenciaUshuaia::create([
            'nombre' => 'Policia Cientifica'
        ]);*/
        DependenciaUshuaia::create([
            'nombre' => 'Custodia gubernamental (D.S.G.L y S.T.J)'
        ]);
    }
}
