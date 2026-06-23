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
        Schema::create('user_terms_acceptances', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('terms_condition_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamp('accepted_at');

            $table->timestamps();

            $table->unique(
                ['user_id', 'terms_condition_id'],
                'user_terms_unique'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_terms_accceptances');
    }
};
