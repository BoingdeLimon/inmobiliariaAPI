<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photos>
 */
class PhotosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_real_estate' => uniqid(),
            // * Aqui simulamos cualquier tipo de archivo
            'photo' => $this->faker->word() . '.' . $this->faker->randomElement(['jpg', 'png', 'jpeg']),

            // 'photo' => $this->faker->word() . '.jpg',
        ];
    }
}
