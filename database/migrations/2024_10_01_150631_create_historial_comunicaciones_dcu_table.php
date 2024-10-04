<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialComunicacionesDcuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_comunicaciones_dcu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trabajos_dcu_id')->constrained()->onDelete('cascade');
            $table->string('detalle_inventario')->nullable();
            $table->timestamps();

            $table->foreign('trabajos_dcu_id')
            ->references('id')
            ->on('comunicacionesdcus')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_comunicaciones_dcu');
    }
}
