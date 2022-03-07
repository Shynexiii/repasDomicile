<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AvisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'note' => intval($this->faker->numberBetween(1, 4)),
            'commentaire' => $this->faker->text(150),
        ];
    }
}
