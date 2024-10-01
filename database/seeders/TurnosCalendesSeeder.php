<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Turno;
use Carbon\Carbon;

class TurnosCalendesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cantidad de turnos que deseas generar
        $cantidadTurnos = 30;

        for ($i = 0; $i < $cantidadTurnos; $i++) {
            $fechaHora = Carbon::now()
                ->addDays(random_int(1, 30))
                ->setTime(random_int(8, 16), random_int(0, 1) ? 0 : 30, 0); // Establecer hora entre 08:00 AM y 16:30 PM

            Turno::create([
                'fecha_hora' => $fechaHora,
                // Agrega aquí otros campos si los tienes en tu tabla de turnos
            ]);
        }
    }
}
