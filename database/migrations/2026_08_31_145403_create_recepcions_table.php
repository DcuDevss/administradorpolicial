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
        Schema::create('recepciones', function (Blueprint $table) {
            $table->id();

            /*
             * Activo que ingresa físicamente a Reparaciones.
             */
            $table->foreignId('activo_id')
                ->constrained('activos')
                ->restrictOnDelete();

            /*
             * Solicitud que origina la recepción.
             */
            $table->foreignId('solicitud_reparacion_id')
                ->constrained('solicitudes_reparacion')
                ->restrictOnDelete();

            
            /*
             * Turno mediante el cual ingresó el equipo.
             */
            $table->foreignId('turno_reparacion_id')
                ->nullable()
                ->constrained('turnos_reparacion')
                ->nullOnDelete();

            /*
             * Dependencia propietaria/responsable del activo.
             */
            $table->foreignId('dependencia_id')
                ->constrained('dependencias')
                ->restrictOnDelete();

            /*
             * Técnico que recibe físicamente el equipo.
             */
            $table->foreignId('recibido_por_id')
                ->constrained('users')
                ->restrictOnDelete();

            /*
             * Momento exacto de ingreso.
             */
            $table->timestamp('fecha_recepcion');

            /*
             * Persona que entrega físicamente el equipo.
             */
            $table->string('persona_entrega_nombre');

            $table->string('persona_entrega_documento')->nullable();

            /*
             * Estado físico observado al momento de recepción.
             */
            $table->text('estado_fisico')->nullable();

            /*
             * Accesorios entregados junto al activo.
             */
            $table->text('accesorios')->nullable();

            /*
             * Falla declarada por la persona que entrega.
             */
            $table->text('falla_declarada')->nullable();

            /*
             * Observaciones adicionales.
             */
            $table->text('observaciones')->nullable();

            $table->timestamps();

            $table->index('activo_id');
            $table->index('solicitud_reparacion_id');
            $table->index('turno_reparacion_id');
            $table->index('dependencia_id');
            $table->index('recibido_por_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recepciones');
    }
};
