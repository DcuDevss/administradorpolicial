<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Notificacion;
use App\Models\RespuestaNotificacion;

class EnviarRespuesta extends Component
{
    public $notificacionId;
    public $mensaje;
    public $user_comisaria_id;

    protected $rules = [
        'mensaje' => 'required',
    ];

    public function mount($notificacionId)
    {
        $this->notificacionId = $notificacionId;
    }

    public function render()
    {
        return view('livewire.enviar-respuesta');
    }

    public function enviarRespuesta()
    {
        $this->validate();

        // Crear el registro en la tabla de respuestas_notificaciones
        RespuestaNotificacion::create([
            'mensaje' => $this->mensaje,
            'user_id' => auth()->id(),
            'notificacion_id' => $this->notificacionId,
            'user_comisaria_id'=>auth()->id(),
        ]);

        session()->flash('success', 'Respuesta enviada correctamente.');
        return redirect()->route('ver-notificaciones');
    }
}
