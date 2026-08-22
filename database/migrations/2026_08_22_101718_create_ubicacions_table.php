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
        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->id();

            $table->foreignId('dependencia_id')
                ->constrained('dependencias')
                ->restrictOnDelete();

            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('ubicaciones')
                ->nullOnDelete();

            $table->string('nombre');

            $table->string('tipo');

            $table->string('codigo')
                ->nullable();

            $table->text('descripcion')
                ->nullable();

            $table->boolean('activa')
                ->default(true);

            $table->timestamps();

            $table->index('dependencia_id');
            $table->index('parent_id');
            $table->index(['dependencia_id', 'nombre']);
            $table->index(['dependencia_id', 'tipo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ubicaciones');
    }
};
