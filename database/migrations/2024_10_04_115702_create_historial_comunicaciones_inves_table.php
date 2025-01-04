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
        Schema::create('historial_comunicaciones_inves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trabajos_investigaciones_id');
            // otros campos...

            // Definir una clave foránea con un nombre más corto
           $table->foreign('trabajos_investigaciones_id', 'trabajos_inves_fk')
               ->references('id')->on('comunicacionesinvestigacions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_comunicaciones_inves');
    }
};
