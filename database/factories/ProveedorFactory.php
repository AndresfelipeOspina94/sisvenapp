<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    protected $model = Proveedor::class;

    public function definition()
    {
        return [
            'proveedor_nombre' => $this->faker->company,
            'proveedor_nombre_contacto' => $this->faker->name,
            'proveedor_celular' => $this->faker->phoneNumber,
            'proveedor_email' => $this->faker->unique()->safeEmail,
        ];
    }
}
