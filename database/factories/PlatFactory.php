<?php

namespace Database\Factories;

use MarkSitko\LaravelUnsplash\Facades\Unsplash;
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
        $name = array(
            'Pizza au fromage', 'Hamburger', 'Cheeseburger', 'Moules Marinières', 'Salade Grecque',
            'Petit Hamburger', 'Petit Cheeseburger', 'Petit Bacon Burger', 'Petit Bacon Cheeseburger',
            'Sandwich Vegan', 'Sandwich Vegan au fromage', 'Fromage grillé', 'Pates',
            'Cheese Dog', 'Hot Dog', 'Welsh', 'Tartiflette', 'Boeuf Bourguignons'
        );
        $ingredient = array(
            'Oignon', 'Ail', 'Tomate', 'Pomme de terre', 'Carotte', 'Poivron', 'Basil', 'Persil', 'Brocoli', 'Blé',
            'Épinard', 'Champignon', 'Gingembre', 'Chilie', 'Romarin', 'Concombre', 'Cornichon', 'Avocat', 'Citrouille',
            'Menthe', 'Aubergine', 'Poireau'
        );

        $image = Unsplash::randomPhoto()
            ->term('food')
            ->orientation('landscape')
            ->toJson();

        return [
            'nom' => $this->faker->randomElement($name),
            'description' => implode(',', $this->faker->randomElements($ingredient, 4)),
            'prix' => $this->faker->randomFloat(2, 0, 100),
            'image' => $image->urls->raw . '&w=450&h300',
            'jour' => random_int(1, 7),
        ];
    }
}
