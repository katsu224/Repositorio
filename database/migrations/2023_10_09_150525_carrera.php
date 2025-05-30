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
        Schema::create('carrera', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('ruta_logo', 100);
        });

        Schema::create('autores', function (Blueprint $table) {
            $table->string('dni', 8)->primary(); 
            $table->string('nombre', 50);
            $table->string('apellidos', 60);
        });

    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrera');
        Schema::dropIfExists('autores');
    }
};
