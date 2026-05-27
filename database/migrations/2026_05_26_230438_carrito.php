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
    Schema::create('carritos', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('id_usuario')->nullable(); // Para cuando tengas usuarios
        $table->string('session_id')->nullable();            // <--- ASEGURATE DE QUE ESTA LÍNEA ESTÉ AQUÍ
        $table->unsignedBigInteger('id_producto');
        $table->integer('cantidad');
        $table->timestamps();

        // Claves foráneas
        $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
