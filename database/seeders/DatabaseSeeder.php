<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\BankAccount::factory(60)->create();
        \App\Models\KidsProfile::factory(80)->create();
        \App\Models\SocialPost::factory(50)->create();
        \App\Models\EngineeringProject::factory(60)->create();
        \App\Models\MedicalAppointment::factory(80)->create();
    }
}
