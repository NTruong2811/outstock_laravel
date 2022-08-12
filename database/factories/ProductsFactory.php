<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>fake()->name(),
            'price'=>fake()->numberBetween($min = 10,$max = 100),
            'img' => 'https://picsum.photos/200/300',
            'description' => fake()->realText($maxNbChars = 200, $indexSize = 2),
            'discount' => 0,
             'quantity' => 100,
              'status' => 0,
              'cate_id' => rand(1,10)
        ];
    }
}
