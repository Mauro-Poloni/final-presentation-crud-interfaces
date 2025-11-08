<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/bank_accounts');
Route::resource('bank_accounts', \App\Http\Controllers\BankAccountController::class);
Route::resource('kids_profiles', \App\Http\Controllers\KidsProfileController::class);
Route::resource('social_posts', \App\Http\Controllers\SocialPostController::class);
Route::resource('engineering_projects', \App\Http\Controllers\EngineeringProjectController::class);
Route::resource('medical_appointments', \App\Http\Controllers\MedicalAppointmentController::class);

