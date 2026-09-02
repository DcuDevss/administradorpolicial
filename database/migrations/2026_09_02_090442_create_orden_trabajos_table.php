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
        Schema::create('ordenes_trabajo', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Solicitud asociada
            |--------------------------------------------------------------------------
            */
            $table->foreignId('solicitud_reparacion_id')->constrained('solicitudes_reparacion')->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Técnico responsable
            |--------------------------------------------------------------------------
            */
            $table->foreignId('tecnico_id')->nullable()->constrained('users')->nullOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Estado de la orden de trabajo
            |--------------------------------------------------------------------------
            */
            $table->string('estado', 50)->default('pendiente');

            /*
            |--------------------------------------------------------------------------
            | Fechas del trabajo técnico
            |--------------------------------------------------------------------------
            */
            $table->timestamp('fecha_inicio')->nullable();

            $table->timestamp('fecha_finalizacion')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Información técnica
            |--------------------------------------------------------------------------
            */
            $table->text('diagnostico')->nullable();

            $table->text('problema_encontrado')->nullable();

            $table->text('trabajo_realizado')->nullable();

            $table->text('pruebas_realizadas')->nullable();

            $table->text('observaciones')->nullable();

            $table->string('resultado', 100)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes_trabajo');
    }
};
