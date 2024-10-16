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
    public function definition(): array
    {
        return [
            'id_user' => uniqid(),
            'id_real_estate' => uniqid(),
            'comment' => $this->faker->sentence(10),
            'rating' => $this->faker->numberBetween(0, 5),
        ];
    }
}
