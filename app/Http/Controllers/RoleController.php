<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Helpers\AuditLogger;




class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin-roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin-roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);

        // 🔍 AUDITORÍA
        AuditLogger::log(
            'role.create',
            $role,
            "Alta del rol {$role->name}"
        );

        return redirect()
            ->route('admin-roles.edit', $role)
            ->with('info', 'El rol se creó con éxito');
    }

    public function show(Role $role)
    {
        return view('admin-roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin-roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role->update($request->all());
        $role->permissions()->sync($request->permissions);

        // 🔍 AUDITORÍA
        AuditLogger::log(
            'role.update',
            $role,
            "Actualización del rol {$role->name}"
        );

        return redirect()
            ->route('admin-roles.edit', $role)
            ->with('info', 'El rol se actualizó con éxito');
    }

    public function destroy(Role $role)
    {
        $nombre = $role->name;

        $role->delete();

        // 🔍 AUDITORÍA
        AuditLogger::log(
            'role.delete',
            $role,
            "Eliminación del rol {$nombre}"
        );

        return redirect()
            ->route('admin-roles.index')
            ->with('success', '¡El rol fue eliminado exitosamente!');
    }
}
