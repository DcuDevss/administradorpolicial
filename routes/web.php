<?php

use App\Events\UserRegistration;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Comisaria1\IndexComisariaPrimera;
use App\Http\Livewire\Comisaria1\CreateComisariaPrimera;
use App\Http\Livewire\Comisaria1\EditComisariaPrimera;
use App\Http\Controllers\NotificationController;

//

use App\Http\Livewire\Comunicaciones\Primera\CreateComunicacionesPrimera;
use App\Http\Livewire\Comunicaciones\Primera\IndexComunicacionesPrimera;
use App\Http\Livewire\Comunicaciones\Primera\EditComunicacionesPrimera;
use App\Http\Livewire\Comunicaciones\Primera\HistorialComunicacionesPrimera;

use App\Http\Livewire\Comunicaciones\Segunda\CreateComunicacionesSegunda;
use App\Http\Livewire\Comunicaciones\Segunda\EditComunicacionesSegunda;
use App\Http\Livewire\Comunicaciones\Segunda\IndexComunicacionesSegunda;
use App\Http\Livewire\Comunicaciones\Segunda\HistorialComunicacionesSegunda;

use App\Http\Livewire\Comunicaciones\Tercera\CreateComunicacionesTercera;
use App\Http\Livewire\Comunicaciones\Tercera\EditComunicacionesTercera;
use App\Http\Livewire\Comunicaciones\Tercera\IndexComunicacionesTercera;
use App\Http\Livewire\Comunicaciones\Tercera\HistorialComunicacionesTercera;

use App\Http\Livewire\Comunicaciones\Cuarta\CreateComunicacionesCuarta;
use App\Http\Livewire\Comunicaciones\Cuarta\EditComunicacionesCuarta;
use App\Http\Livewire\Comunicaciones\Cuarta\IndexComunicacionesCuarta;
use App\Http\Livewire\Comunicaciones\Cuarta\HistorialComunicacionesCuarta;

use App\Http\Livewire\Comunicaciones\Quinta\CreateComunicacionesQuinta;
use App\Http\Livewire\Comunicaciones\Quinta\EditComunicacionesQuinta;
use App\Http\Livewire\Comunicaciones\Quinta\IndexComunicacionesQuinta;
use App\Http\Livewire\Comunicaciones\Quinta\HistorialComunicacionesQuinta;

use App\Http\Livewire\Comunicaciones\Cientifica\CreateComunicacionesCientifica;
use App\Http\Livewire\Comunicaciones\Cientifica\EditComunicacionesCientifica;
use App\Http\Livewire\Comunicaciones\Cientifica\IndexComunicacionesCientifica;
use App\Http\Livewire\Comunicaciones\Cientifica\HistorialComunicacionesCientifica;

use App\Http\Livewire\Comunicaciones\Dseu\CreateComunicacionesDseu;
use App\Http\Livewire\Comunicaciones\Dseu\EditComunicacionesDseu;
use App\Http\Livewire\Comunicaciones\Dseu\IndexComunicacionesDseu;
use App\Http\Livewire\Comunicaciones\Dseu\HistorialComunicacionesDseu;

use App\Http\Livewire\Comunicaciones\Familia1\CreateComunicacionesFamilia1;
use App\Http\Livewire\Comunicaciones\Familia1\IndexComunicacionesFamilia1;
use App\Http\Livewire\Comunicaciones\Familia1\EditComunicacionesMinoridaduno;
use App\Http\Livewire\Comunicaciones\Familia1\HistorialComunicacionesFamilia1;

use App\Http\Livewire\Comunicaciones\Familia2\CreateComunicacionesFamilia2;
use App\Http\Livewire\Comunicaciones\Familia2\IndexComunicacionesFamilia2;
use App\Http\Livewire\Comunicaciones\Familia2\EditComunicacionesMinoridaddos;
use App\Http\Livewire\Comunicaciones\Familia2\HistorialComunicacionesFamilia2;


use App\Http\Livewire\Comunicaciones\Investigacion\CreateComunicacionesInvestigacion;
use App\Http\Livewire\Comunicaciones\Investigacion\EditComunicacionesInvestigacion;
use App\Http\Livewire\Comunicaciones\Investigacion\IndexComunicacionesInvestigacion;
use App\Http\Livewire\Comunicaciones\Investigacion\HistorialComunicacionesInvestigaciones;

use App\Http\Livewire\Comunicaciones\Recurso\CreateComunicacionesRecurso;
use App\Http\Livewire\Comunicaciones\Recurso\EditComunicacionesRecurso;
use App\Http\Livewire\Comunicaciones\Recurso\IndexComunicacionesRecurso;
use App\Http\Livewire\Comunicaciones\Recurso\HistorialComunicacionesRecurso;


