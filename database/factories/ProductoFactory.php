<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition()
    {
        return [
            'producto_name' => $this->faker->word,
            'categoria_id' => Categoria::factory(),
            'proveedor_id' => Proveedor::factory(),
            'precio_producto' => $this->faker->randomFloat(2, 1, 1000),
            'cantidad_stock' => $this->faker->numberBetween(1, 100),
        ];
    }
}
