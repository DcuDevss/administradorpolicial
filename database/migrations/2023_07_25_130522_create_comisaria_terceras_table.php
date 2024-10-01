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
        Schema::create('comisaria_terceras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipodeoficina_id')->nullable();
            $table->foreign('tipodeoficina_id')->references('id')->on('tipodeoficinas')->onDelete('cascade');
            $table->unsignedBigInteger('tipodispositivo_id')->nullable();
            $table->foreign('tipodispositivo_id')->references('id')->on('tipodispositivos')->onDelete('cascade');
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->unsignedBigInteger('cantidadram_id')->nullable();
            $table->foreign('cantidadram_id')->references('id')->on('cantidadrams')->onDelete('cascade');
            $table->string('procesador')->nullable();
            $table->string('almacenamiento')->nullable();
            $table->string('sistema_operativo')->nullable();
            $table->string('monitor')->nullable();
            $table->string('tipo_servicio')->nullable();
            $table->date('fecha_servicio')->nullable();
            $table->boolean('activo')->default(true); // Agregamos el campo "activo" con valor predeterminado "true"
            $table->text('detalles_servicios')->nullable(); // Agregamos el campo "detalles_servicios" como campo de texto y permitimos valores nulos
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comisaria_terceras');
    }
};
