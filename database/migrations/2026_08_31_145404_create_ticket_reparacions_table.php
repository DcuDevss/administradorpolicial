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
        Schema::create('tickets_reparacion', function (Blueprint $table) {
            $table->id();

            /*
             * Identificador operativo visible del ciclo de reparación.
             *
             * Ejemplo:
             * REP-2026-000001
             */
            $table->string('numero')->unique();

            /*
             * Código utilizado para verificación del ticket.
             * No debe contener información sensible.
             */
            $table->string('codigo_verificacion')->unique();

            /*
             * Solicitud que origina el ciclo de reparación.
             */
            $table->foreignId('solicitud_reparacion_id')
                ->constrained('solicitudes_reparacion')
                ->restrictOnDelete();

            /*
             * Activo asociado.
             */
            $table->foreignId('activo_id')
                ->constrained('activos')
                ->restrictOnDelete();

            /*
             * Se completa después de crear la recepción.
             */
            $table->foreignId('recepcion_id')
                ->nullable()
                ->constrained('recepciones')
                ->nullOnDelete();

            /*
             * La entrega se incorporará posteriormente.
             */
            $table->foreignId('entrega_id')
                ->nullable()
                ->constrained('entregas')
                ->nullOnDelete();

            /*
             * Estados definidos en el documento técnico:
             *
             * abierto
             * en_reparacion
             * listo_para_retirar
             * entregado
             * cerrado
             * anulado
             */
            $table->string('estado')->default('abierto');

            /*
             * Momento en que se emitió el ticket.
             */
            $table->timestamp('emitido_at')->nullable();

            $table->timestamps();

            $table->index('estado');
            $table->index('solicitud_reparacion_id');
            $table->index('activo_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets_reparacion');
    }
};
