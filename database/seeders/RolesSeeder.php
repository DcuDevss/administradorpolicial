<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'tecnicoinformatico']);
        $role3 = Role::create(['name' => 'tecnicocomunicacion']);
        $role4 = Role::create(['name' => 'userComisaria1']);
        $role5 = Role::create(['name' => 'userComisaria2']);
        $role6 = Role::create(['name' => 'userComisaria3']);
        $role7 = Role::create(['name' => 'userComisaria4']);
        $role8 = Role::create(['name' => 'userComisaria5']);
        $role9 = Role::create(['name' => 'RecursosHumanos']);
        $role10 = Role::create(['name' => 'Adminrg']);



        Permission::create(['name' => 'users.index', 'description' => 'tabla de usuarios/solo ve el Admin.'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit', 'description' => 'editar usuarios rol/solo ve el Admin.'])->syncRoles([$role1]);
        //Permission::create(['name'=> 'users.update','description'=>'update de usuarios rol/solo ve el Admin.'])->syncRoles([$role1]);

        Permission::create(['name' => 'tecnico-comunicacion', 'description' => 'vista al panel de tecnico-comunicacion/solo ven tecnicos de comuni'])->syncRoles([$role1, $role3]);


        Permission::create(['name' => 'tecnico-informatico', 'description' => 'vista al panel de tecnico-informatico/solo ven tecnicos de info'])->syncRoles([$role1, $role2]);

        //Permission::create(['name'=> 'tecnicos','description'=>'vista al panel  general de tecnicos/solo ven tecnicos '])->syncRoles([$role1,$role3,$role9]);

        Permission::create(['name' => 'panel.dependencias', 'description' => 'vista al panel de la comisaria1/solo ven tecnicos-info'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'panel-administrador', 'description' => 'vista al boton del Administrador'])->syncRoles([$role1]);

        Permission::create(['name' => 'createComisaria1', 'description' => 'crean el inventario/solo ven los tecnicos-info'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'indexComisaria1', 'description' => 'tabla del inventario/solo ven tecnicos-info'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'ver-notificaciones', 'description' => 'tabla notificaciones de trabajo/solo ven tecnicos y admin'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'crear-notificacion', 'description' => 'crea notificaciones/solo ven tecnicos y admin'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'chatlist', 'description' => 'muestra lista de chat activos'])->syncRoles([$role1, $role2, $role3, $role4, $role5, $role6, $role7, $role8, $role9]);
        Permission::create(['name' => 'userpolicia', 'description' => 'muestra los usuarios habilitados para el chat'])->syncRoles([$role1, $role2, $role3, $role4, $role5, $role6, $role7, $role8, $role9]);

        //Permiso para DCRG
        Permission::create(['name' => 'tecnico-riogrande', 'description' => 'vista al panel de tecnico-riogrande/solo ven tecnicos-rg'])->syncRoles([$role1, $role10]);
    }
}
