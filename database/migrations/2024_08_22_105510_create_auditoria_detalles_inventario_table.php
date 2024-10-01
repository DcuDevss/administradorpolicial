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
        Schema::create('auditoria_detalles_inventario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('generalinformatica_id');
            $table->text('detalles_inventario');
            $table->timestamps();

            $table->foreign('generalinformatica_id')
            ->references('id')
            ->on('generalinformaticas')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditoria_detalles_inventario');
    }
};
