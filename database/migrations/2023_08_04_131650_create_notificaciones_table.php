<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->id();
            $table->text('mensaje');
            $table->boolean('activa')->default(false);
            $table->unsignedBigInteger('user_comisaria_id'); // Id del usuario con rol userComisaria
            $table->unsignedBigInteger('tecnico_id'); // Id del usuario con rol tecnico
            // Relaciones con las tablas de usuarios
            $table->foreign('user_comisaria_id')->references('id')->on('users');
           // $table->foreign('tecnico_id')->references('id')->on('users');
           $table->foreign('tecnico_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificaciones');
    }
};
