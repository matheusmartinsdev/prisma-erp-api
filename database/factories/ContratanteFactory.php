<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contratante>
 */
class ContratanteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome'      => $this->faker->company(),
            'cnpj'      => $this->faker->cnpj(false),
            'endereco'  => $this->faker->streetAddress(),
            'cidade'    => $this->faker->city(),
            'estado'    => $this->faker->stateAbbr(),
            'cep'       => '12322040'
        ];
    }
}
