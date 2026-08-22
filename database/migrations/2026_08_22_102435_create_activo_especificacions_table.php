<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activo_especificaciones', function (Blueprint $table) {
            $table->id();

            $table->foreignId('activo_id')
                ->constrained('activos')
                ->cascadeOnDelete();

            $table->string('clave');

            $table->text('valor');

            $table->string('unidad')
                ->nullable();

            $table->string('tipo_valor')
                ->nullable();

            $table->timestamps();

            $table->unique(['activo_id', 'clave']);
            $table->index('clave');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activo_especificaciones');
    }
};
