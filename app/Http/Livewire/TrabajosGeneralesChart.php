<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\TrabajosInformatico;
use App\Models\Notificacion;
use App\Models\User;

class TrabajosGeneralesChart extends Component
{
    public $labels = [];
    public $data = [];
    //public $mesElegido;

    public function render()
    {
       // $mesElegido = 1; // Cambia este valor según el mes que desees analizar

// Obtén todos los usuarios que son relevantes para el gráfico de barras
$usuariosRelevantes = User::whereIn('id', [4, 5, 6, 7, 8])->get();

// Inicializa un array para almacenar los datos por usuario
$datosPorUsuario = [];

foreach ($usuariosRelevantes as $usuario) {
    $notificacionesPorUsuarioEnMes = Notificacion::select(DB::raw('COUNT(*) as total'))
        ->where('user_comisaria_id', $usuario->id)
        //->whereMonth('created_at')
        ->first();

    // Agrega los datos por usuario al array
    $datosPorUsuario[] = [
        'usuario' => $usuario->name,
        'total' => $notificacionesPorUsuarioEnMes ? $notificacionesPorUsuarioEnMes->total : 0,
    ];
}










        // Obtén la cantidad de trabajos informáticos por mes
        $trabajosPorMes = TrabajosInformatico::selectRaw('YEAR(fecha_trabajo) as year, MONTH(fecha_trabajo) as month, COUNT(*) as total')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Obtén la cantidad de trabajos informáticos por día
        $trabajosPorDia = TrabajosInformatico::selectRaw('YEAR(fecha_trabajo) as year, MONTH(fecha_trabajo) as month, DAY(fecha_trabajo) as day, COUNT(*) as total')
            ->groupBy('year', 'month', 'day')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->orderBy('day', 'asc')
            ->get();




        // Obtén la cantidad de trabajos informáticos por dependencia
        $trabajosPorDependencia = TrabajosInformatico::select('totaldependencia_id', DB::raw('COUNT(*) as total'))
            ->groupBy('totaldependencia_id')
            ->get();

        // Defino un arreglo con los nombres de las dependencias correspondientes a los IDs
        $dependencias = [
            3 => 'Comisaria Primera',
            4 => 'Comisaria Segunda',
            5 => 'Comisaria Tercera',
            6 => 'Dto. 365 Control de ruta',
            7 => 'Dto. 350 Pto. Almanza',
            8 => 'Dto. 352 Ingreso ruta J',
            9 => 'Comisaria Cuarta',
            10 => 'Dto 450 Cria 4ta',
            11 => 'Comisaria Quinta',
            12 => 'Dto 550 Ingreso Andorra',
        ];

        // Convertir los resultados a un formato adecuado para el gráfico de barras
        $dataPorMes = $trabajosPorMes->map(function ($item) {
            return [
                'label' => "$item->year-$item->month",
                'total' => $item->total,
            ];
        });

        $dataPorDia = $trabajosPorDia->map(function ($item) {
            return [
                'label' => "$item->year-$item->month-$item->day",
                'total' => $item->total,
            ];
        });
        // Convertir los resultados a un formato adecuado para el gráfico de torta
        $dataPorDependencia = $trabajosPorDependencia->map(function ($item) use ($dependencias) {
            return [
                'label' => $dependencias[$item->totaldependencia_id] ?? 'Desconocido',
                'total' => $item->total,
            ];
        });

        return view('livewire.trabajos-generales-chart'
        , [
            'dataPorMes' => $dataPorMes,
            'dataPorDia' => $dataPorDia,
            'trabajosPorMes' => $trabajosPorMes,
            'trabajosPorDia' => $trabajosPorDia,
            'dataPorDependencia' => $dataPorDependencia,
            'datosPorUsuario' => $datosPorUsuario, // Etiquetas para el gráfico de torta
            //'totalesPorUsuario' => $totalesPorUsuario,     // Datos para el gráfico de torta
        ]);
    /*compact('dataPorMes', 'dataPorDia', 'trabajosPorMes', 'trabajosPorDia', 'dataPorDependencia', 'nombresUsuarios', 'totalesNotificaciones')*/
    }
}