use App\Http\Livewire\Comunicaciones\Administracion\CreateComunicacionesAdministracion;
use App\Http\Livewire\Comunicaciones\Administracion\EditComunicacionesAdministracion;
use App\Http\Livewire\Comunicaciones\Administracion\IndexComunicacionesAdministracion;
use App\Http\Livewire\Comunicaciones\Administracion\HistorialComunicacionesAdministracion;


use App\Http\Livewire\Comunicaciones\Jefatura\CreateComunicacionesJefatura;
use App\Http\Livewire\Comunicaciones\Jefatura\EditComunicacionesJefatura;
use App\Http\Livewire\Comunicaciones\Jefatura\IndexComunicacionesJefatura;
use App\Http\Livewire\Comunicaciones\Jefatura\HistorialComunicacionesJefatura;


use App\Http\Livewire\Comunicaciones\Narco\CreateComunicacionesNarco;
use App\Http\Livewire\Comunicaciones\Narco\EditComunicacionesNarco;
use App\Http\Livewire\Comunicaciones\Narco\IndexComunicacionesNarco;
use App\Http\Livewire\Comunicaciones\Narco\HistorialComunicacionesNarco;


use App\Http\Livewire\Comunicaciones\Complejo\CreateComunicacionesComplejo;
use App\Http\Livewire\Comunicaciones\Complejo\EditComunicacionesComplejo;
use App\Http\Livewire\Comunicaciones\Complejo\IndexComunicacionesComplejo;
use App\Http\Livewire\Comunicaciones\Complejo\HistorialComunicacionesComplejo;

use App\Http\Livewire\Comunicaciones\Automotore\CreateComunicacionesAutomotore;
use App\Http\Livewire\Comunicaciones\Automotore\EditComunicacionesAutomotore;
use App\Http\Livewire\Comunicaciones\Automotore\IndexComunicacionesAutomotore;
use App\Http\Livewire\Comunicaciones\Automotore\HistorialComunicacionesAutomotore;


use App\Http\Livewire\Comunicaciones\Dto365\CreateComunicacionesDto365;
use App\Http\Livewire\Comunicaciones\Dto365\EditComunicacionesDto365;
use App\Http\Livewire\Comunicaciones\Dto365\IndexComunicacionesDto365;
use App\Http\Livewire\Comunicaciones\Dto365\HistorialComunicacionesDto365;



use App\Http\Livewire\Comunicaciones\Custodia\CreateComunicacionesCustodia;
use App\Http\Livewire\Comunicaciones\Custodia\EditComunicacionesCustodia;
use App\Http\Livewire\Comunicaciones\Custodia\IndexComunicacionesCustodia;
use App\Http\Livewire\Comunicaciones\Custodia\HistorialComunicacionesCustodia;

use App\Http\Livewire\Comunicaciones\Ushuaia\CreateComunicacionesUshuaia;
use App\Http\Livewire\Comunicaciones\Ushuaia\EditComunicacionesUshuaia;
use App\Http\Livewire\Comunicaciones\Ushuaia\IndexComunicacionesUshuaia;
use App\Http\Livewire\Comunicaciones\Ushuaia\HistorialComunicacionesUshuaia;

use App\Http\Livewire\Comunicaciones\Tolhuin\CreateComunicacionesTolhuin;
use App\Http\Livewire\Comunicaciones\Tolhuin\EditComunicacionesTolhuin;
use App\Http\Livewire\Comunicaciones\Tolhuin\IndexComunicacionesTolhuin;


use App\Http\Livewire\Dcrgcomu\Riograndecomu\CreateComunicacionesRiogrande;
use App\Http\Livewire\Dcrgcomu\Riograndecomu\EditComunicacionesRiogrande;
use App\Http\Livewire\Dcrgcomu\Riograndecomu\IndexComunicacionesRiogrande;

use App\Http\Livewire\Comunicaciones\Dcu\CreateComunicacionesDcu;
use App\Http\Livewire\Comunicaciones\Dcu\EditComunicacionesDcu;
use App\Http\Livewire\Comunicaciones\Dcu\IndexComunicacionesDcu;
use App\Http\Livewire\Comunicaciones\Dcu\HistorialComunicacionesDcu;


//use App\Http\Livewire\Comisaria1\CreateComisariaPrimera;
//use App\Http\Livewire\Comisaria1\EditComisariaPrimera;
use Livewire\Livewire;

use App\Models\persona;
use App\Http\Livewire\Turnos\TurnosCalendar;
use App\Http\Livewire\AdminPanel;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubmitController;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Controllers\RegisterController;

