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
        Schema::create('recursoshumanosgenerales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recurso_humano_id')->nullable();
            $table->foreign('recurso_humano_id')->references('id')->on('recurso_humanos')->onDelete('cascade');

            $table->unsignedBigInteger('sumario_id')->nullable();
            $table->foreign('sumario_id')->references('id')->on('sumarios')->onDelete('cascade');

            $table->unsignedBigInteger('bienestare_id')->nullable();
            $table->foreign('bienestare_id')->references('id')->on('bienestares')->onDelete('cascade');

            $table->unsignedBigInteger('tipodispositivo_id')->nullable();
            $table->foreign('tipodispositivo_id')->references('id')->on('tipodispositivos')->onDelete('cascade')->nullable();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('tipo_ram')->nullable();
            $table->unsignedBigInteger('cantidadram_id')->nullable();
            $table->foreign('cantidadram_id')->references('id')->on('cantidadrams')->onDelete('cascade')->nullable();
            $table->unsignedBigInteger('slotmemoria_id')->nullable();
            $table->foreign('slotmemoria_id')->references('id')->on('slotmemorias')->onDelete('cascade')->nullable();
            $table->string('procesador')->nullable();
            $table->string('tipo_disco')->nullable();
            $table->string('cant_almacenamiento')->nullable();
            $table->string('sistema_operativo')->nullable();
            $table->string('tipo_teclado')->nullable();
            $table->string('tipo_mouse')->nullable();
            $table->date('fecha_service')->nullable();
            $table->string('tipo_service')->nullable();
            $table->date('fecha_inventario')->nullable();
            $table->boolean('activo')->default(true);
            $table->text('detalles_inventario')->nullable();
            $table->text('softwares_instalados')->nullable();
            $table->string('codigo_qr')->nullable(); // Agregamos el campo "codigo_qr" para guardar el código QR y permitimos valores nulos
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recursoshumanosgenerales');
    }
};
