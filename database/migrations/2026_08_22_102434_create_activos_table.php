<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('dependencia_id')
                ->constrained('dependencias')
                ->restrictOnDelete();

            $table->foreignId('ubicacion_id')
                ->nullable()
                ->constrained('ubicaciones')
                ->nullOnDelete();

            $table->foreignId('categoria_activo_id')
                ->constrained('categorias_activos')
                ->restrictOnDelete();

            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('numero_serie')->nullable();
            $table->string('codigo_patrimonial')->nullable();
            $table->string('codigo_interno')->nullable();

            $table->string('estado')->default('activo');

            $table->foreignId('responsable_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->date('fecha_alta')->nullable();

            $table->text('observaciones')->nullable();

            $table->string('qr_token')->nullable()->unique();
            $table->timestamp('qr_revocado_at')->nullable();

            $table->timestamps();

            $table->index('dependencia_id');
            $table->index('ubicacion_id');
            $table->index('categoria_activo_id');
            $table->index('estado');
            $table->index('responsable_user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activos');
    }
};
