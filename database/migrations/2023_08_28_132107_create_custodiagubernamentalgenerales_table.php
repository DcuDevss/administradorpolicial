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
        Schema::create('custodiagubernamentalgenerales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('custodiagubernamentale_id')->nullable();
            $table->foreign('custodiagubernamentale_id')->references('id')->on('custodiagubernamentales')->onDelete('cascade');
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
            $table->string('codigo_qr')->nullable(); // Agregamos el campo "codigo_qr" para guardar el código QR y permitimos valores nulos
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custodiagubernamentalgenerales');
    }
};
