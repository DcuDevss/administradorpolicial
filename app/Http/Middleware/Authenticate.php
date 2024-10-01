<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
   /* protected function redirectTo(Request $request): ?string
    {
        // Check if the user is not authenticated
        if (!Auth::check()) {
            return route('login');
        }

        // Get the authenticated user's role
        $user = Auth::user();

        // Redirect based on user's role
        if ($user->hasRole('Admin')) {
            return route('dashboard');
        } elseif ($user->hasRole('tecnicocomunicacion')) {
            return route('tecnicocomunicacion.tecnico-comunicacion');
        } else {
            // Default redirection if the user doesn't have a recognized role
            return route('otra-vista');
        }
    }*/


}
