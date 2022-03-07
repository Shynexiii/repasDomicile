<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'montant' => $this->faker->randomFloat(2, 10, 1000),
            'status' => $this->faker->randomElement(['En cours', 'Livrée']),
            'adresse' => $this->faker->address(),
            'mode_paiement' => 'card',
        ];
    }
}
