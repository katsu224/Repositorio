<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Informe;

class InformeFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   protected $model = Informe::class;

   public function definition()
   {
      $i = $this->faker->unique()->numberBetween(1, 50);
      return [
         'id' => str_pad($i, 5, '0', STR_PAD_LEFT),
         'titulo' => $this->faker->sentence(3),
         'resumen' => $this->faker->paragraph(),
         'anio' => Carbon::now()->subYears(rand(1, 5))->year,
         'ruta_pdf' => "pdf$i.pdf",
         'ruta_caratula' => "img$i.png",
         'estado' => $this->faker->randomElement(['Publicado', 'No Publicado']),
         'acceso' => $this->faker->randomElement(['Publico', 'Privado']),
         'modulo' => $this->faker->randomElement(['I', 'II', 'III']),
         'tipo_informe_id' => $this->faker->numberBetween(1, 4), // Asegúrate de que este rango corresponde a los registros en tipo_informe
         'carrera_id' => $this->faker->numberBetween(1, 8), // Debe ser entre 1 y 8
      ];
   }
}
