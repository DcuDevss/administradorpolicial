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
        Schema::create('historial_comunicaciones_cuarta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trabajos_cuarta_id')->constrained()->onDelete('cascade');
            $table->string('detalle_inventario')->nullable();
            $table->timestamps();

            $table->foreign('trabajos_cuarta_id')
            ->references('id')
            ->on('comunicacionescuartas')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_comunicaciones_cuarta');
    }
};
