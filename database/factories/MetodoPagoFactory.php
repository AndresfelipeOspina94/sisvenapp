<?php

namespace Database\Factories;

use App\Models\MetodoPago;
use Illuminate\Database\Eloquent\Factories\Factory;

class MetodoPagoFactory extends Factory
{
    protected $model = MetodoPago::class;

    public function definition()
    {
        return [
            'metodo_pago_nombre' => $this->faker->word,
            'metodo_pago_observacion' => $this->faker->text(50), // Ajuste de longitud
        ];
    }
}
