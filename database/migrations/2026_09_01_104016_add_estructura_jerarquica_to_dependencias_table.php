<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('dependencias', function (Blueprint $table) {
            if (!Schema::hasColumn('dependencias', 'dependencia_padre_id')) {
                $table->unsignedBigInteger('dependencia_padre_id')
                    ->nullable()
                    ->after('id');
            }

            if (!Schema::hasColumn('dependencias', 'tipo')) {
                $table->string('tipo')
                    ->nullable()
                    ->after('codigo');
            }
        });

        // La columna ya existe, pero la FK todavía no.
        Schema::table('dependencias', function (Blueprint $table) {
            $table->foreign('dependencia_padre_id')
                ->references('id')
                ->on('dependencias')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('dependencias', function (Blueprint $table) {
            $table->dropForeign(['dependencia_padre_id']);
        });

        Schema::table('dependencias', function (Blueprint $table) {
            if (Schema::hasColumn('dependencias', 'tipo')) {
                $table->dropColumn('tipo');
            }

            if (Schema::hasColumn('dependencias', 'dependencia_padre_id')) {
                $table->dropColumn('dependencia_padre_id');
            }
        });
    }
};
