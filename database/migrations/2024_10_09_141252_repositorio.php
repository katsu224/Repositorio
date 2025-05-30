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
      Schema::create('tipo_informe', function (Blueprint $table) {
         $table->id();
         $table->string('nombre', 60);
         $table->timestamps();
      });

      Schema::create('informe', function (Blueprint $table) {
         $table->id();
         $table->string('titulo', 200);
         $table->longText('resumen');
         $table->year('anio');
         $table->string('ruta_pdf', 250);
         $table->string('ruta_caratula', 250);
         $table->string('estado', 45)->nullable();
         $table->string('acceso', 45);
         $table->string('modulo', 45)->nullable();
         $table->foreignId('tipo_informe_id')->constrained('tipo_informe')->onDelete('cascade');
         $table->foreignId('carrera_id')->constrained('carrera')->onDelete('cascade')->nullable();
         $table->timestamps();
      });


      Schema::create('autor_informe', function (Blueprint $table) {
         $table->string('autor_dni', 8);
         $table->foreign('autor_dni')->references('dni')->on('autores')->onDelete('cascade');

         $table->foreignId('informe_id')->constrained('informe')->onDelete('cascade');

         $table->primary(['autor_dni', 'informe_id']); // Llave primaria compuesta
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      // Schema::dropIfExists('carrera');
      Schema::dropIfExists('tipo_informe');
      Schema::dropIfExists('informe');
      Schema::dropIfExists('autores');
      Schema::dropIfExists('autor_informe');
   }
};