use App\Http\Livewire\GenerateOrder;
use App\Http\Livewire\CrearNotificacion;
use App\Http\Livewire\VerNotificaciones;
use App\Http\Livewire\EnviarRespuesta;
use App\Http\Livewire\VerRespuestas;
//use App\Http\Livewire\NotificacionChat;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Chat\Chat;
use App\Http\Livewire\Chat\ChatList;
use App\Http\Livewire\Chat\Index;
use App\Http\Livewire\Informatica\General\CreateInventarioGeneral;
use App\Http\Livewire\Informatica\General\EditInventarioGeneral;
use App\Http\Livewire\Informatica\General\IndexInventarioGeneral;
use App\Http\Livewire\Informatica\General\HistorialInventarioGeneral;

use App\Http\Livewire\Informatica\Investigaciones\CreateInvestigacionesGeneral;
use App\Http\Livewire\Informatica\Investigaciones\EditInvestigacionesGeneral;
use App\Http\Livewire\Informatica\Investigaciones\IndexInvestigacionesGeneral;



use App\Http\Livewire\Informatica\Administracion\CreateAdministracionGeneral;
use App\Http\Livewire\Informatica\Administracion\EditAdministracionGeneral;
use App\Http\Livewire\Informatica\Administracion\IndexAdministracionGeneral;

use App\Http\Livewire\Informatica\Jefatura\CreateJefaturaGeneral;
use App\Http\Livewire\Informatica\Jefatura\EditJefaturaGeneral;
use App\Http\Livewire\Informatica\Jefatura\IndexJefaturaGeneral;

use App\Http\Livewire\Informatica\Recursos\CreateRecursosGeneral;
use App\Http\Livewire\Informatica\Recursos\EditRecursosGeneral;
use App\Http\Livewire\Informatica\Recursos\IndexRecursosGeneral;

use App\Http\Livewire\Informatica\Especiales\CreateServiciosespecialesGeneral;
use App\Http\Livewire\Informatica\Especiales\EditServiciosespecialesGeneral;
use App\Http\Livewire\Informatica\Especiales\IndexServiciosespecialesGeneral;


use App\Http\Livewire\Informatica\Tolhuin\CreateTolhuinGeneral;
use App\Http\Livewire\Informatica\Tolhuin\EditTolhuinGeneral;
use App\Http\Livewire\Informatica\Tolhuin\IndexTolhuinGeneral;
use App\Http\Livewire\Informatica\Tolhuin\HistorialTolhuinGeneral;


use App\Http\Livewire\Dcrginfo\Riograndeinfo\CreateRiograndeGeneral;
use App\Http\Livewire\Dcrginfo\Riograndeinfo\EditRiograndeGeneral;
use App\Http\Livewire\Dcrginfo\Riograndeinfo\IndexRiograndeGeneral;
use App\Http\Livewire\Dcrginfo\Riograndeinfo\HistorialRiograndeGeneral;

use App\Http\Livewire\TurnoReservation;


use App\Http\Livewire\Comunicaciones\General\CreateTrabajoGeneral;
use App\Http\Livewire\Comunicaciones\General\EditTrabajoGeneral;
use App\Http\Livewire\Comunicaciones\General\IndexTrabajoGeneral;
use App\Http\Livewire\Comunicaciones\General\HistorialTrabajoGeneral;
use App\Http\Livewire\Dcrgcomu\Riograndecomu\HistorialComunicacionesRg;
use App\Http\Livewire\Informatica\Inventario\IndexTotalinventario;
use App\Http\Livewire\Informatica\Trabajos\CreateTrabajosInformatica;
use App\Http\Livewire\Informatica\Trabajos\EditTrabajosInformatica;
use App\Http\Livewire\Informatica\Trabajos\IndexTrabajosInformatica;
use App\Http\Livewire\Informatica\Trabajos\HistorialTrabajoInformatica;
use App\Http\Livewire\Comunicaciones\Tolhuin\HistorialComunicacionesTolhuin;

use App\Http\Livewire\NotificacionChat;
use App\Http\Livewire\TrabajosGeneralesChart;
use App\Http\Livewire\Username;
use App\Http\Livewire\Userpolicia;
use App\Http\Livewire\Users;
use App\Http\Livewire\Usuarios;
use App\Models\AuditoriaDetalleInventario;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [\Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class, 'create'])->middleware('guest');

/*Route::middleware(['auth', 'role:administrador'])->group(function () {
    Route::get('/admin-panel', AdminPanel::class)->name('admin-panel');
});*/

//Route::get('/create-chat',CreateChat::class)->name('users.chat');
//Route::get('/chat{key?}',Main::class)->name('chat');

/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); */


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user(); // Obténgo al usuario autenticado

        // Lógica para redirigir según el rol
        if ($user->hasRole('Admin')) {
            return redirect()->intended(route('panel-administrador'));
        } elseif ($user->hasRole('tecnicoinformatico')) {
            return redirect()->intended(route('tecnico-informatico'));
        } elseif ($user->hasRole('tecnicocomunicacion')) {
            return redirect()->intended(route('tecnico-comunicacion'));
        } elseif ($user->hasRole('Adminrg')) {
            return redirect()->intended(route('tecnico-riogrande'));
        } else {
            // Si el usuario no tiene un rol específico, se redirige a un dashboard genéral
            return view('dashboard');
        }
    })->name('dashboard');
});


