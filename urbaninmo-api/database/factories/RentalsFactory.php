<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rentals>
 */
class RentalsFactory extends Factory
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
            'rent_start' => $this->faker->date(),
            'rent_end' => $this->faker->date(),
            'reason_end' => $this->faker->sentence(10),
        ];
    }
}
