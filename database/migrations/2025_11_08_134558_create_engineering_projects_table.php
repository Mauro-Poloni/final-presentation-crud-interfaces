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
        Schema::create('engineering_projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name', 150);
            $table->enum('status', ['planned', 'in_progress', 'completed'])->default('planned');
            $table->text('description')->nullable(); // text area
            $table->string('diagram_path')->nullable(); // imagen o esquema del proyecto
            $table->string('lead_engineer', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engineering_projects');
    }
};
