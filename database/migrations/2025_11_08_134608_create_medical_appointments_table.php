<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medical_appointments', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name', 100);
            $table->string('doctor_name', 100);
            $table->dateTime('appointment_date');
            $table->enum('specialty', ['pediatrics', 'cardiology', 'dermatology', 'general_medicine']);
            $table->text('notes')->nullable(); // text area
            $table->string('attachment_path')->nullable(); // imagen o informe adjunto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_appointments');
    }
};
