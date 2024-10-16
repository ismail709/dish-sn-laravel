<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dish>
 */
class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "description" => fake()->paragraph(),
            "image" => fake()->randomElement(["images/demo.jpg", "images/demo2.jpg", "images/demo3.jpg", "images/demo4.jpg", "images/demo5.jpg", "images/demo6.jpg", "images/demo7.jpg", "images/demo8.jpg", "images/demo9.jpg", "images/demo10.jpg"])
        ];
    }
}
