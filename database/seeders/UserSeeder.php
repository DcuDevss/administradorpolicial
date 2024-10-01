<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
            'name'=>'Cristian Roman Retamar',
            'email'=>'retacris30@gmail.com',
            'password'=>bcrypt('12345678')
         ])->assignRole('Admin');
         User::create([
            'name'=>'Matias Quiroga',
            'email'=>'mattclarkdj@gmail.com',
            'password'=>bcrypt('DCU2519')
         ])->assignRole('tecnicoinformatico');
         User::create([
            'name'=>'Rosana Segovia',
            'email'=>'roxisegovia20@gmail.com',
            'password'=>bcrypt('ROXI20')
         ])->assignRole('tecnicoinformatico');
         User::create([
            'name'=>'tecnicos comunicaciones',
            'email'=>'comunicaciones.dcu@gmail.com',
            'password'=>bcrypt('comunicaciones101')
         ])->assignRole('tecnicocomunicacion');
         User::create([
            'name'=>'Comisaria Primera',
            'email'=>'comisaria.primera@gmail.com',
            'password'=>bcrypt('primera101')
         ])->assignRole('userComisaria1');
         User::create([
            'name'=>'Comisaria Segunda',
            'email'=>'comisaria.segunda@gmail.com',
            'password'=>bcrypt('segunda101')
         ])->assignRole('userComisaria2');
         User::create([
            'name'=>'Comisaria Tercera',
            'email'=>'comisaria.tercera@gmail.com',
            'password'=>bcrypt('tercera101')
         ])->assignRole('userComisaria3');
         User::create([
            'name'=>'Comisaria Cuarta',
            'email'=>'comisaria.cuarta@gmail.com',
            'password'=>bcrypt('cuarta101')
         ])->assignRole('userComisaria4');
         User::create([
            'name'=>'Comisaria Quinta',
            'email'=>'comisaria.quinta@gmail.com',
            'password'=>bcrypt('quinta101')
         ])->assignRole('userComisaria5');
         User::create([
            'name'=>'Recursos Humanos',
            'email'=>'recursos.humanos@gmail.com',
            'password'=>bcrypt('RecursosHumanos101')
         ])->assignRole('RecursosHumanos');
         User::create([
            'name'=>'Carrasco Comunicaciones',
            'email'=>'dario.carrasco@gmail.com',
            'password'=>bcrypt('carrasco101')
         ])->assignRole('tecnicocomunicacion');
         User::create([
            'name'=>'Sosa Comunicaciones',
            'email'=>'adrian.sosa@gmail.com',
            'password'=>bcrypt('sosa101')
         ])->assignRole('tecnicocomunicacion');
         User::create([
            'name'=>'Griffith Comunicaciones',
            'email'=>'facundo.griffith@gmail.com',
            'password'=>bcrypt('griffith101')
         ])->assignRole('tecnicocomunicacion');
         User::create([
            'name'=>'Quiroga Informatico',
            'email'=>'matias.quiroga.com',
            'password'=>bcrypt('quiroga101')
         ])->assignRole('tecnicoinformatico');
         User::create([
            'name'=>'Raul Informatica',
            'email'=>'raul.romero@gmail.com',
            'password'=>bcrypt('romero101')
         ])->assignRole('tecnicoinformatico');
         User::create([
            'name'=>'Comisaria de Genero y Familia N° 1',
            'email'=>'fliagenero1@gmail.com',
            'password'=>bcrypt('generoflia1_101')
         ]);//->assignRole('tecnicoinformatico');
         User::create([
            'name'=>'Comisaria de Genero y Famila N° 2',
            'email'=>'fliagenero2@gmail.com',
            'password'=>bcrypt('generoflia2101')
         ]);//->assignRole('tecnicoinformatico');
         User::create([
            'name'=>'Servicios Especiales',
            'email'=>'servicios.especiales@gmail.com',
            'password'=>bcrypt('servicios101')
         ]);//->assignRole('tecnicoinformatico');
         User::create([
            'name'=>'Custodia Gubernamental',
            'email'=>'custodia.gubernamental@gmail.com',
            'password'=>bcrypt('custodia101')
         ]);//->assignRole('tecnicoinformatico');
         User::create([
            'name'=>'Luis rojo',
            'email'=>'luisdanielrojo@gmail.com',
            'password'=>bcrypt('luis.2024')
         ])->assignRole('Admin');
         User::create([
            'name'=>'Rodrigo Pinea',
            'email'=>'rodri_p86@hotmail.com',
            'password'=>bcrypt('12345678')
         ])->assignRole('Admin');

         User::create([
            'name'=>'Dcrg1',
            'email'=>'Dcrg1@hotmail.com',
            'password'=>bcrypt('dcrg101')
         ])->assignRole('Adminrg');





         //User::factory(3)->create();
    }
}
