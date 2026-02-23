<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Notificacion;
use App\Models\Generalinformatica;
use App\Models\RespuestaNotificacion;
use App\Events\NuevaRespuesta;
use App\Events\OrderEvent;
use App\Notifications\OrderNotification;
use App\Notifications\OrderComunicacion;

class CrearNotificacion extends Component
{
    public $mensaje;
    public $tecnico_id;
    public $activa = false;
    // public $mensajeTecnico;


    public function enviarNotificacion()
    {
        // Validar permisos de usuarioComisaria para enviar notificaciones
        $this->validate([
            'mensaje' => 'required',
            'tecnico_id' => 'required|exists:users,id',
            'activa' => 'required',
        ]);

        // Guardar la notificación en la base de datos
        $notificacion = Notificacion::create([
            'mensaje' => $this->mensaje,
            'activa' => $this->activa,
            'user_comisaria_id' => auth()->id(), //
            'tecnico_id' => $this->tecnico_id,

        ]);

        // event(new OrderEvent($notificacion));

        $this->make_order_notification($notificacion);
        // $this->make_order_notification_comunicaciones($notificacion);
        session()->flash('success', 'Notificación enviada correctamente.');
        return redirect()->route('dashboard'); // Redirigir a la página principal después de enviar la notificación
    }

    /*public function make_order_notification($notificacion){
        // Verifica si el usuario actual tiene el rol 'tecnicoinformatico'
        if (auth()->user()->hasRole('tecnicoinformatico')) {
            // Envía la notificación a los usuarios con rol 'tecnicoinformatico'
            $tecnicosAEnviar = User::role('tecnicoinformatico')->get();
        } elseif (auth()->user()->hasRole('tecnicocomunicacion')) {
            // Envía la notificación a los usuarios con rol 'tecnicocomunicacion'
            $tecnicosAEnviar = User::role('tecnicocomunicacion')->get();
        } else {
            // Si el usuario no tiene ninguno de los roles, no envía notificaciones
            $tecnicosAEnviar = [];
        }

        foreach ($tecnicosAEnviar as $tecnico) {
            $tecnico->notify(new OrderNotification($notificacion));
        }
    }*/



    public function make_order_notification($notificacion)
    {
        // event(new OrderEvent($notificacion));

        User::role('tecnicoinformatico') //->except($notification->user_id)
            ->each(function (User $user) use ($notificacion) {
                $user->notify(new OrderNotification($notificacion));
            });
    }

    /* public function make_order_notification_comunicaciones($notificacion){
        // event(new OrderEvent($notificacion));

           User::role('tecnicocomunicacion')//->except($notification->user_id)
           ->each(function(User $user) use ($notificacion){
              $user->notify(new OrderComunicacion($notificacion));
           });
     }*/






