<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solicitudes_reparacion', function (Blueprint $table) {
            $table->id();

            // Activo sobre el cual se solicita la atención
            $table->foreignId('activo_id')->constrained('activos')->cascadeOnDelete();

            // Usuario que genera la solicitud
            $table->foreignId('usuario_id')->constrained('users')->restrictOnDelete();

            // Estado actual de la solicitud
            $table->string('estado', 30)->default('pendiente');

            // Prioridad informada para la atención
            $table->string('prioridad', 20)->default('media');

            // Resumen de la falla o necesidad de atención
            $table->string('titulo', 150);

            // Descripción detallada proporcionada por el usuario
            $table->text('descripcion');

            $table->timestamps();

            $table->index(['activo_id', 'estado']);
            $table->index(['usuario_id', 'estado']);
            $table->index(['estado', 'prioridad']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitudes_reparacion');
    }
};
