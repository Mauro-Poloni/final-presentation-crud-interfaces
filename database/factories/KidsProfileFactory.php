<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KidsProfile>
 */
class KidsProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $colors = ['blue', 'red', 'green', 'yellow', 'pink'];

        return [
            'name'           => fake()->firstName(),
            'age'            => fake()->numberBetween(3, 14),
            'favorite_color' => fake()->randomElement($colors),
            'bio'            => fake()->optional()->sentence(10),
            'avatar_path'    => null,
            'created_at'     => now(),
            'updated_at'     => now(),
        ];
    }
}
