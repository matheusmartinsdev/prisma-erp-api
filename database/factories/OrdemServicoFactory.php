<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrdemServico>
 */
class OrdemServicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'contratante_id'    => \App\Models\Contratante::all()->random()->id,
            'funcionario_id'    => \App\Models\Funcionario::all()->random()->id,
            'natureza'          => $this->faker->randomElement([
                'outros',
                'mecanica',
                'hidraulica',
                'civil',
                'checklist',
                'medicao',
                'acompanhamento',
                'eletrico',
                'administrativo'
            ]),
            'tipagem'           => $this->faker->randomElement(['corretiva', 'preventiva']),
            'inicio'            => Carbon::parse($this->faker->dateTimeBetween('-4 days'))->format('d/m/Y'),
        ];
    }
}
