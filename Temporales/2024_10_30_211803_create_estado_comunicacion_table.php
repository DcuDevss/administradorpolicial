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
        Schema::create('estado_comunicacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comunicacionesprimera_id'); // Comunicación específica
            $table->unsignedBigInteger('estado_equipo_id'); // Estado específico
            $table->timestamps();

            // Definir las llaves foráneas y el comportamiento en caso de eliminación
            $table->foreign('comunicacionesprimera_id')
                  ->references('id')->on('comunicacionesprimeras')
                  ->onDelete('cascade');
            $table->foreign('estado_equipo_id')
                  ->references('id')->on('estado_equipos')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado_comunicacion');
    }
};
