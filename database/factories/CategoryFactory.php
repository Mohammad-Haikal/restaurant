<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['Drinks', 'Falafel', 'Hommos', 'Fatteh', 'Others']),
            'img' => 'storage/imgs/categories/FriyO14ifqp0SIGTMU870pVxQGCG7UrX2mZNBvAr.jpg',
        ];
    }
}
