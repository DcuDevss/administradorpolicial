<?php

namespace Database\Seeders;

use App\Models\Dependencia;
use Illuminate\Database\Seeder;

class DependenciaSeeder extends Seeder
{
    public function run(): void
    {
        // =========================================================
        // NIVEL 1
        // =========================================================

        $jefatura = Dependencia::updateOrCreate(
            ['nombre' => 'Jefatura de Policía'],
            [
                'codigo' => 'JP',
                'tipo' => 'Jefatura',
                'dependencia_padre_id' => null,
            ]
        );

        // =========================================================
        // NIVEL 2
        // =========================================================

        $direccionRegionalSur = Dependencia::updateOrCreate(
            ['nombre' => 'Dirección General Regional Zona Sur'],
            [
                'codigo' => 'DGRZS',
                'tipo' => 'Dirección Regional',
                'dependencia_padre_id' => $jefatura->id,
            ]
        );

        // =========================================================
        // NIVEL 3
        // =========================================================

        $unidadRegionalSur = Dependencia::updateOrCreate(
            ['nombre' => 'Unidad Regional Sur'],
            [
                'codigo' => 'URS',
                'tipo' => 'Unidad Regional',
                'dependencia_padre_id' => $direccionRegionalSur->id,
            ]
        );

        // =========================================================
        // NIVEL 4 - DEPENDENCIAS DE LA UNIDAD REGIONAL SUR
        // =========================================================

        $dependencias = [
            [
                'nombre' => 'Comisaría Primera Ushuaia',
                'codigo' => 'CRIA1-USH',
                'tipo' => 'Comisaría',
            ],
            [
                'nombre' => 'Comisaría Segunda Ushuaia',
                'codigo' => 'CRIA2-USH',
                'tipo' => 'Comisaría',
            ],
            [
                'nombre' => 'Comisaría Tercera Ushuaia',
                'codigo' => 'CRIA3-USH',
                'tipo' => 'Comisaría',
            ],
            [
                'nombre' => 'Comisaría Cuarta Ushuaia',
                'codigo' => 'CRIA4-USH',
                'tipo' => 'Comisaría',
            ],
            [
                'nombre' => 'Comisaría Quinta Ushuaia',
                'codigo' => 'CRIA5-USH',
                'tipo' => 'Comisaría',
            ],
            [
                'nombre' => 'Comisaría Género y Familia 1 Ushuaia',
                'codigo' => 'CGF1-USH',
                'tipo' => 'Comisaría',
            ],
            [
                'nombre' => 'Comisaría Género y Familia 2 Ushuaia',
                'codigo' => 'CGF2-USH',
                'tipo' => 'Comisaría',
            ],
            [
                'nombre' => 'División Servicios Especiales Ushuaia',
                'codigo' => 'DSE-USH',
                'tipo' => 'División',
            ],
            [
                'nombre' => 'División Comunicaciones Ushuaia',
                'codigo' => 'DCU',
                'tipo' => 'División',
            ],
        ];

        foreach ($dependencias as $dependencia) {
            Dependencia::updateOrCreate(
                ['nombre' => $dependencia['nombre']],
                [
                    'codigo' => $dependencia['codigo'],
                    'tipo' => $dependencia['tipo'],
                    'dependencia_padre_id' => $unidadRegionalSur->id,
                ]
            );
        }
    }
}
