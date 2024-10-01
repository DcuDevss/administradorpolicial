<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
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

    // app/Models/User.php

    public function isAdmin()
    {
        return $this->role === 'Admin';
    }
}
