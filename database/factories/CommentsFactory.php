<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comments>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content'=> fake()->realText($maxNbChars = 200, $indexSize = 2),
            'user_id' => rand(1,10),
            'product_id' => rand(18,30)
        ];
    }
}
