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
        Schema::create('comunicacionesterceras', function (Blueprint $table) {
            $table->id();
            $table->string('lugar_colocacion')->nullable();
            $table->unsignedBigInteger('equipocomunicacion_id')->nullable();
            $table->foreign('equipocomunicacion_id')->references('id')->on('equipocomunicacions')->onDelete('cascade');
            $table->unsignedBigInteger('marcaequipo_id')->nullable();
            $table->foreign('marcaequipo_id')->references('id')->on('marcaequipos')->onDelete('cascade');
            $table->unsignedBigInteger('vhfantena_id')->nullable();
            $table->foreign('vhfantena_id')->references('id')->on('vhfantenas')->onDelete('cascade');
            $table->string('modelo')->nullable();
            $table->string('nro_serie')->nullable();
            $table->string('condicion_equipo_comunicacion')->nullable();
           // $table->string('condicion_fuente')->nullable(); // Corregido "nullabale" a "nullable"
           // $table->string('condicion_baliza')->nullable(); // Corregido "nullabale" a "nullable"
            $table->timestamp('fecha_inventario')->nullable();
            $table->timestamp('fecha_service')->nullable(); // Corregido "fecha_sevice" a "fecha_service"
            $table->string('tipo_service')->nullable();
            $table->text('detalle_inventario')->nullable(); // Corregido "Detalle_inventario" a "detalle_inventario"
            $table->string('codigo_qr')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comunicacionesterceras');
    }
};
