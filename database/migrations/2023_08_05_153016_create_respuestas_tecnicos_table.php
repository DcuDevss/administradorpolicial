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
        Schema::create('respuestas_tecnicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tecnico_id');
            $table->unsignedBigInteger('notificacion_id');
            $table->text('mensaje');
            $table->timestamps();
            // Definir las relaciones con las tablas de usuarios y notificaciones
            $table->foreign('tecnico_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('notificacion_id')->references('id')->on('notificaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuestas_tecnicos');
    }
};
