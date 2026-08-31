<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      User::firstOrCreate(
         ['email' => 'retacris30@gmail.com'],
         [
            'name' => 'Cristian Roman Retamar',
            'password' => bcrypt('12345678'),
         ]
      )->assignRole('Admin');

      User::firstOrCreate(
         ['email' => 'comisaria@gmail.com'],
         [
            'name' => 'Gabriel Molina',
            'password' => bcrypt('DCU911'),
         ]
      )->assignRole('Dependencias');

      User::firstOrCreate(
         ['email' => 'tecnico-informatico@gmail.com'],
         [
            'name' => 'Gabriel Tecnico',
            'password' => bcrypt('DCU911'),
         ]
      )->assignRole('tecnicoinformatico');

      User::firstOrCreate(
         ['email' => 'roxisegovia20@gmail.com'],
         [
            'name' => 'Rosana Segovia',
            'password' => bcrypt('ROXI20'),
         ]
      )->assignRole('tecnicoinformatico');

      User::firstOrCreate(
         ['email' => 'comunicaciones.dcu@gmail.com'],
         [
            'name' => 'tecnicos comunicaciones',
            'password' => bcrypt('comunicaciones101'),
         ]
      )->assignRole('tecnicocomunicacion');

      User::firstOrCreate(
         ['email' => 'comisaria.primera@gmail.com'],
         [
            'name' => 'Comisaria Primera',
            'password' => bcrypt('primera101'),
         ]
      )->assignRole('userComisaria1');

      User::firstOrCreate(
         ['email' => 'comisaria.segunda@gmail.com'],
         [
            'name' => 'Comisaria Segunda',
            'password' => bcrypt('segunda101'),
         ]
      )->assignRole('userComisaria2');

      User::firstOrCreate(
         ['email' => 'comisaria.tercera@gmail.com'],
         [
            'name' => 'Comisaria Tercera',
            'password' => bcrypt('tercera101'),
         ]
      )->assignRole('userComisaria3');

      User::firstOrCreate(
         ['email' => 'comisaria.cuarta@gmail.com'],
         [
            'name' => 'Comisaria Cuarta',
            'password' => bcrypt('cuarta101'),
         ]
      )->assignRole('userComisaria4');

      User::firstOrCreate(
         ['email' => 'comisaria.quinta@gmail.com'],
         [
            'name' => 'Comisaria Quinta',
            'password' => bcrypt('quinta101'),
         ]
      )->assignRole('userComisaria5');

      User::firstOrCreate(
         ['email' => 'recursos.humanos@gmail.com'],
         [
            'name' => 'Recursos Humanos',
            'password' => bcrypt('RecursosHumanos101'),
         ]
      )->assignRole('RecursosHumanos');

      User::firstOrCreate(
         ['email' => 'dario.carrasco@gmail.com'],
         [
            'name' => 'Carrasco Comunicaciones',
            'password' => bcrypt('carrasco101'),
         ]
      )->assignRole('tecnicocomunicacion');

      User::firstOrCreate(
         ['email' => 'adrian.sosa@gmail.com'],
         [
            'name' => 'Sosa Comunicaciones',
            'password' => bcrypt('sosa101'),
         ]
      )->assignRole('tecnicocomunicacion');

      User::firstOrCreate(
         ['email' => 'facundo.griffith@gmail.com'],
         [
            'name' => 'Griffith Comunicaciones',
            'password' => bcrypt('griffith101'),
         ]
      )->assignRole('tecnicocomunicacion');

      User::firstOrCreate(
         ['email' => 'matias.quiroga.com'],
         [
            'name' => 'Quiroga Informatico',
            'password' => bcrypt('quiroga101'),
         ]
      )->assignRole('tecnicoinformatico');

      User::firstOrCreate(
         ['email' => 'raul.romero@gmail.com'],
         [
            'name' => 'Raul Informatica',
            'password' => bcrypt('romero101'),
         ]
      )->assignRole('tecnicoinformatico');

      User::firstOrCreate(
         ['email' => 'fliagenero1@gmail.com'],
         [
            'name' => 'Comisaria de Genero y Familia N° 1',
            'password' => bcrypt('generoflia1_101'),
         ]
      );

      User::firstOrCreate(
         ['email' => 'fliagenero2@gmail.com'],
         [
            'name' => 'Comisaria de Genero y Famila N° 2',
            'password' => bcrypt('generoflia2101'),
         ]
      );

      User::firstOrCreate(
         ['email' => 'servicios.especiales@gmail.com'],
         [
            'name' => 'Servicios Especiales',
            'password' => bcrypt('servicios101'),
         ]
      );

      User::firstOrCreate(
         ['email' => 'custodia.gubernamental@gmail.com'],
         [
            'name' => 'Custodia Gubernamental',
            'password' => bcrypt('custodia101'),
         ]
      );

      User::firstOrCreate(
         ['email' => 'luisdanielrojo@gmail.com'],
         [
            'name' => 'Luis rojo',
            'password' => bcrypt('luis.2024'),
         ]
      )->assignRole('Admin');

      User::firstOrCreate(
         ['email' => 'rodri_p86@hotmail.com'],
         [
            'name' => 'Rodrigo Pinea',
            'password' => bcrypt('12345678'),
         ]
      )->assignRole('Admin');

      User::firstOrCreate(
         ['email' => 'Dcrg1@hotmail.com'],
         [
            'name' => 'Dcrg1',
            'password' => bcrypt('dcrg101'),
         ]
      )->assignRole('Adminrg');
   }
}
