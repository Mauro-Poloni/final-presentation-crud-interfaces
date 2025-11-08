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
        \App\Models\BankAccount::factory(20)->create();
        \App\Models\KidsProfile::factory(20)->create();
        \App\Models\SocialPost::factory(20)->create();
        \App\Models\EngineeringProject::factory(20)->create();
        \App\Models\MedicalAppointment::factory(20)->create();
    }
}
