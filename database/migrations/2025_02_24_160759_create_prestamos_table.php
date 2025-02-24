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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('herramienta_id')->constrained()->cascadeOnDelete();
            $table->string('evento')->nullable()->unique();
            // PRESTADO: EL NÚMERO DE UNIDADES PRESTADAS
            $table->unsignedInteger('prestado');
            // TRES ESTADOS: 
            // - EFECTUADO (EL USUARIO HA TOMADO PRESTADA LA HERRAMIENTA) 
            // - EN ESPERA (EL USUARIO HA SOLICITADO LA REVISIÓN DE LA DEVOLUCIÓN) 
            // - DEVUELTO (EL ADMINISTRADOR HA COMPROBADO QUE ESTÁ TODO PERFECTO)
            $table->enum('estado', ['EFECTUADO', 'EN ESPERA', 'DEVUELTO'])->default('EFECTUADO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
