@extends('layouts.app')

@section('title', 'Appointment Details')

@section('content')

    <div class="max-w-4xl mx-auto bg-white shadow-2xl rounded-xl p-8 border-t-8 border-teal-600">

        <div class="flex justify-between items-center mb-6 border-b border-gray-200 pb-4">
            <h1 class="text-3xl font-extrabold text-teal-700 flex items-center gap-3">
                <i data-lucide="clipboard-heart" class="w-7 h-7 text-teal-600"></i> Appointment Details
            </h1>
            <a href="{{ route('medical_appointments.index') }}"
               class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg font-semibold flex items-center gap-2 transition transform hover:scale-[1.02]">
                <i data-lucide="arrow-left" class="w-5 h-5"></i> Back to Schedule
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="lg:col-span-2 space-y-5">

                <div class="bg-teal-50 p-6 rounded-xl border border-teal-200 shadow-md">
                    <p class="text-sm font-bold text-teal-600 uppercase mb-2">Appointment Scheduled</p>
                    <div class="grid grid-cols-2 gap-4">
                        <p class="text-xl font-bold text-gray-800 flex items-center gap-2">
                            <i data-lucide="calendar" class="w-6 h-6 text-teal-500"></i>
                            {{ \Carbon\Carbon::parse($medical_appointment->appointment_date)->format('D, M j, Y') }}
                        </p>
                        <p class="text-xl font-bold text-gray-800 flex items-center gap-2">
                            <i data-lucide="clock" class="w-6 h-6 text-teal-500"></i>
                            {{ \Carbon\Carbon::parse($medical_appointment->appointment_date)->format('H:i A') }}
                        </p>
                    </div>
                    <p class="text-lg font-medium text-gray-700 mt-4 flex items-center gap-2 border-t pt-3">
                        <i data-lucide="stethoscope" class="w-5 h-5 text-blue-500"></i> Doctor: <span class="font-semibold text-gray-900">{{ $medical_appointment->doctor_name }}</span>
                    </p>
                    <p class="text-lg font-medium text-gray-700 flex items-center gap-2 mt-1">
                        <i data-lucide="tag" class="w-5 h-5 text-orange-500"></i> Specialty: <span class="font-semibold text-gray-900 capitalize">{{ str_replace('_', ' ', $medical_appointment->specialty) }}</span>
                    </p>
                </div>

                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 shadow-md">
                    <p class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                        <i data-lucide="file-text" class="w-5 h-5 text-gray-600"></i> Notes / Diagnosis
                    </p>
                    <div class="whitespace-pre-line text-gray-600 p-3 bg-white rounded-lg border">
                        {{ $medical_appointment->notes ?: 'No detailed notes or diagnosis provided for this appointment.' }}
                    </div>
                </div>

                <div class="text-right pt-3 border-t">
                    <a href="{{ route('medical_appointments.edit', $medical_appointment) }}"
                       class="bg-yellow-500 text-white px-5 py-2.5 rounded-lg font-semibold shadow-md hover:bg-yellow-600 transition flex items-center gap-2 transform hover:scale-[1.02] inline-flex">
                        <i data-lucide="edit"></i> Edit Appointment
                    </a>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white p-4 rounded-xl border border-gray-300 shadow-md h-full flex flex-col">
                    <p class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2 border-b pb-2">
                        <i data-lucide="paperclip" class="w-5 h-5 text-teal-600"></i> Attachment Preview
                    </p>
                    @if($medical_appointment->attachment_path)
                        <div class="flex-grow flex items-center justify-center">
                            <img src="{{ asset('storage/' . $medical_appointment->attachment_path) }}" alt="attachment"
                                 class="max-w-full max-h-64 object-contain border rounded-lg shadow-sm">
                        </div>
                        <a href="{{ asset('storage/' . $medical_appointment->attachment_path) }}" target="_blank"
                           class="mt-4 text-center text-sm font-semibold text-teal-600 hover:text-teal-800 flex items-center justify-center gap-1">
                            <i data-lucide="download" class="w-4 h-4"></i> Download File
                        </a>
                    @else
                        <div class="flex-grow flex items-center justify-center text-center text-gray-500 italic">
                            <i data-lucide="file-x" class="w-10 h-10 mb-2 text-gray-400"></i>
                            <p>No attachment available.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection