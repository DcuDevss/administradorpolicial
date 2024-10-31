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
        Schema::create('historial_comunicaciones_segunda', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trabajos_segunda_id')->constrained()->onDelete('cascade');
            $table->string('detalle_inventario')->nullable();
            $table->timestamps();

            $table->foreign('trabajos_segunda_id')
            ->references('id')
            ->on('comunicacionessegundas')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_comunicaciones_segunda');
    }
};
