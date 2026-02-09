<?php

namespace App\Http\Livewire\Informatica\Inventario;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IndexTotalInventarioProvincia extends Component
{
    public function render()
    {
        // Listado de tablas por localidad
        $tablas = [
            'generalinformaticas',        // Ushuaia
            'riograndegenerales',         // Río Grande
            'tolhuingenerales',           // Tolhuin
            'administraciongenerales',
            'jefaturagenerales',
            'investigacionesgenerales',
            'recursoshumanosgenerales'
        ];

        // Para evitar repetir código hacemos una función
        $conteo = function($tipodispositivo_id) use ($tablas) {
            $suma = 0;
            foreach ($tablas as $tabla) {
                $suma += DB::table($tabla)
                    ->where('tipodispositivo_id', $tipodispositivo_id)
                    ->count();
            }
            return $suma;
        };

        // Ahora simplemente pedimos los totales
        $sumaTotalOtros                    = $conteo(1);
        $sumaTotalPc                    = $conteo(3);
        $sumaTotalMonitor_pc            = $conteo(4);
        $sumaTotalNotebook              = $conteo(5);
        $sumaTotalNetbook               = $conteo(6);
        $sumaTotalCelular               = $conteo(7);
        $sumaTotalTablet                = $conteo(8);
        $sumaTotalTelefono_fijo         = $conteo(9);
        $sumaTotalTelefono_inalambrico  = $conteo(10);
        $sumaTotalImpresora_laser       = $conteo(11);
        $sumaTotalImpresora_tinta       = $conteo(12);
        $sumaTotalSwitch                = $conteo(13);
        $sumaTotalRuter                 = $conteo(14);
        $sumaTotalUps                   = $conteo(15);
        $sumaTotalCamaras_video         = $conteo(16);
        $sumaTotalEstacion_trabajo      = $conteo(17);
        $sumaTotalServidor              = $conteo(18);
        $sumaTotalEstabilizador         = $conteo(19);
        $sumaTotalAuriculares           = $conteo(20);
        $sumaTotalCable                 = $conteo(21);
        $sumaTotalTv                    = $conteo(22);
        $sumaTotalCentralTelefonica     = $conteo(23);

        return view('livewire.informatica.inventario.index-totalinventario-provincia', compact(
            'sumaTotalOtros',
            'sumaTotalPc',
            'sumaTotalMonitor_pc',
            'sumaTotalNotebook',
            'sumaTotalNetbook',
            'sumaTotalCelular',
            'sumaTotalTablet',
            'sumaTotalTelefono_fijo',
            'sumaTotalTelefono_inalambrico',
            'sumaTotalImpresora_laser',
            'sumaTotalImpresora_tinta',
            'sumaTotalSwitch',
            'sumaTotalRuter',
            'sumaTotalUps',
            'sumaTotalCamaras_video',
            'sumaTotalEstacion_trabajo',
            'sumaTotalServidor',
            'sumaTotalEstabilizador',
            'sumaTotalAuriculares',
            'sumaTotalCable',
            'sumaTotalTv',
            'sumaTotalCentralTelefonica',
        ));
    }
}
