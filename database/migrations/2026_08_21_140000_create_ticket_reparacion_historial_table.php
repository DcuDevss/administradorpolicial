<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ticket_reparacion_historial', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_reparacion_id')->constrained('tickets_reparaciones')->cascadeOnDelete();
            $table->foreignId('usuario_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('accion', 30);
            $table->text('descripcion')->nullable();
            $table->timestamps();

            $table->index(['ticket_reparacion_id', 'created_at'], 'ticket_hist_ticket_created_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ticket_reparacion_historial');
    }
};