Route::view('/tailwind', 'tailwind');
//Route::view('bootstrap', 'bootstrap')->name('bootstrap');

//Route::post('submit', SubmitController::class)->name('submit');
Route::post('/reserve', [SubmitController::class, 'reserve'])->name('reserve');


Route::middleware('auth')->group(function () {

    Route::get('/chat', Index::class)->name('chatlist');
    Route::get('/chat/{query}', Chat::class)->name('chat');

    Route::get('/userpolicia', Userpolicia::class)->name('userpolicia');
});

Route::get('/notificacion-chat', NotificacionChat::class)->name('notifi');

//->middleware('can:panel-tecnicos')->middleware('can:panel-administrador')
//Route::view('/tecnicos','tecnicos')->name('tecnicos');
Route::view('/tecnico-informatico', 'tecnico-informatico')->name('tecnico-informatico');
Route::view('/tecnico-comunicacion', 'tecnico-comunicacion')->name('tecnico-comunicacion');
Route::view('/tecnico-riogrande', 'tecnico-riogrande')->name('tecnico-riogrande');
Route::view('/administrador', 'administrador')->name('panel-administrador');
//Route::get('/generate-order', GenerateOrder::class)->name('generate.order');


Route::get('/crear-notificacion', CrearNotificacion::class)->name('crear-notificacion');
Route::get('/ver-notificaciones', VerNotificaciones::class)->name('ver-notificaciones');



/*Route::get('/enviar-respuesta/{notificacionId}', EnviarRespuesta::class)
    ->name('enviar-respuesta')
    ->middleware('auth');*/ // Agrega middleware para asegurar que el usuario esté autenticado


// rutas chat

//Route::get('/ver-respuestas/{userComisariaId}', VerRespuestas::class)->name('ver-respuestas');


Route::prefix('panel-dependencias')->group(function () {
    Route::view('comisaria1', 'panel-dependencias.comisaria1')->name('comisaria1');
    Route::view('comunicaciones1', 'panel-dependencias.comunicaciones1')->name('comunicaciones1');
    Route::view('comunicacionesgeneral', 'panel-dependencias.comunicacionesgeneral')->name('comunicacionesgeneral');
    Route::view('informaticainventario', 'panel-dependencias.informaticainventario')->name('informaticainventario');
    Route::view('investigaciones-general', 'panel-dependencias.investigaciones-general')->name('investigaciones-general');
    Route::view('administracion-general', 'panel-dependencias.administracion-general')->name('administracion-general');
    Route::view('jefatura-general', 'panel-dependencias.jefatura-general')->name('jefatura-general');
    Route::view('serviciosespeciales-general', 'panel-dependencias.serviciosespeciales-general')->name('serviciosespeciales-general');
    Route::view('recursoshumanos-general', 'panel-dependencias.recursoshumanos-general')->name('recursoshumanos-general');
});

/*Route::get('/trabajos-generales-chart', function () {
    return view('trabajos-generales-chart');
});*/



//---------rutas informatica-----------------------
//Route::view('/panel-dependencias', 'panel-dependencias.comisaria1')->name('panel.comisaria1');
Route::get('comisaria1/add', CreateComisariaPrimera::class)->name('createComisaria1');
Route::get('comisaria1', IndexComisariaPrimera::class)->name('indexComisaria1');
Route::get('comisaria1/edit/{comisaria}', EditComisariaPrimera::class)->name('EditComisaria1');

//-----------rutas comunicaciones------------------

Route::get('comunicaciones/jefatura/add', CreateComunicacionesJefatura::class)->name('createComunicacionesJefatura');
Route::get('comunicaciones/jefatura/', IndexComunicacionesJefatura::class)->name('indexComunicacionesJefatura');
Route::get('comunicaciones/jefatura/edit/{comunicaciones}', EditComunicacionesJefatura::class)->name('editComunicacionesJefatura');

Route::get('comunicaciones/familia1/add', CreateComunicacionesFamilia1::class)->name('createComunicacionesFamilia1');
Route::get('comunicaciones/familia1/', IndexComunicacionesFamilia1::class)->name('indexComunicacionesFamilia1');
Route::get('comunicaciones/familia1/edit/{comunicaciones}', EditComunicacionesMinoridaduno::class)->name('editComunicacionesMinoridad');

Route::get('comunicaciones/familia2/add', CreateComunicacionesFamilia2::class)->name('createComunicacionesFamilia2');
Route::get('comunicaciones/familia2/', IndexComunicacionesFamilia2::class)->name('indexComunicacionesFamilia2');
Route::get('comunicaciones/familia2/edit/{comunicaciones}', EditComunicacionesMinoridaddos::class)->name('editComunicacionesMinoridados');


