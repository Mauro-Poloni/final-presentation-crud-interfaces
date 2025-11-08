<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BankAccount>
 */
class BankAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $account_types = ['savings', 'checking', 'investment'];

        return [
            'account_number' => strtoupper(fake()->unique()->bothify('ACCT-####-####')),
            'holder_name'    => fake()->name(),
            'account_type'   => fake()->randomElement($account_types),
            'balance'        => fake()->randomFloat(2, 1000, 100000),
            'notes'          => fake()->optional()->sentence(10),
            'photo_path'     => null, // se puede cargar luego con Seeder si querés imágenes
            'created_at'     => now(),
            'updated_at'     => now(),
        ];
    }
}
