<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Helpers\AuditLogger;
use App\Models\Traits\Auditable;

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

    /*  public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        // 🔍 AUDITORÍA
        AuditLogger::log(
            'user.update',
            $user,
            "Actualización de roles del usuario {$user->name}"
        );

        return redirect()
            ->route('users.edit', $user)
            ->with('info', 'Se asignaron los roles correctamente');
    } */

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
            'roles' => 'nullable|array'
        ]);

        // Actualizar nombre
        $user->name = $request->name;

        // Actualizar contraseña SOLO si viene cargada
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        // Sincronizar roles (si no viene ninguno, deja vacío)
        $user->roles()->sync($request->roles ?? []);

        // 🔍 AUDITORÍA
        AuditLogger::log(
            'user.update',
            $user,
            "Actualización de usuario {$user->name}"
        );

        return redirect()
            ->route('users.edit', $user)
            ->with('info', 'Usuario actualizado correctamente');
    }


    public function destroy(User $user)
    {
        $nombre = $user->name;

        $user->delete();

        // 🔍 AUDITORÍA
        AuditLogger::log(
            'user.delete',
            $user,
            "Usuario Eliminado {$nombre}"
        );

        return redirect()
            ->route('users.index')
            ->with('success', '¡El usuario ha sido eliminado correctamente!');
    }
}
