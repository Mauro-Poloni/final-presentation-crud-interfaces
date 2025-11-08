@extends('layouts.app')

@section('title', 'Appointment Details')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold text-teal-700 flex items-center gap-2">
                <i data-lucide="clipboard-heart"></i> Appointment Details
            </h1>
            <a href="{{ route('medical_appointments.index') }}"
               class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg flex items-center gap-2">
                <i data-lucide="arrow-left"></i> Back
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p><strong>Patient:</strong> {{ $medical_appointment->patient_name }}</p>
                <p class="mt-2"><strong>Doctor:</strong> {{ $medical_appointment->doctor_name }}</p>
                <p class="mt-2"><strong>Specialty:</strong> {{ ucfirst(str_replace('_', ' ', $medical_appointment->specialty)) }}</p>
                <p class="mt-2"><strong>Date:</strong> {{ \Carbon\Carbon::parse($medical_appointment->appointment_date)->format('d/m/Y H:i') }}</p>
                <p class="mt-4 text-gray-700"><strong>Notes:</strong></p>
                <p class="mt-1 text-gray-600">{{ $medical_appointment->notes ?: 'No notes provided.' }}</p>
            </div>

            <div>
                @if($medical_appointment->attachment_path)
                    <img src="{{ asset('storage/' . $medical_appointment->attachment_path) }}" alt="attachment"
                         class="w-full h-64 object-contain border rounded-lg shadow-sm">
                @else
                    <p class="text-gray-400 italic">No attachment available.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
