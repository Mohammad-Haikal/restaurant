<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->randomElement(['Drinks', 'Falafel Plate (medium)', 'Hommos Plate (large)', 'Shatta (small)', 'Lemon (small)', 'Fatteh Plate (large)']),
            'category_id' => $this->faker->numberBetween(7, 9),
            'img' => 'imgs/items/item-' . $this->faker->numberBetween(1, 6) . '.png',
            'price' => $this->faker->randomFloat(2, 1, 5),
            'description' => $this->faker->sentence(9),
        ];
    }
}
