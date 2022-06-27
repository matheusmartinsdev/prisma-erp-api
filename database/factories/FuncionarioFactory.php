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
            'nome'      => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'matricula' => $this->faker->numerify("#########"),
            'tipo'      => 'tecnico'
        ];
    }
}
