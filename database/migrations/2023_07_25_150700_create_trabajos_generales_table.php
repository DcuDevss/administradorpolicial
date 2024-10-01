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
        Schema::create('trabajos_generales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dependencia_ushuaia_id')->nullable();
            $table->foreign('dependencia_ushuaia_id')->references('id')->on('dependencia_ushuaias')->onDelete('cascade');
            $table->unsignedBigInteger('dependencia_riogrande_id')->nullable();
            $table->foreign('dependencia_riogrande_id')->references('id')->on('dependencia_riograndes')->onDelete('cascade');
            $table->unsignedBigInteger('dependencia_tolhuin_id')->nullable();
            $table->foreign('dependencia_tolhuin_id')->references('id')->on('dependencia_tolhuins')->onDelete('cascade');
            $table->unsignedBigInteger('otras_institucione_id')->nullable();
            $table->foreign('otras_institucione_id')->references('id')->on('otras_instituciones')->onDelete('cascade');
            $table->unsignedBigInteger('tecnicocomunicacione_id')->nullable();
            $table->foreign('tecnicocomunicacione_id')->references('id')->on('tecnicocomunicaciones')->onDelete('cascade');
            $table->string('lugar_trabajo')->nullable();
            $table->timestamp('fecha_trabajo')->nullable();
            $table->text('detalle_trabajo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajos_generales');
    }
};
