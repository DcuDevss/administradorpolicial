<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('dependencia_id')
                ->nullable()
                ->after('id')
                ->constrained('dependencias')
                ->nullOnDelete();

            $table->foreignId('area_id')
                ->nullable()
                ->after('dependencia_id')
                ->constrained('areas')
                ->nullOnDelete();

            $table->index('dependencia_id');
            $table->index('area_id');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['area_id']);
            $table->dropForeign(['dependencia_id']);

            $table->dropIndex(['area_id']);
            $table->dropIndex(['dependencia_id']);

            $table->dropColumn([
                'area_id',
                'dependencia_id',
            ]);
        });
    }
};
