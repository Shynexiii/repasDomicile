<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->word,
            'description' => $this->faker->sentence(),
            'prix' => $this->faker->randomFloat(2, 0, 100),
            'image' => 'https://dummyimage.com/450x300',
        ];
    }
}