Route::get('comunicaciones/investigacion/add', CreateComunicacionesInvestigacion::class)->name('createComunicacionesInvestigacion');
Route::get('comunicaciones/investigacion/', IndexComunicacionesInvestigacion::class)->name('indexComunicacionesInvestigacion');
Route::get('comunicaciones/investigacion/edit/{comunicaciones}', EditComunicacionesInvestigacion::class)->name('editComunicacionesInvestigacion');

Route::get('comunicaciones/primera/add', CreateComunicacionesPrimera::class)->name('createComunicaciones1');
Route::get('comunicaciones/primera/', IndexComunicacionesPrimera::class)->name('indexComunicaciones1');
Route::get('comunicaciones/primera/edit/{comunicaciones}', EditComunicacionesPrimera::class)->name('editComunicaciones1');

Route::get('comunicaciones/segunda/add', CreateComunicacionesSegunda::class)->name('createComunicaciones2');
Route::get('comunicaciones/segunda/', IndexComunicacionesSegunda::class)->name('indexComunicaciones2');
Route::get('comunicaciones/segunda/edit/{comunicaciones}', EditComunicacionesSegunda::class)->name('editComunicaciones2');


Route::get('comunicaciones/tercera/add', CreateComunicacionesTercera::class)->name('createComunicaciones3');
Route::get('comunicaciones/tercera/', IndexComunicacionesTercera::class)->name('indexComunicaciones3');
Route::get('comunicaciones/tercera/edit/{comunicaciones}', EditComunicacionesTercera::class)->name('editComunicaciones3');

Route::get('comunicaciones/cuarta/add', CreateComunicacionesCuarta::class)->name('createComunicaciones4');
Route::get('comunicaciones/cuarta/', IndexComunicacionesCuarta::class)->name('indexComunicaciones4');
Route::get('comunicaciones/cuarta/edit/{comunicaciones}', EditComunicacionesCuarta::class)->name('editComunicaciones4');

Route::get('comunicaciones/quinta/add', CreateComunicacionesQuinta::class)->name('createComunicaciones5');
Route::get('comunicaciones/quinta/', IndexComunicacionesQuinta::class)->name('indexComunicaciones5');
Route::get('comunicaciones/quinta/edit/{comunicaciones}', EditComunicacionesQuinta::class)->name('editComunicaciones5');

Route::get('comunicaciones/dseu/add', CreateComunicacionesDseu::class)->name('createComunicacionesDseu');
Route::get('comunicaciones/dseu/', IndexComunicacionesDseu::class)->name('indexComunicacionesDseu');
Route::get('comunicaciones/dseu/edit/{comunicaciones}', EditComunicacionesDseu::class)->name('editComunicacionesDseu');

Route::get('comunicaciones/cientifica/add', CreateComunicacionesCientifica::class)->name('createComunicacionesCientifica');
Route::get('comunicaciones/cientifica/', IndexComunicacionesCientifica::class)->name('indexComunicacionesCientifica');
Route::get('comunicaciones/cientifica/edit/{comunicaciones}', EditComunicacionesCientifica::class)->name('editComunicacionesCientifica');

Route::get('comunicaciones/recurso/add', CreateComunicacionesRecurso::class)->name('createComunicacionesRecurso');
Route::get('comunicaciones/recurso/', IndexComunicacionesRecurso::class)->name('indexComunicacionesRecurso');
Route::get('comunicaciones/recurso/edit/{comunicaciones}', EditComunicacionesRecurso::class)->name('editComunicacionesRecurso');

Route::get('comunicaciones/administracion/add', CreateComunicacionesAdministracion::class)->name('createComunicacionesAdministracion');
Route::get('comunicaciones/administracion/', IndexComunicacionesAdministracion::class)->name('indexComunicacionesAdministracion');
Route::get('comunicaciones/administracion/edit/{comunicaciones}', EditComunicacionesAdministracion::class)->name('editComunicacionesAdministracion');

Route::get('comunicaciones/narco/add', CreateComunicacionesNarco::class)->name('createComunicacionesNarco');
Route::get('comunicaciones/narco/', IndexComunicacionesNarco::class)->name('indexComunicacionesNarco');
Route::get('comunicaciones/narco/edit/{comunicaciones}', EditComunicacionesNarco::class)->name('editComunicacionesNarco');

Route::get('comunicaciones/complejo/add', CreateComunicacionesComplejo::class)->name('createComunicacionesComplejo');
Route::get('comunicaciones/complejo/', IndexComunicacionesComplejo::class)->name('indexComunicacionesComplejo');
Route::get('comunicaciones/complejo/edit/{comunicaciones}', EditComunicacionesComplejo::class)->name('editComunicacionesComplejo');

