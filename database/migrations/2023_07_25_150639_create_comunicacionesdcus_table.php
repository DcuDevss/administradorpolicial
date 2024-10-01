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
        Schema::create('comunicacionesdcus', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
           // $table->enum('categoria', ['herramienta_comun', 'herramienta_medicion', 'equipo_informatico', 'equipo_radio', 'equipo_guardia_radio', 'otro']);
           $table->unsignedBigInteger('categoriacomunicacion_id')->nullable();
           $table->foreign('categoriacomunicacion_id')->references('id')->on('categoriacomunicacions')->onDelete('cascade');
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('numero_serie')->nullable();
            $table->timestamp('fecha_service')->nullable();
            $table->string('tipo_service')->nullable();
            $table->string('estado')->nullable();
            $table->timestamp('fecha_inventario')->nullable();
            $table->string('detalle_inventario')->nullable();
            $table->string('codigo_qr')->nullable();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comunicacionesdcus');
    }
};
