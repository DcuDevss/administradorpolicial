<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Roles
        |--------------------------------------------------------------------------
        */

        $role1 = Role::firstOrCreate([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);

        $role2 = Role::firstOrCreate([
            'name' => 'tecnicoinformatico',
            'guard_name' => 'web',
        ]);

        $role3 = Role::firstOrCreate([
            'name' => 'tecnicocomunicacion',
            'guard_name' => 'web',
        ]);

        $role4 = Role::firstOrCreate([
            'name' => 'userComisaria1',
            'guard_name' => 'web',
        ]);

        $role5 = Role::firstOrCreate([
            'name' => 'userComisaria2',
            'guard_name' => 'web',
        ]);

        $role6 = Role::firstOrCreate([
            'name' => 'userComisaria3',
            'guard_name' => 'web',
        ]);

        $role7 = Role::firstOrCreate([
            'name' => 'userComisaria4',
            'guard_name' => 'web',
        ]);

        $role8 = Role::firstOrCreate([
            'name' => 'userComisaria5',
            'guard_name' => 'web',
        ]);

        $role9 = Role::firstOrCreate([
            'name' => 'RecursosHumanos',
            'guard_name' => 'web',
        ]);

        $role10 = Role::firstOrCreate([
            'name' => 'Adminrg',
            'guard_name' => 'web',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Permisos
        |--------------------------------------------------------------------------
        */

        Permission::firstOrCreate(
            [
                'name' => 'users.index',
                'guard_name' => 'web',
            ],
            [
                'description' => 'tabla de usuarios/solo ve el Admin.',
            ]
        )->syncRoles([$role1]);

        Permission::firstOrCreate(
            [
                'name' => 'users.edit',
                'guard_name' => 'web',
            ],
            [
                'description' => 'editar usuarios rol/solo ve el Admin.',
            ]
        )->syncRoles([$role1]);

        // Permission::firstOrCreate(
        //     [
        //         'name' => 'users.update',
        //         'guard_name' => 'web',
        //     ],
        //     [
        //         'description' => 'update de usuarios rol/solo ve el Admin.',
        //     ]
        // )->syncRoles([$role1]);

        Permission::firstOrCreate(
            [
                'name' => 'tecnico-comunicacion',
                'guard_name' => 'web',
            ],
            [
                'description' => 'vista al panel de tecnico-comunicacion/solo ven tecnicos de comuni',
            ]
        )->syncRoles([$role1, $role3]);

        Permission::firstOrCreate(
            [
                'name' => 'tecnico-informatico',
                'guard_name' => 'web',
            ],
            [
                'description' => 'vista al panel de tecnico-informatico/solo ven tecnicos de info',
            ]
        )->syncRoles([$role1, $role2]);

        // Permission::firstOrCreate(
        //     [
        //         'name' => 'tecnicos',
        //         'guard_name' => 'web',
        //     ],
        //     [
        //         'description' => 'vista al panel general de tecnicos/solo ven tecnicos',
        //     ]
        // )->syncRoles([$role1, $role3, $role9]);

        Permission::firstOrCreate(
            [
                'name' => 'panel.dependencias',
                'guard_name' => 'web',
            ],
            [
                'description' => 'vista al panel de la comisaria1/solo ven tecnicos-info',
            ]
        )->syncRoles([$role1, $role2, $role3]);

        Permission::firstOrCreate(
            [
                'name' => 'panel-administrador',
                'guard_name' => 'web',
            ],
            [
                'description' => 'vista al boton del Administrador',
            ]
        )->syncRoles([$role1]);

        Permission::firstOrCreate(
            [
                'name' => 'createComisaria1',
                'guard_name' => 'web',
            ],
            [
                'description' => 'crean el inventario/solo ven los tecnicos-info',
            ]
        )->syncRoles([$role1, $role2]);

        Permission::firstOrCreate(
            [
                'name' => 'indexComisaria1',
                'guard_name' => 'web',
            ],
            [
                'description' => 'tabla del inventario/solo ven tecnicos-info',
            ]
        )->syncRoles([$role1, $role2]);

        Permission::firstOrCreate(
            [
                'name' => 'ver-notificaciones',
                'guard_name' => 'web',
            ],
            [
                'description' => 'tabla notificaciones de trabajo/solo ven tecnicos y admin',
            ]
        )->syncRoles([$role1, $role2, $role3]);

        Permission::firstOrCreate(
            [
                'name' => 'crear-notificacion',
                'guard_name' => 'web',
            ],
            [
                'description' => 'crea notificaciones/solo ven tecnicos y admin',
            ]
        )->syncRoles([$role1, $role2]);

        Permission::firstOrCreate(
            [
                'name' => 'chatlist',
                'guard_name' => 'web',
            ],
            [
                'description' => 'muestra lista de chat activos',
            ]
        )->syncRoles([
            $role1,
            $role2,
            $role3,
            $role4,
            $role5,
            $role6,
            $role7,
            $role8,
            $role9,
        ]);

        Permission::firstOrCreate(
            [
                'name' => 'userpolicia',
                'guard_name' => 'web',
            ],
            [
                'description' => 'muestra los usuarios habilitados para el chat',
            ]
        )->syncRoles([
            $role1,
            $role2,
            $role3,
            $role4,
            $role5,
            $role6,
            $role7,
            $role8,
            $role9,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Permiso para DCRG
        |--------------------------------------------------------------------------
        */

        Permission::firstOrCreate(
            [
                'name' => 'tecnico-riogrande',
                'guard_name' => 'web',
            ],
            [
                'description' => 'vista al panel de tecnico-riogrande/solo ven tecnicos-rg',
            ]
        )->syncRoles([$role1, $role10]);
    }
}
