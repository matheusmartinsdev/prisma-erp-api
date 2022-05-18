<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FuncionarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome'      => $this->faker->name(),
            'matricula' => $this->faker->numerify("#########"),
            'tipo'      => $this->faker->randomElement((['tecnico', 'administrativo']))
        ];
    }
}
