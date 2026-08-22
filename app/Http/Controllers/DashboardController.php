<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('Admin')) {
            return redirect()->intended(route('panel-administrador'));
        }

        if ($user->hasRole('tecnicoinformatico')) {
            return redirect()->intended(route('tecnico-informatico'));
        }

        if ($user->hasRole('tecnicocomunicacion')) {
            return redirect()->intended(route('tecnico-comunicacion'));
        }

        if ($user->hasRole('Adminrg')) {
            return redirect()->intended(route('tecnico-riogrande'));
        }

        return view('dashboard');
    }
}
