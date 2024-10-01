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
        Schema::create('generalinformaticas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dependencia_ushuaia_id')->nullable();
            $table->foreign('dependencia_ushuaia_id')->references('id')->on('dependencia_ushuaias')->onDelete('cascade');
            $table->unsignedBigInteger('tipodeoficina_id')->nullable();
            $table->foreign('tipodeoficina_id')->references('id')->on('tipodeoficinas')->onDelete('cascade')->nullable();
           // $table->unsignedBigInteger('cientifica_id')->nullable();
           // $table->foreign('cientifica_id')->references('id')->on('cientificas')->onDelete('cascade');
            $table->unsignedBigInteger('serviciosespeciale_id')->nullable();
            $table->foreign('serviciosespeciale_id')->references('id')->on('serviciosespeciales')->onDelete('cascade');
            $table->unsignedBigInteger('custodiagubernamentale_id')->nullable();
            $table->foreign('custodiagubernamentale_id')->references('id')->on('custodiagubernamentales')->onDelete('cascade');
            /*$table->unsignedBigInteger('administracion_id')->nullable();
            $table->foreign('administracion_id')->references('id')->on('administracions')->onDelete('cascade');*/
            $table->unsignedBigInteger('destacamento_id')->nullable();
            $table->foreign('destacamento_id')->references('id')->on('destacamentos')->onDelete('cascade');
           // $table->unsignedBigInteger('serviciosespeciale_id')->nullable();
           // $table->foreign('serviciosespeciale_id')->references('id')->on('serviciosespeciales')->onDelete('cascade');
            $table->unsignedBigInteger('tipodispositivo_id')->nullable();
            $table->foreign('tipodispositivo_id')->references('id')->on('tipodispositivos')->onDelete('cascade')->nullable();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('tipo_ram')->nullable();
            $table->unsignedBigInteger('cantidadram_id')->nullable();
            $table->foreign('cantidadram_id')->references('id')->on('cantidadrams')->onDelete('cascade')->nullable();
            $table->unsignedBigInteger('slotmemoria_id')->nullable();
            $table->foreign('slotmemoria_id')->references('id')->on('slotmemorias')->onDelete('cascade')->nullable();
            $table->string('procesador')->nullable();
            $table->string('tipo_disco')->nullable();
            $table->string('cant_almacenamiento')->nullable();
            $table->string('sistema_operativo')->nullable();
           // $table->string('monitor')->nullable();
            $table->string('tipo_teclado')->nullable();
            $table->string('tipo_mouse')->nullable();
            //$table->string('tipo_impresora')->nullable();
            $table->date('fecha_service')->nullable();
            $table->string('tipo_service')->nullable();
            $table->date('fecha_inventario')->nullable();
            $table->boolean('activo')->default(true);
            $table->text('detalles_inventario')->nullable();
            $table->text('softwares_instalados')->nullable();
            $table->string('codigo_qr')->nullable(); // Agregamos el campo "codigo_qr" para guardar el código QR y permitimos valores nulos
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generalinformaticas');
    }
};