Route::get('comunicaciones/automotore/add', CreateComunicacionesAutomotore::class)->name('createComunicacionesAutomotore');
Route::get('comunicaciones/automotore/', IndexComunicacionesAutomotore::class)->name('indexComunicacionesAutomotore');
Route::get('comunicaciones/automotore/edit/{comunicaciones}', EditComunicacionesAutomotore::class)->name('editComunicacionesAutomotore');


Route::get('comunicaciones/dto365/add', CreateComunicacionesDto365::class)->name('createComunicacionesDto365');
Route::get('comunicaciones/dto365/', IndexComunicacionesDto365::class)->name('indexComunicacionesDto365');
Route::get('comunicaciones/dto365/edit/{comunicaciones}', EditComunicacionesDto365::class)->name('editComunicacionesDto365');


Route::get('comunicaciones/custodia/add', CreateComunicacionesCustodia::class)->name('createComunicacionesCustodia');
Route::get('comunicaciones/custodia/', IndexComunicacionesCustodia::class)->name('indexComunicacionesCustodia');
Route::get('comunicaciones/custodia/edit/{comunicaciones}', EditComunicacionesCustodia::class)->name('editComunicacionesCustodia');


Route::get('comunicaciones/tolhuin/add', CreateComunicacionesTolhuin::class)->name('createComunicacionesTolhuin');
Route::get('comunicaciones/tolhuin/', IndexComunicacionesTolhuin::class)->name('indexComunicacionesTolhuin');
Route::get('comunicaciones/tolhuin/edit/{comunicaciones}', EditComunicacionesTolhuin::class)->name('editComunicacionesTolhuin');

Route::get('comunicaciones/ushuaia/add', CreateComunicacionesUshuaia::class)->name('createComunicacionesUshuaia');
Route::get('comunicaciones/ushuaia/', IndexComunicacionesUshuaia::class)->name('indexComunicacionesUshuaia');
Route::get('comunicaciones/ushuaia/edit/{comunicaciones}', EditComunicacionesUshuaia::class)->name('editComunicacionesUshuaia');

Route::get('dcrgcomu/riogrande/add', CreateComunicacionesRioGrande::class)->name('createComunicacionesRiogrande');
Route::get('dcrgcomu/riogrande/', IndexComunicacionesRioGrande::class)->name('indexComunicacionesRiogrande');
Route::get('dcrgcomu/riogrande/edit/{comunicaciones}', EditComunicacionesRioGrande::class)->name('editComunicacionesRiogrande');

Route::get('comunicaciones/dcu/add', CreateComunicacionesDcu::class)->name('createComunicacionesDcu');
Route::get('comunicaciones/dcu/', IndexComunicacionesDcu::class)->name('indexComunicacionesDcu');
Route::get('comunicaciones/dcu/edit/{comunicaciones}', EditComunicacionesDcu::class)->name('editComunicacionesDcu');
Route::delete('/comunicacionesdcu/{id}', EditComunicacionesdcu::class, 'destroy');


//---comunicacionesgeneral-----------------
Route::get('comunicaciones/general/add', CreateTrabajoGeneral::class)->name('createTrabajoGeneral');
Route::get('comunicaciones/general/', IndexTrabajoGeneral::class)->name('indexTrabajoGeneral');
Route::get('comunicaciones/general/edit/{trabajo}', EditTrabajoGeneral::class)->name('editTrabajoGeneral');

//---InformaticaGeneral-----------------
Route::get('informatica/general/add', CreateInventarioGeneral::class)->name('createInventarioGeneral');
Route::get('informatica/general/', IndexInventarioGeneral::class)->name('indexInventarioGeneral');
Route::get('informatica/general/edit/{general}', EditInventarioGeneral::class)->name('editInventarioGeneral');

//---InvestigacionGeneral-----------------
Route::get('informatica/investigaciones/add', CreateInvestigacionesGeneral::class)->name('createInvestigacionesGeneral');
Route::get('informatica/investigaciones/', IndexInvestigacionesGeneral::class)->name('indexInvestigacionesGeneral');
Route::get('informatica/investigaciones/edit/{investigaciones}', EditInvestigacionesGeneral::class)->name('editInvestigacionesGeneral');

//---AdministracionGeneral-----------------
Route::get('informatica/administracion/add', CreateAdministracionGeneral::class)->name('createAdministracionGeneral');
Route::get('informatica/administracion/', IndexAdministracionGeneral::class)->name('indexAdministracionGeneral');
Route::get('informatica/administracion/edit/{administracion}', EditAdministracionGeneral::class)->name('editAdministracionGeneral');

//---RecusrosHumanosGeneral-----------------
Route::get('informatica/recursos/add', CreateRecursosGeneral::class)->name('createRecursosGeneral');
Route::get('informatica/recursos/', IndexRecursosGeneral::class)->name('indexRecursosGeneral');
Route::get('informatica/recursos/edit/{recursos}', EditRecursosGeneral::class)->name('editRecursosGeneral');

