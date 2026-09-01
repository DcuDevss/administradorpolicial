<?php

namespace Database\Seeders;

use App\Models\Dependencia;
use App\Models\Ubicacion;
use Illuminate\Database\Seeder;

class UbicacionSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | DIVISIÓN COMUNICACIONES
        |--------------------------------------------------------------------------
        */

        $comunicaciones = Dependencia::where('codigo', 'DCU')
            ->firstOrFail();

        $areasComunicaciones = [
            [
                'nombre' => 'Área VHF/UHF/HF',
                'codigo' => 'DCU-VHF-UHF-HF',
            ],
            [
                'nombre' => 'Área Sistemas',
                'codigo' => 'DCU-SISTEMAS',
            ],
            [
                'nombre' => 'Área Administrativa',
                'codigo' => 'DCU-ADMIN',
            ],
            [
                'nombre' => 'Área Desarrollo',
                'codigo' => 'DCU-DESARROLLO',
            ],
            [
                'nombre' => 'Área Infraestructura Informática / Reparación',
                'codigo' => 'DCU-INFRA',
            ],
        ];

        foreach ($areasComunicaciones as $area) {
            Ubicacion::updateOrCreate(
                [
                    'dependencia_id' => $comunicaciones->id,
                    'nombre' => $area['nombre'],
                ],
                [
                    'parent_id' => null,
                    'tipo' => 'area',
                    'codigo' => $area['codigo'],
                    'descripcion' => null,
                    'activa' => true,
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | UBICACIONES COMUNES
        |--------------------------------------------------------------------------
        |
        | Estructura inicial utilizada por las dependencias operativas.
        |
        */

        $ubicacionesComunes = [
            [
                'nombre' => 'Guardia',
                'codigo' => 'GUARDIA',
            ],
            [
                'nombre' => 'Oficina Administrativa',
                'codigo' => 'ADMIN',
            ],
            [
                'nombre' => 'Oficina Sumariante',
                'codigo' => 'SUMARIANTE',
            ],
            [
                'nombre' => 'Oficina Jefe',
                'codigo' => 'JEFE',
            ],
            [
                'nombre' => 'Oficina Oficial de Servicio',
                'codigo' => 'OFICIAL-SERVICIO',
            ],
            [
                'nombre' => 'Oficina Segundo Jefe',
                'codigo' => 'SEGUNDO-JEFE',
            ],
        ];


        /*
        |--------------------------------------------------------------------------
        | COMISARÍAS
        |--------------------------------------------------------------------------
        */

        $comisarias = Dependencia::whereIn('codigo', [
            'COM-1',
            'COM-2',
            'COM-3',
            'COM-4',
            'COM-5',
        ])->get();

        /*
        | Si todavía las dependencias no tienen esos códigos,
        | buscamos por nombre como respaldo.
        */

        if ($comisarias->isEmpty()) {
            $comisarias = Dependencia::whereIn('nombre', [
                'Comisaría Primera Ushuaia',
                'Comisaría Segunda Ushuaia',
                'Comisaría Tercera Ushuaia',
                'Comisaría Cuarta Ushuaia',
                'Comisaría Quinta Ushuaia',
            ])->get();
        }

        foreach ($comisarias as $dependencia) {
            foreach ($ubicacionesComunes as $ubicacion) {
                Ubicacion::updateOrCreate(
                    [
                        'dependencia_id' => $dependencia->id,
                        'nombre' => $ubicacion['nombre'],
                    ],
                    [
                        'parent_id' => null,
                        'tipo' => 'oficina',
                        'codigo' => $dependencia->codigo
                            ? $dependencia->codigo . '-' . $ubicacion['codigo']
                            : $ubicacion['codigo'],
                        'descripcion' => null,
                        'activa' => true,
                    ]
                );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | GÉNERO Y FAMILIA
        |--------------------------------------------------------------------------
        */

        $generoFamilia = Dependencia::whereIn('nombre', [
            'Comisaría Género y Familia 1 Ushuaia',
            'Comisaría Género y Familia 2 Ushuaia',
        ])->get();

        foreach ($generoFamilia as $dependencia) {
            foreach ($ubicacionesComunes as $ubicacion) {
                Ubicacion::updateOrCreate(
                    [
                        'dependencia_id' => $dependencia->id,
                        'nombre' => $ubicacion['nombre'],
                    ],
                    [
                        'parent_id' => null,
                        'tipo' => 'oficina',
                        'codigo' => $dependencia->codigo
                            ? $dependencia->codigo . '-' . $ubicacion['codigo']
                            : $ubicacion['codigo'],
                        'descripcion' => null,
                        'activa' => true,
                    ]
                );
            }
        }
    }
}
