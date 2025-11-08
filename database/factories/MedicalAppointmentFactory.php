<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalAppointment>
 */
class MedicalAppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $specialties = ['pediatrics', 'cardiology', 'dermatology', 'general_medicine'];
        $doctors = [
            'Dr. Ana Martínez',
            'Dr. Carlos Gómez',
            'Dra. Lucía Herrera',
            'Dr. Mateo Rivas',
            'Dra. Julieta Torres',
            'Dr. Esteban Morales'
        ];

        $patients = [
            'María López',
            'Juan Pérez',
            'Sofía García',
            'Valentín Díaz',
            'Camila Torres',
            'Bruno Fernández'
        ];

        return [
            'patient_name'     => fake()->randomElement($patients),
            'doctor_name'      => fake()->randomElement($doctors),
            'appointment_date' => Carbon::now()->addDays(fake()->numberBetween(1, 30))->setTime(fake()->numberBetween(8, 18), [0, 30][fake()->boolean() ? 0 : 1]),
            'specialty'        => fake()->randomElement($specialties),
            'notes'            => fake()->optional(0.8)->sentence(10),
            'attachment_path'  => null,
            'created_at'       => now(),
            'updated_at'       => now(),
        ];
    }
}
