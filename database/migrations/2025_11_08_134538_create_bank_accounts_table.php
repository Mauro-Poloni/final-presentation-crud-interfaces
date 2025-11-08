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
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_number', 30)->unique();
            $table->string('holder_name', 100);
            $table->enum('account_type', ['savings', 'checking', 'investment']);
            $table->decimal('balance', 12, 2)->default(0);
            $table->text('notes')->nullable(); // text area
            $table->string('photo_path')->nullable(); // imagen de usuario o logo banco
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};
