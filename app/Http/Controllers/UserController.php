<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('can:users.index')->only('index');
        // $this->middleware('can:users.edit')->only('edit','update');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.edit', compact('user', 'roles'));
    }

    public function destroy(User $user)
    {
        // Asegúrate de que el usuario tiene permiso para eliminar


        $user->delete();

        // [MODIFICACIÓN CLAVE] AGREGAR MENSAJE DE SESIÓN PARA LA ALERTA DE ÉXITO
        // NOTA: Revisa que 'users.index' sea el nombre correcto de tu ruta de índice.
        return redirect()->route('users.index')->with('success', '¡El usuario ha sido eliminado correctamente!');
    }


    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('users.edit', $user)->with('info', 'Se asigno los roles correctamente');
    }
}
