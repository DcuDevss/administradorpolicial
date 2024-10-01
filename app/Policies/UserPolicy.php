<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function accessCrearNotificacion(User $user)
    {
        return $user->name === 'Comisaria Primera';
    }

    public function accessTurnosCalendar(User $user)
    {
        return $user->name === 'Comisaria Segunda';
    }
    //-----------vistas que no son rutas----

    public function verHolaLoco(User $user)
    {
        return $user->name === 'Comisaria Primera';
    }

    public function verHolaSegunda(User $user)
    {
        return $user->name === 'Comisaria Segunda';
    }

  //----solo admin puede registrar usuarios----

    public function createUser(User $user)
    {
        return $user->isAdmin();
    }
}
