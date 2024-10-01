<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialComunicacionesTolhuinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_comunicaciones_tolhuin', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trabajos_tolhuin_id')->constrained()->onDelete('cascade');
            $table->text('detalle_inventario');
            $table->timestamps();


        $table->foreign('trabajos_tolhuin_id')
        ->references('id')
        ->on('comunicacionestolhuins')
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
        Schema::dropIfExists('historial_comunicaciones_tolhuin');
    }
}