    public function render()
    {
        // Obtener todos los técnicos disponibles
        // $tecnicos = User::role('tecnico')->get();
        // $tecnicos = User::role(['tecnicoinformatico', 'tecnicocomunicacion'])->get();

        //$notificaciones= Notificacion::all();

        $notificaciones = Notificacion::where('tecnico_id', auth()->id())->get();

        $tecnicos = User::whereIn('id', [2, 4])
            ->role(['tecnicoinformatico', 'tecnicocomunicacion'])
            ->get();

        $primeraPc = Generalinformatica::where('dependencia_ushuaia_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();

        $segundaPc = Generalinformatica::where('dependencia_ushuaia_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();

        $terceraPc = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $cuartaPc = Generalinformatica::where('dependencia_ushuaia_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $quintaPc = Generalinformatica::where('dependencia_ushuaia_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $flia1Pc = Generalinformatica::where('dependencia_ushuaia_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $flia2Pc = Generalinformatica::where('dependencia_ushuaia_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $serviciosPc = Generalinformatica::where('dependencia_ushuaia_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $custodiaPc = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();



        $impresoraLaser = Generalinformatica::where('dependencia_ushuaia_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorro = Generalinformatica::where('dependencia_ushuaia_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switch = Generalinformatica::where('dependencia_ushuaia_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruter = Generalinformatica::where('dependencia_ushuaia_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camaras = Generalinformatica::where('dependencia_ushuaia_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidor = Generalinformatica::where('dependencia_ushuaia_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonica = Generalinformatica::where('dependencia_ushuaia_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();








        $impresoraLaser2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorro2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switch2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruter2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camaras2da = Generalinformatica::where('dependencia_ushuaia_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidor2da = Generalinformatica::where('dependencia_ushuaia_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonica2da = Generalinformatica::where('dependencia_ushuaia_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();


        $PcDTO365 = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 11)
            ->where('destacamento_id', 2)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ImpresorasDTO365 = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 11)
            ->where('destacamento_id', 2)
            ->where('tipodispositivo_id', 12)
            //->where('tipodispositivo_id', 12)
            ->count();
        $PcDTO350 = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 11)
            ->where('destacamento_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ImpresorasDTO350 = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 11)
            ->where('destacamento_id', 3)
            ->where('tipodispositivo_id', 12)
            ->count();
        $PcDTO352 = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 11)
            ->where('destacamento_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ImpresorasDTO352 = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 11)
            ->where('destacamento_id', 4)
            ->where('tipodispositivo_id', 12)
            ->count();
        $impresoraLaser3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorro3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switch3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruter3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camaras3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidor3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonica3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();





        $impresoraLaser4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorro4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switch4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruter4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camaras4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidor4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonica4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();

        $impresoraLaser5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorro5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switch5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruter5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camaras5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidor5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonica5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();


        $impresoraLaserFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorroFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switchFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camarasFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $camarasFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidorFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonicaFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();



        $impresoraLaserFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorroFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switchFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camarasFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidorFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonicaFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();



        $impresoraLaserServicios = Generalinformatica::where('dependencia_ushuaia_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorroServicios = Generalinformatica::where('dependencia_ushuaia_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switchServicios = Generalinformatica::where('dependencia_ushuaia_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterServicios = Generalinformatica::where('dependencia_ushuaia_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camarasServicios = Generalinformatica::where('dependencia_ushuaia_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidorServicios = Generalinformatica::where('dependencia_ushuaia_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonicaServicios = Generalinformatica::where('dependencia_ushuaia_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();

        $impresoraLaserCustodia = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorroCustodia = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switchCustodia = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterCustodia = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camarasCustodia = Generalinformatica::where('dependencia_ushuaia_id', 12)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidorCustodia = Generalinformatica::where('dependencia_ushuaia_id', 12)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonicaCustodia = Generalinformatica::where('dependencia_ushuaia_id', 12)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();




        return view('livewire.crear-notificacion', compact(
            'tecnicos',
            'primeraPc',
            'notificaciones',
            'segundaPc',
            'terceraPc',
            'cuartaPc',
            'quintaPc',
            'flia1Pc',
            'flia2Pc',
            'serviciosPc',
            'custodiaPc',
            'impresoraLaser',
            'impresoraChorro',
            'switch',
            'ruter',
            'camaras',
            'servidor',
            'centralTelefonica',


            'impresoraChorro2da',
            'impresoraLaser2da',
            'switch2da',
            'ruter2da',
            'camaras2da',
            'servidor2da',
            'centralTelefonica2da',


            'PcDTO365',
            'ImpresorasDTO365',
            'PcDTO350',
            'ImpresorasDTO350',
            'PcDTO352',
            'ImpresorasDTO352',
            'impresoraChorro3da',
            'impresoraLaser3da',
            'switch3da',
            'camaras3da',
            'ruter3da',
            'camaras3da',
            'servidor3da',
            'centralTelefonica3da',



            'impresoraChorro4da',
            'impresoraLaser4da',
            'switch4da',
            'ruter4da',
            'camaras4da',
            'servidor4da',
            'centralTelefonica4da',


            'impresoraChorro5da',
            'impresoraLaser5da',
            'switch5da',
            'ruter5da',
            'camaras5da',
            'servidor5da',
            'centralTelefonica5da',


            'impresoraChorroFlia1',
            'impresoraLaserFlia1',
            'switchFlia1',
            'ruterFlia1',
            'camarasFlia1',
            'servidorFlia1',
            'centralTelefonicaFlia1',


            'impresoraChorroFlia2',
            'impresoraLaserFlia2',
            'switchFlia2',
            'ruterFlia2',
            'camarasFlia2',
            'servidorFlia2',
            'centralTelefonicaFlia2',


            'impresoraChorroServicios',
            'impresoraLaserServicios',
            'switchServicios',
            'ruterServicios',
            'camarasServicios',
            'servidorServicios',
            'centralTelefonicaServicios',


            'impresoraChorroCustodia',
            'impresoraLaserCustodia',
            'switchCustodia',
            'ruterCustodia',
            'camarasCustodia',
            'servidorCustodia',
            'centralTelefonicaCustodia',







        ));
    }






    /* public function enviarNotificacion()
{
    $this->validate([
        'mensaje' => 'required',
    ]);

    // Guardar la notificación en la base de datos
    $notificacion = Notificacion::create([
        'mensaje' => $this->mensaje,
        'activa' => $this->activa,
        'user_comisaria_id' => auth()->id(),
        'tecnico_id' => 0, // Valor por defecto para notificaciones a usuarios con rol "tecnicocomunicacion"
    ]);

    // Obtener IDs de usuarios con el rol "tecnicocomunicacion"
    $usuariosTecnicoComunicacion = User::role('tecnicocomunicacion')->pluck('id');

    // Asociar la notificación a los usuarios con el rol "tecnicocomunicacion"
    $notificacion->users()->attach($usuariosTecnicoComunicacion);

    session()->flash('success', 'Notificación enviada correctamente.');
    return redirect()->route('dashboard');
}*/
}
