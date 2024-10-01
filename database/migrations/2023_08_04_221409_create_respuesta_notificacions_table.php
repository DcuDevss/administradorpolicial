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
        Schema::create('respuesta_notificacions', function (Blueprint $table) {
            $table->id();
            $table->text('mensaje');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('notificacion_id')->constrained('notificaciones');
            $table->unsignedBigInteger('user_comisaria_id'); // Id del usuario con rol userComisaria
            $table->foreign('user_comisaria_id')->references('id')->on('users');
            //$table->boolean('vista')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuesta_notificacions');
    }
};
