<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Dependencia;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
   public function run(): void
   {
      /*
        |--------------------------------------------------------------------------
        | DEPENDENCIAS
        |--------------------------------------------------------------------------
        */

      $divisionComunicaciones = Dependencia::where(
         'nombre',
         'División Comunicaciones Ushuaia'
      )->first();

      $comisariaPrimera = Dependencia::where(
         'nombre',
         'Comisaría Primera Ushuaia'
      )->first();

      $comisariaSegunda = Dependencia::where(
         'nombre',
         'Comisaría Segunda Ushuaia'
      )->first();

      $comisariaTercera = Dependencia::where(
         'nombre',
         'Comisaría Tercera Ushuaia'
      )->first();

      $comisariaCuarta = Dependencia::where(
         'nombre',
         'Comisaría Cuarta Ushuaia'
      )->first();

      $comisariaQuinta = Dependencia::where(
         'nombre',
         'Comisaría Quinta Ushuaia'
      )->first();

      $generoFamilia1 = Dependencia::where(
         'nombre',
         'Comisaría Género y Familia 1 Ushuaia'
      )->first();

      $generoFamilia2 = Dependencia::where(
         'nombre',
         'Comisaría Género y Familia 2 Ushuaia'
      )->first();

      $serviciosEspeciales = Dependencia::where(
         'nombre',
         'División Servicios Especiales Ushuaia'
      )->first();

      /*
        |--------------------------------------------------------------------------
        | ÁREAS DE DIVISIÓN COMUNICACIONES
        |--------------------------------------------------------------------------
        */

      $areaVhfUhfHf = Area::where(
         'dependencia_id',
         $divisionComunicaciones?->id
      )
         ->where('nombre', 'Área VHF/UHF/HF')
         ->first();

      $areaSistemas = Area::where(
         'dependencia_id',
         $divisionComunicaciones?->id
      )
         ->where('nombre', 'Área Sistemas')
         ->first();

      $areaAdministrativa = Area::where(
         'dependencia_id',
         $divisionComunicaciones?->id
      )
         ->where('nombre', 'Área Administrativa')
         ->first();

      $areaDesarrollo = Area::where(
         'dependencia_id',
         $divisionComunicaciones?->id
      )
         ->where('nombre', 'Área Desarrollo')
         ->first();

      $areaInfraestructura = Area::where(
         'dependencia_id',
         $divisionComunicaciones?->id
      )
         ->where('nombre', 'Área Infraestructura Informática')
         ->first();


      /*
        |--------------------------------------------------------------------------
        | ADMINISTRADOR DEL SISTEMA
        |--------------------------------------------------------------------------
        |
        | Se mantiene un usuario administrativo independiente.
        | No se asigna a un área operativa de Comunicaciones.
        |
        */

      User::updateOrCreate(
         ['email' => 'admin@administradorpolicial.local'],
         [
            'name' => 'DCU Admin',
            'password' => bcrypt('DCU911'),
            'dependencia_id' => $divisionComunicaciones?->id,
            'area_id' => null,
         ]
      )->assignRole('Admin');


      /*
        |--------------------------------------------------------------------------
        | COMISARÍA / USUARIO DE DEPENDENCIA
        |--------------------------------------------------------------------------
        */

      User::updateOrCreate(
         ['email' => 'comisaria@gmail.com'],
         [
            'name' => 'Gabriel comisaria',
            'password' => bcrypt('DCU911'),
            'dependencia_id' => $comisariaPrimera?->id,
            'area_id' => null,
         ]
      )->assignRole('Dependencias');


      /*
        |--------------------------------------------------------------------------
        | PERSONAL ÁREA DESARROLLO
        |--------------------------------------------------------------------------
        |
        | Sergio Ramos Orcko
        | Jorge Molina
        |
        */

      User::updateOrCreate(
         ['email' => 'tecnico-informatico@gmail.com'],
         [
            'name' => 'Gabriel Tecnico',
            'password' => bcrypt('DCU911'),
            'dependencia_id' => $divisionComunicaciones?->id,
            'area_id' => $areaDesarrollo?->id,
         ]
      )->assignRole('tecnicoinformatico');


      /*
        |--------------------------------------------------------------------------
        | PERSONAL ÁREA INFRAESTRUCTURA INFORMÁTICA
        |--------------------------------------------------------------------------
        |
        | Marcelo Calatayud
        | Ricardo Karalevich
        | Jesús Boni
        | Rosana Segovia
        |
        */

      User::updateOrCreate(
         ['email' => 'roxisegovia20@gmail.com'],
         [
            'name' => 'Rosana Segovia',
            'password' => bcrypt('ROXI20'),
            'dependencia_id' => $divisionComunicaciones?->id,
            'area_id' => $areaInfraestructura?->id,
         ]
      )->assignRole('tecnicoinformatico');


      /*
        |--------------------------------------------------------------------------
        | USUARIO GENERAL DE COMUNICACIONES
        |--------------------------------------------------------------------------
        */

      User::updateOrCreate(
         ['email' => 'comunicaciones.dcu@gmail.com'],
         [
            'name' => 'Tecnicos Comunicaciones',
            'password' => bcrypt('comunicaciones101'),
            'dependencia_id' => $divisionComunicaciones?->id,
            'area_id' => null,
         ]
      )->assignRole('tecnicocomunicacion');


      /*
        |--------------------------------------------------------------------------
        | ÁREA VHF / UHF / HF
        |--------------------------------------------------------------------------
        |
        | Darío Carrasco
        | Adrián Soza
        | Facundo Griffiths
        |
        */

      User::updateOrCreate(
         ['email' => 'dario.carrasco@gmail.com'],
         [
            'name' => 'Darío Carrasco',
            'password' => bcrypt('carrasco101'),
            'dependencia_id' => $divisionComunicaciones?->id,
            'area_id' => $areaVhfUhfHf?->id,
         ]
      )->assignRole('tecnicocomunicacion');


      User::updateOrCreate(
         ['email' => 'adrian.sosa@gmail.com'],
         [
            'name' => 'Adrián Soza',
            'password' => bcrypt('sosa101'),
            'dependencia_id' => $divisionComunicaciones?->id,
            'area_id' => $areaVhfUhfHf?->id,
         ]
      )->assignRole('tecnicocomunicacion');


      User::updateOrCreate(
         ['email' => 'facundo.griffith@gmail.com'],
         [
            'name' => 'Facundo Griffiths',
            'password' => bcrypt('griffith101'),
            'dependencia_id' => $divisionComunicaciones?->id,
            'area_id' => $areaVhfUhfHf?->id,
         ]
      )->assignRole('tecnicocomunicacion');


      /*
        |--------------------------------------------------------------------------
        | ÁREA SISTEMAS
        |--------------------------------------------------------------------------
        |
        | Víctor Quispe
        | Esteban Ortega
        | Rodrigo Pinea
        |
        */

      User::updateOrCreate(
         ['email' => 'victor.quispe@gmail.com'],
         [
            'name' => 'Víctor Quispe',
            'password' => bcrypt('quispe101'),
            'dependencia_id' => $divisionComunicaciones?->id,
            'area_id' => $areaSistemas?->id,
         ]
      )->assignRole('tecnicoinformatico');


      User::updateOrCreate(
         ['email' => 'esteban.ortega@gmail.com'],
         [
            'name' => 'Esteban Ortega',
            'password' => bcrypt('ortega101'),
            'dependencia_id' => $divisionComunicaciones?->id,
            'area_id' => $areaSistemas?->id,
         ]
      )->assignRole('tecnicoinformatico');


      User::updateOrCreate(
         ['email' => 'rodrigo.pinea@gmail.com'],
         [
            'name' => 'Rodrigo Pinea',
            'password' => bcrypt('12345678'),
            'dependencia_id' => $divisionComunicaciones?->id,
            'area_id' => $areaSistemas?->id,
         ]
      )->assignRole('tecnicoinformatico');


      /*
        |--------------------------------------------------------------------------
        | ÁREA ADMINISTRATIVA
        |--------------------------------------------------------------------------
        |
        | Paola Cuello
        |
        */

      User::updateOrCreate(
         ['email' => 'paola.cuello@gmail.com'],
         [
            'name' => 'Paola Cuello',
            'password' => bcrypt('paola101'),
            'dependencia_id' => $divisionComunicaciones?->id,
            'area_id' => $areaAdministrativa?->id,
         ]
      );


      /*
        |--------------------------------------------------------------------------
        | COMISARÍAS
        |--------------------------------------------------------------------------
        */

      User::updateOrCreate(
         ['email' => 'comisaria.primera@gmail.com'],
         [
            'name' => 'Comisaría Primera',
            'password' => bcrypt('primera101'),
            'dependencia_id' => $comisariaPrimera?->id,
            'area_id' => null,
         ]
      )->assignRole('userComisaria1');


      User::updateOrCreate(
         ['email' => 'comisaria.segunda@gmail.com'],
         [
            'name' => 'Comisaría Segunda',
            'password' => bcrypt('segunda101'),
            'dependencia_id' => $comisariaSegunda?->id,
            'area_id' => null,
         ]
      )->assignRole('userComisaria2');


      User::updateOrCreate(
         ['email' => 'comisaria.tercera@gmail.com'],
         [
            'name' => 'Comisaría Tercera',
            'password' => bcrypt('tercera101'),
            'dependencia_id' => $comisariaTercera?->id,
            'area_id' => null,
         ]
      )->assignRole('userComisaria3');


      User::updateOrCreate(
         ['email' => 'comisaria.cuarta@gmail.com'],
         [
            'name' => 'Comisaría Cuarta',
            'password' => bcrypt('cuarta101'),
            'dependencia_id' => $comisariaCuarta?->id,
            'area_id' => null,
         ]
      )->assignRole('userComisaria4');


      User::updateOrCreate(
         ['email' => 'comisaria.quinta@gmail.com'],
         [
            'name' => 'Comisaría Quinta',
            'password' => bcrypt('quinta101'),
            'dependencia_id' => $comisariaQuinta?->id,
            'area_id' => null,
         ]
      )->assignRole('userComisaria5');


      /*
        |--------------------------------------------------------------------------
        | COMISARÍAS DE GÉNERO Y FAMILIA
        |--------------------------------------------------------------------------
        */

      User::updateOrCreate(
         ['email' => 'fliagenero1@gmail.com'],
         [
            'name' => 'Comisaría de Género y Familia N° 1',
            'password' => bcrypt('generoflia1_101'),
            'dependencia_id' => $generoFamilia1?->id,
            'area_id' => null,
         ]
      );


      User::updateOrCreate(
         ['email' => 'fliagenero2@gmail.com'],
         [
            'name' => 'Comisaría de Género y Familia N° 2',
            'password' => bcrypt('generoflia2101'),
            'dependencia_id' => $generoFamilia2?->id,
            'area_id' => null,
         ]
      );


      /*
        |--------------------------------------------------------------------------
        | SERVICIOS ESPECIALES
        |--------------------------------------------------------------------------
        */

      User::updateOrCreate(
         ['email' => 'servicios.especiales@gmail.com'],
         [
            'name' => 'Servicios Especiales',
            'password' => bcrypt('servicios101'),
            'dependencia_id' => $serviciosEspeciales?->id,
            'area_id' => null,
         ]
      );


      /*
        |--------------------------------------------------------------------------
        | CUSTODIA GUBERNAMENTAL
        |--------------------------------------------------------------------------
        */

      User::updateOrCreate(
         ['email' => 'custodia.gubernamental@gmail.com'],
         [
            'name' => 'Custodia Gubernamental',
            'password' => bcrypt('custodia101'),
            'dependencia_id' => null,
            'area_id' => null,
         ]
      );


      /*
        |--------------------------------------------------------------------------
        | USUARIO ADMINISTRATIVO REGIONAL
        |--------------------------------------------------------------------------
        |
        | Se conserva el rol existente para no romper funcionalidades actuales.
        |
        */

      User::updateOrCreate(
         ['email' => 'Dcrg1@hotmail.com'],
         [
            'name' => 'Dcrg1',
            'password' => bcrypt('dcrg101'),
            'dependencia_id' => null,
            'area_id' => null,
         ]
      )->assignRole('Adminrg');
   }
}
