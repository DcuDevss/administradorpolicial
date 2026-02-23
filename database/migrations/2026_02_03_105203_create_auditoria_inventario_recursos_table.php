<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('auditoria_inventario_recursos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recursoshumanosgenerale_id');
            $table->text('detalles_inventario');
            $table->timestamps();

            $table->foreign('recursoshumanosgenerale_id', 'fk_aud_inv_recur')
                ->references('id')
                ->on('recursoshumanosgenerales')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('auditoria_inventario_recursos');
    }
};
