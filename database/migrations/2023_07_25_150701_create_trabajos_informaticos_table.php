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
        Schema::create('trabajos_informaticos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('totaldependencia_id')->nullable();
            $table->foreign('totaldependencia_id')->references('id')->on('totaldependencias')->onDelete('cascade');
            $table->unsignedBigInteger('dependencia_tolhuin_id')->nullable();
            $table->foreign('dependencia_tolhuin_id')->references('id')->on('dependencia_tolhuins')->onDelete('cascade');
           /* $table->unsignedBigInteger('dependencia_ushuaia_id')->nullable();
            $table->foreign('dependencia_ushuaia_id')->references('id')->on('dependencia_ushuaias')->onDelete('cascade');
            $table->foreign('cientifica_id')->references('id')->on('cientificas')->onDelete('cascade');
            $table->unsignedBigInteger('serviciosespeciale_id')->nullable();
            $table->foreign('serviciosespeciale_id')->references('id')->on('serviciosespeciales')->onDelete('cascade');
            $table->unsignedBigInteger('custodiagubernamentale_id')->nullable();
            $table->foreign('custodiagubernamentale_id')->references('id')->on('custodiagubernamentales')->onDelete('cascade');
            $table->unsignedBigInteger('destacamento_id')->nullable();
            $table->foreign('destacamento_id')->references('id')->on('destacamentos')->onDelete('cascade');
            $table->unsignedBigInteger('administracion_id')->nullable();
            $table->foreign('administracion_id')->references('id')->on('administracions')->onDelete('cascade');
            $table->unsignedBigInteger('investigacione_id')->nullable();
            $table->foreign('investigacione_id')->references('id')->on('investigaciones')->onDelete('cascade');
            $table->unsignedBigInteger('recurso_humano_id')->nullable();
            $table->foreign('recurso_humano_id')->references('id')->on('recurso_humanos')->onDelete('cascade');
            $table->unsignedBigInteger('sumario_id')->nullable();
            $table->foreign('sumario_id')->references('id')->on('sumarios')->onDelete('cascade');
            $table->unsignedBigInteger('bienestare_id')->nullable();
            $table->foreign('bienestare_id')->references('id')->on('bienestares')->onDelete('cascade');
            $table->unsignedBigInteger('jefatura_id')->nullable();
            $table->foreign('jefatura_id')->references('id')->on('jefaturas')->onDelete('cascade');*/
            $table->date('fecha_trabajo')->nullable();
            $table->string('lugar_trabajo')->nullable();
            $table->text('detalles_trabajo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajos_informaticos');
    }
};
