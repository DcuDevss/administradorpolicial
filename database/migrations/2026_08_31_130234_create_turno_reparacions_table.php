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
        Schema::create('turnos_reparacion', function (Blueprint $table) {
            $table->id();

            $table->foreignId('solicitud_id')->constrained('solicitudes_reparacion')->cascadeOnDelete();

            $table->date('fecha');

            $table->time('hora');

            $table->string('estado')->default('confirmado');

            $table->text('observaciones')->nullable();

            $table->timestamps();

            $table->index([
                'fecha',
                'hora',
            ]);

            $table->index('estado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turnos_reparacion');
    }
};
