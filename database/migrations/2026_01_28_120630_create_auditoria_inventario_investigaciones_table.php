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
        Schema::create('auditoria_inventario_investigaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('investigacionegenerale_id');
            $table->text('detalles_inventario');
            $table->timestamps();

            $table->foreign('investigacionegenerale_id')
            ->references('id')
            ->on('investigacionegenerales')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditoria_inventario_investigaciones');
    }
};
