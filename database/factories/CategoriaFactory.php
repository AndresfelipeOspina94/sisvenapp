<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    protected $model = Categoria::class;

    public function definition()
    {
        return [
            'categoria_nombre' => $this->faker->word,
            'categoria_descripcion' => $this->faker->text(100), // Asegurarse de que la longitud no exceda el límite
        ];
    }
}