//---JefaturaGeneral-----------------
Route::get('informatica/jefatura/add', CreateJefaturaGeneral::class)->name('createJefaturaGeneral');
Route::get('informatica/jefatura/', IndexJefaturaGeneral::class)->name('indexJefaturaGeneral');
Route::get('informatica/jefatura/edit/{jefatura}', EditJefaturaGeneral::class)->name('editJefaturaGeneral');

//---ServciosEspecialesGeneral-----------------
Route::get('informatica/especiales/add', CreateServiciosespecialesGeneral::class)->name('createEspecialesGeneral');
Route::get('informatica/especiales/', IndexServiciosespecialesGeneral::class)->name('indexEspecialesGeneral');
Route::get('informatica/especiales/edit/{especiales}', EditServiciosespecialesGeneral::class)->name('editEspecialesGeneral');


//---TolhuinGeneral-----------------
Route::get('informatica/tolhuin/add', CreateTolhuinGeneral::class)->name('createTolhuinGeneral');
Route::get('informatica/toluin/', IndexTolhuinGeneral::class)->name('indexTolhuinGeneral');
Route::get('informatica/tolhuin/edit/{tolhuin}', EditTolhuinGeneral::class)->name('editTolhuinGeneral');


//---RiograndeGeneral-----------------
Route::get('dcrginfo/riogrande/add', CreateRiograndeGeneral::class)->name('createRiograndeGeneral');
Route::get('dcrginfo/riogrande/', IndexRiograndeGeneral::class)->name('indexRiograndeGeneral');
Route::get('dcrginfo/riogrande/edit/{riogrande}', EditRiograndeGeneral::class)->name('editRiograndeGeneral');

//----inventario total informatica-----
Route::get('informatica/inventario/', IndexTotalinventario::class)->name('TotalInventarioInformatica');

//-----Tabajos informaticos---------
Route::get('informatica/trabajos/add', CreateTrabajosInformatica::class)->name('createTrabajosInformatica');
Route::get('informatica/trabajos/', IndexTrabajosInformatica::class)->name('indexTrabajosInformatica');
Route::get('informatica/trabajos/edit/{informatico}', EditTrabajosInformatica::class)->name('editTrabajosInformatica');

//---TurnosReservation--------
Route::get('mark_all_notifications', [NotificationController::class, 'mark_all_notifications'])->name('mark_all_notifications');
Route::get('mark_a_notifications/{notification_id}/{notificacion_id}', [NotificationController::class, 'mark_a_notifications'])->name('mark_a_notifications');

//Route::get('mark_all_notifications', 'NotificationController@mark_all_notifications')->name('mark_all_notifications');
//Route::get('mark_a_notifications/{notification_id}/{notificacion_id}', 'NotificationController@mark_a_notifications')->name('mark_a_notifications');

//---------------ruta turnos----------------
Route::get('/turnos', TurnosCalendar::class)->name('turnos-calendar');
Route::get('/turabajos-generales-chart', TrabajosGeneralesChart::class)->name('estadistica');

//Route::get('/turno-reservation', TurnoReservation::class)->name('turno-reservar');
Route::resource('users', UserController::class)->only('index', 'edit', 'update');
Route::resource('roles', RoleController::class)->names('admin-roles');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/register', [RegisterController::class, 'create'])->name('register.create');



//Route::get('/reservar-turno', TurnoReservation::class);

Route::get('/registrar-usuario', [RegisterController::class, 'create'])->middleware([])->name('register.create');
Route::post('/registrar-usuario', [RegisterController::class, 'store'])->middleware([])->name('register.store');

//******HISTORIALES PARA INFORMATICA************///
//ruta para ver historial de trabajos taller
Route::get('/historial-trabajo-general/{trabajosGeneraleId}', HistorialTrabajoGeneral::class)
    ->name('historial-trabajo-general');


//ruta para ver historial de trabajos informatica
Route::get('/historial-trabajo-informatica/{trabajosInformaticaId}', HistorialTrabajoInformatica::class)
    ->name('historial-trabajo-informatica');


//******HISTORIALES PARA COMUNICACIONES************//
//ruta para ver historial de trabajos ushuaia
Route::get('/historial-trabajo-ushuaia/{trabajosUshuaiaId}', HistorialComunicacionesUshuaia::class)
    ->name('historial-trabajo-ushuaia');

//ruta para ver historial de trabajos dcu
Route::get('/historial-trabajo-dcu/{trabajosDcuId}', HistorialComunicacionesDcu::class)
    ->name('historial-trabajo-dcu');

//ruta para ver historial de trabajos administracion
Route::get('/historial-trabajo-administracion/{trabajosAdministracionId}', HistorialComunicacionesAdministracion::class)
    ->name('historial-trabajo-administracion');

