<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EngineeringProject>
 */
class EngineeringProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['planned', 'in_progress', 'completed'];
        $engineers = ['Ing. Mauro García', 'Ing. Lucía Torres', 'Ing. Franco López','Ing. Valentina Díaz', 'Ing. Martín Rivas', 'Ing. Sofía Herrera'];

        return [
            'project_name'  => fake()->sentence(3) . ' System',
            'status'        => fake()->randomElement($statuses),
            'description'   => fake()->paragraph(3),
            'diagram_path'  => null,
            'lead_engineer' => fake()->randomElement($engineers),
            'created_at'    => now(),
            'updated_at'    => now(),
        ];
    }
}
