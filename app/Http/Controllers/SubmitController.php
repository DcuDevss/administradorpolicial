<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Appointment;

class SubmitController extends Controller
{
    public function reserve(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            'date' => 'required|date',
            'time' => 'required',
        ]);

        $dateTime = Carbon::createFromFormat('Y-m-d hA', $data['date'] . ' ' . $data['time']);

        // Crear una nueva cita y asociarla al usuario
        $appointment = new Appointment([
            'start_time' => $dateTime,
        ]);
        $user->appointments()->save($appointment);

        return redirect()->back()->with('success', 'Turno reservado exitosamente');
    }
}

