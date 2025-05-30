<?php

namespace Database\Factories;

use App\Models\Autor;
use Illuminate\Database\Eloquent\Factories\Factory;

class AutorFactory extends Factory
{
    protected $model = Autor::class;

    public function definition()
    {
        return [
            'dni' => $this->faker->unique()->numerify('########'), 
            'nombre' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
        ];
    }
}
