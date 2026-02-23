<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Helpers\AuditLogger;


class RegisterController extends Controller
{
    public function create()
    {


        return view('admin.registrar-usuario'); // Vista correcta
    }





    public function store(Request $request)
    {

        /* $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        dd($validated); */

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),


        ]);

        // 🔍 AUDITORÍA
        AuditLogger::log(
            'user.create',
            $user,
            "Usuario creado {$user->name}"
        );






        return redirect('users')->with('success', 'Usuario registrado exitosamente.');
    }
}
