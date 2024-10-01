<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Notificacion;
use App\Models\RespuestaNotificacion;
use App\Events\NuevaRespuesta;

class CrearNotificacion extends Component
{
    public $mensaje;
    public $tecnico_id;
    public $activa = false;
   // public $mensajeTecnico;

    public function render()
    {
        // Obtener todos los técnicos disponibles
       // $tecnicos = User::role('tecnico')->get();
       $tecnicos = User::role(['tecnicoinformatico', 'tecnicocomunicacion'])->get();

        return view('livewire.crear-notificacion', compact('tecnicos'));
    }


    public function enviarNotificacion()
    {
        // Validar permisos de usuarioComisaria para enviar notificaciones

        $this->validate([
            'mensaje' => 'required',
            'tecnico_id' => 'required|exists:users,id',
        ]);

        // Guardar la notificación en la base de datos
        $notificacion=Notificacion::create([
            'mensaje' => $this->mensaje,
            'activa' => $this->activa,
            'user_comisaria_id' => auth()->id(), //
            'tecnico_id' => $this->tecnico_id,
        ]);


        session()->flash('success', 'Notificación enviada correctamente.');
        return redirect()->route('dashboard'); // Redirigir a la página principal después de enviar la notificación
    }

}

