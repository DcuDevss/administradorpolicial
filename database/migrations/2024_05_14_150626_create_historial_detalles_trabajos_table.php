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
        Schema::create('historial_detalles_trabajos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trabajos_generale_id');
            $table->text('detalle_trabajo');
            $table->timestamps();

            // Llave foránea que relaciona con la tabla de trabajos generales
            $table->foreign('trabajos_generale_id')->references('id')->on('trabajos_generales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_detalles_trabajos');
    }
};
