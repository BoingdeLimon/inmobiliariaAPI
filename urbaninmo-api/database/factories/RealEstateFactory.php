<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RealEstate>
 */
class RealEstateFactory extends Factory
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
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(10),
            'size' => $this->faker->randomFloat(2, 50, 500),
            'rooms' => $this->faker->numberBetween(1, 10),
            'bathrooms' => $this->faker->numberBetween(1, 5),
            'type' => $this->faker->randomElement(['Casa', 'Departamento', 'Oficina']),
            'has_garage' => $this->faker->boolean(),
            'has_garden' => $this->faker->boolean(),
            'has_patio' => $this->faker->boolean(),
            'id_address' => uniqid(),
            'price' => "$1,600,000",
            'is_occupied' => $this->faker->boolean(),
            'pdf' => $this->faker->word() . '.pdf',
            
        ];
    }
}