//ruta para ver historial de trabajos automotore
Route::get('/historial-trabajo-automotore/{trabajosAutomotoreId}', HistorialComunicacionesAutomotore::class)
    ->name('historial-trabajo-automotore');

//ruta para ver historial de trabajos cientifica
Route::get('/historial-trabajo-cientifica/{trabajosCientificaId}', HistorialComunicacionesCientifica::class)
    ->name('historial-trabajo-cientifica');

//ruta para ver historial de trabajos complejo
Route::get('/historial-trabajo-complejo/{trabajosComplejoId}', HistorialComunicacionesComplejo::class)
    ->name('historial-trabajo-complejo');

//ruta para ver historial de trabajos cuarta
Route::get('/historial-trabajo-cuarta/{trabajosCuartaId}', HistorialComunicacionesCuarta::class)
    ->name('historial-trabajo-cuarta');

//ruta para ver historial de trabajos custodia
Route::get('/historial-trabajo-custodia/{trabajosCustodiaId}', HistorialComunicacionesCustodia::class)
    ->name('historial-trabajo-custodia');

//ruta para ver historial de trabajos dseu
Route::get('/historial-trabajo-dseu/{trabajosDseuId}', HistorialComunicacionesDseu::class)
    ->name('historial-trabajo-dseu');

//ruta para ver historial de trabajos dto365
Route::get('/historial-trabajo-dto365/{trabajosDto365Id}', HistorialComunicacionesDto365::class)
    ->name('historial-trabajo-dto365');

//ruta para ver historial de trabajos FAMILIA1
Route::get('/historial-trabajo-familia1/{trabajosFamilia1Id}', HistorialComunicacionesFamilia1::class)
    ->name('historial-trabajo-familia1');

//ruta para ver historial de trabajos FAMILIA2
Route::get('/historial-trabajo-familia2/{trabajosFamilia2Id}', HistorialComunicacionesFamilia2::class)
    ->name('historial-trabajo-familia2');


//ruta para ver historial de trabajos investigaciones
Route::get('/historial-trabajo-investigaciones/{trabajosInvestigacionId}', HistorialComunicacionesInvestigaciones::class)
    ->name('historial-trabajo-investigaciones');


//ruta para ver historial de trabajos jefatura
Route::get('/historial-trabajo-jefatura/{trabajosJefaturaId}', HistorialComunicacionesJefatura::class)
    ->name('historial-trabajo-jefatura');

//ruta para ver historial de trabajos narco
Route::get('/historial-trabajo-narco/{trabajosNarcoId}', HistorialComunicacionesNarco::class)
    ->name('historial-trabajo-narco');

//ruta para ver historial de trabajos primera
Route::get('/historial-trabajo-primera/{trabajosPrimeraId}', HistorialComunicacionesPrimera::class)
    ->name('historial-trabajo-primera');

//ruta para ver historial de trabajos quinta
Route::get('/historial-trabajo-quinta/{trabajosQuintaId}', HistorialComunicacionesQuinta::class)
->name('historial-trabajo-quinta');

//ruta para ver historial de trabajos recursos humanos
Route::get('/historial-trabajo-recurso/{trabajosRecursoId}', HistorialComunicacionesRecurso::class)
->name('historial-trabajo-recurso');

//ruta para ver historial de trabajos recursos comisaria segunda
Route::get('/historial-trabajo-segunda/{trabajosSegundaId}', HistorialComunicacionesSegunda::class)
->name('historial-trabajo-segunda');

//ruta para ver historial de trabajos recursos comisaria tercera
Route::get('/historial-trabajo-tercera/{trabajosTerceraId}', HistorialComunicacionesTercera::class)
->name('historial-trabajo-tercera');

//ruta para ver historial de trabajos tolhuin
Route::get('/historial-trabajo-tolhuin/{trabajosTolhuinId}', HistorialComunicacionesTolhuin::class)
    ->name('historial-trabajo-tolhuin');


//ruta para ver historial de trabajos Rio Grande
Route::get('/historial-trabajo-riogrande/{trabajosRiograndeId}', HistorialComunicacionesRg::class)
    ->name('historial-trabajo-Riogrande');

//ruta historial informatica ush
// routes/web.php

//******HISTORIALES PARA INFORMATICA********** */

Route::get('/historial-inventario-general/{generalInformaticaId}', HistorialInventarioGeneral::class)
    ->name('historial-inventario-general');

//ruta historial informatica tolhuin
Route::get('/historial-tolhuin-general/{tolhuinGeneraleId}', HistorialTolhuinGeneral::class)
    ->name('historial-tolhuin-general');

//ruta historial informatica rg
Route::get('/historial-riogrande-general/{riograndeGeneraleId}', HistorialRiograndeGeneral::class)
    ->name('historial-riogrande-general');
