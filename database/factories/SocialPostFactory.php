<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SocialPost>
 */
class SocialPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $visibilities = ['public', 'friends', 'private'];
        $usernames = ['tech_guru', 'mauro_dev', 'design_lover', 'gamer_kid','travel_girl', 'foodie_explorer', 'coder_boy', 'art_soul'];

        return [
            'username'   => fake()->randomElement($usernames),
            'visibility' => fake()->randomElement($visibilities),
            'content'    => fake()->optional(0.8)->sentence(12),
            'image_path' => null,
            'likes'      => fake()->numberBetween(0, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
