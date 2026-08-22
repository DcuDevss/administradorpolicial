<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activo_referencias_legacy', function (Blueprint $table) {
            $table->id();

            $table->foreignId('activo_id')
                ->constrained('activos')
                ->cascadeOnDelete();

            $table->string('source_type');
            $table->unsignedBigInteger('source_id');
            $table->string('source_identifier')->nullable();

            $table->json('metadata')->nullable();

            $table->timestamps();

            $table->unique(
                ['source_type', 'source_id'],
                'activo_legacy_source_unique'
            );

            $table->index('activo_id');
            $table->index('source_type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activo_referencias_legacy');
    }
};
