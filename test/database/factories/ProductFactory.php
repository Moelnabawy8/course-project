<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
             'name' => $this->faker->word(),
            'code' => $this->faker->unique()->numberBetween(1000, 9999),
            'price' => $this->faker->randomFloat(2, 10, 500),
            'image' => 'default.png', // أو $this->faker->imageUrl()
            //
        ];
    }
}
