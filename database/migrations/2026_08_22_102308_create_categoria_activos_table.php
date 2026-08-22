<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categorias_activos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('categorias_activos')
                ->nullOnDelete();

            $table->string('nombre');

            $table->string('codigo')
                ->nullable()
                ->unique();

            $table->text('descripcion')
                ->nullable();

            $table->boolean('activa')
                ->default(true);

            $table->timestamps();

            $table->index('parent_id');
            $table->index('activa');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categorias_activos');
    }
};
