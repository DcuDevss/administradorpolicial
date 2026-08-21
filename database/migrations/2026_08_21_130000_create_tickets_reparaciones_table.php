<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets_reparaciones', function (Blueprint $table) {
            $table->id();
            $table->string('numero_ticket', 30)->unique();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('tecnico_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('generalinformatica_id')->nullable()->constrained('generalinformaticas')->nullOnDelete();
            $table->string('dependencia_tipo', 30)->nullable();
            $table->unsignedBigInteger('dependencia_id')->nullable();
            $table->string('dependencia_nombre')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->time('hora_ingreso')->nullable();
            $table->string('entregado_por')->nullable();
            $table->string('recibido_por')->nullable();
            $table->string('equipo')->nullable();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('numero_serie')->nullable();
            $table->text('problema_reportado')->nullable();
            $table->string('estado', 30)->default('nuevo');
            $table->text('diagnostico')->nullable();
            $table->text('pieza_danada')->nullable();
            $table->text('trabajo_realizado')->nullable();
            $table->text('observaciones')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->time('hora_entrega')->nullable();
            $table->string('entregado_por_tecnico')->nullable();
            $table->string('recibido_por_dependencia')->nullable();
            $table->timestamps();

            $table->index(['estado', 'created_at']);
            $table->index(['dependencia_tipo', 'dependencia_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets_reparaciones');
    }
};
