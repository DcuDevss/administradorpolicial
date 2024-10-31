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
        Schema::create('historial_comunicaciones_cientifica', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trabajos_cientifica_id')->nullable();
            $table->string('detalle_inventario')->nullable();
            $table->timestamps();

             // Asignar un nombre personalizado a la clave externa para evitar el límite de longitud
            $table->foreign('trabajos_cientifica_id', 'fk_trabajos_cientifica')
            ->references('id')
            ->on('comunicacionescientificas')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_comunicaciones_cientifica');
    }
};
