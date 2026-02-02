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
        Schema::create('auditoria_inventario_administracions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('administraciongenerale_id');
            $table->text('detalles_inventario');
            $table->timestamps();

            $table->foreign('administraciongenerale_id', 'fk_aud_inv_admin_gen')
                ->references('id')
                ->on('administraciongenerales')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditoria_inventario_administracions');
    }
};
