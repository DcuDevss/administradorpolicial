<?php

namespace App\Http\Livewire;

use App\Models\RespuestaNotificacion;
use Livewire\Component;
use App\Models\User;
use App\Models\RespuestaTecnico;
use Spatie\Permission\Models\Role;

class VerRespuestas extends Component
{
    public $tecnico_id; // Cambiamos el nombre del atributo

    public function mount($tecnico_id) // Cambiamos el nombre del parámetro
    {
        $this->tecnico_id = $tecnico_id;
    }

    public function render()
    {
        // Obtener el usuario con el rol userComisariaId
       // $tecnico = Role::findOrFail($this->tecnico_id); // Cambiamos el nombre del atributo

        // Obtener las respuestas del técnico asociadas a ese usuario
        $respuestas = RespuestaNotificacion::where('user_comisaria_id')->get();

        return view('livewire.ver-respuestas', compact( 'respuestas'));
    }
}



