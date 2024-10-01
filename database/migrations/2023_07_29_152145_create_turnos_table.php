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
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            //$table->dateTime('fecha_hora')->nullable();
            //$table->dateTime('fecha_turno')->nullable();
            //$table->string('tipo_servicio')->nullable();
            //$table->string('estado')->default('pendiente')->nullable();
           // $table->text('detalles')->nullable();
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('reservado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turnos');
    }
};
