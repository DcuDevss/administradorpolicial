<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Dependencia;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Seed de las áreas funcionales de la
     * División Comunicaciones Ushuaia.
     */
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | División Comunicaciones Ushuaia
        |--------------------------------------------------------------------------
        */

        $dependencia = Dependencia::where('codigo', 'DCU')->first();

        if (!$dependencia) {
            $this->command?->warn(
                'No se encontró la dependencia con código DCU.'
            );

            return;
        }

        /*
        |--------------------------------------------------------------------------
        | Área VHF / UHF / HF
        |--------------------------------------------------------------------------
        */

        Area::updateOrCreate(
            [
                'dependencia_id' => $dependencia->id,
                'codigo' => 'VHF-UHF-HF',
            ],
            [
                'nombre' => 'Área VHF/UHF/HF',
                'descripcion' => 'Área destinada a la gestión, mantenimiento y soporte de sistemas de comunicaciones VHF, UHF y HF.',
                'activa' => true,
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Área Sistemas
        |--------------------------------------------------------------------------
        */

        Area::updateOrCreate(
            [
                'dependencia_id' => $dependencia->id,
                'codigo' => 'SISTEMAS',
            ],
            [
                'nombre' => 'Área Sistemas',
                'descripcion' => 'Área destinada a la gestión y soporte de sistemas informáticos.',
                'activa' => true,
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Área Administrativa
        |--------------------------------------------------------------------------
        */

        Area::updateOrCreate(
            [
                'dependencia_id' => $dependencia->id,
                'codigo' => 'ADMIN',
            ],
            [
                'nombre' => 'Área Administrativa',
                'descripcion' => 'Área destinada a las tareas administrativas de la División Comunicaciones.',
                'activa' => true,
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Área Desarrollo
        |--------------------------------------------------------------------------
        */

        Area::updateOrCreate(
            [
                'dependencia_id' => $dependencia->id,
                'codigo' => 'DESARROLLO',
            ],
            [
                'nombre' => 'Área Desarrollo',
                'descripcion' => 'Área destinada al desarrollo, mantenimiento y evolución de sistemas y aplicaciones.',
                'activa' => true,
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Área Infraestructura Informática
        |--------------------------------------------------------------------------
        */

        Area::updateOrCreate(
            [
                'dependencia_id' => $dependencia->id,
                'codigo' => 'INFRA',
            ],
            [
                'nombre' => 'Área Infraestructura Informática',
                'descripcion' => 'Área destinada a la infraestructura, equipamiento y soporte informático.',
                'activa' => true,
            ]
        );
    }
}
