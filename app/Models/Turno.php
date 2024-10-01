<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Turno extends Model
{
    use HasFactory;

     // Nombre de la tabla en la base de datos
     protected $table = 'turnos';

     // Campos que se pueden llenar masivamente
     protected $fillable = [
         'user_id',
         'fecha',
         'hora',
         'reservado',
         
     ];

     // Relación con el modelo User
     public function user()
     {
         return $this->belongsTo(User::class);
     }
}
