<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
/* use App\Models\Traits\Auditable; */



class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    /* use Auditable; */


    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $appends = [
        'profile_photo_url',
    ];


    public function unreadMessagesCount()
    {
        return $this->conversations->sum(function ($conversation) {
            return $conversation->messages()
                ->where('receiver_id', $this->id)
                ->whereNull('read_at')
                ->count();
        });
    }

    public function conversations()
    {

        return $this->hasMany(Conversation::class, 'sender_id')->orWhere('receiver_id', $this->id)->whereNotDeleted();
    }

    public function receivesBroadcastNotificationsOn(): string
    {
        return 'users.' . $this->id;
    }


    public function respuestasEnviadas()
    {
        return $this->hasMany(RespuestaNotificacion::class, 'user_id');
    }


    public function notificacionesEnviadas()
    {
        return $this->hasMany(Notificacion::class, 'user_comisaria_id');
    }

    public function notificacionesRecibidas()
    {
        return $this->hasMany(Notificacion::class, 'tecnico_id');
    }

    /*public function notificacionesEnviadas()
    {
        return $this->hasMany(Notificacion::class, 'user_comisaria_id');
    }

    public function notificacionesRecibidas()
    {
        return $this->belongsToMany(Notificacion::class, 'notificacion_user', 'user_id', 'notificacion_id');
    }*/

    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }
    public function ordenesTrabajo()
    {
        return $this->hasMany(OrdenTrabajo::class, 'user_id');
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    // refactor

    /* public function isAdmin()
    {
        return $this->role === 'Admin';
    } */
    public function isAdmin(): bool
    {
        return $this->hasRole('Admin');
    }

    public function termsAcceptances()
    {
        return $this->hasMany(UserTermsAcceptance::class);
    }

    public function solicitudesReparacion(): HasMany
    {
        return $this->hasMany(SolicitudReparacion::class, 'usuario_id');
    }
}
