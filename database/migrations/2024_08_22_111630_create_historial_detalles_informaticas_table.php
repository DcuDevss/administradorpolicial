<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialDetallesInformaticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_detalles_informaticas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trabajos_informatica_id');
            $table->text('detalles_trabajo');
            $table->timestamps();

            // Llave foránea que relaciona con la tabla de trabajos informaticos
            $table->foreign('trabajos_informatica_id')
                  ->references('id')
                  ->on('trabajos_informaticos')
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
        Schema::dropIfExists('historial_detalles_informaticas');
    }
}

