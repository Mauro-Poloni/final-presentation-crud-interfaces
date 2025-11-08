@extends('layouts.app')

@section('title', 'Create Appointment')

@section('content')

    <div class="max-w-3xl mx-auto bg-white shadow-2xl rounded-xl p-8 border-t-8 border-teal-600">

        <h2 class="text-3xl font-extrabold text-teal-700 mb-8 border-b border-gray-200 pb-4 flex items-center gap-3">
            <i data-lucide="calendar-plus" class="w-7 h-7 text-teal-600"></i> New Appointment Booking
        </h2>

        <form action="{{ route('medical_appointments.store') }}" method="POST" enctype="multipart/form-data"
              class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="patient_name" class="block font-semibold text-gray-700 mb-1">Patient Name</label>
                    <input type="text" name="patient_name" id="patient_name"
                           class="w-full border-gray-300 rounded-lg p-3 shadow-sm focus:ring-teal-500 focus:border-teal-500 transition" required>
                </div>
                <div>
                    <label for="doctor_name" class="block font-semibold text-gray-700 mb-1">Doctor Name</label>
                    <input type="text" name="doctor_name" id="doctor_name"
                           class="w-full border-gray-300 rounded-lg p-3 shadow-sm focus:ring-teal-500 focus:border-teal-500 transition" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="appointment_date" class="block font-semibold text-gray-700 mb-1">Appointment Date & Time</label>
                    <input type="datetime-local" name="appointment_date" id="appointment_date"
                           class="w-full border-gray-300 rounded-lg p-3 shadow-sm focus:ring-teal-500 focus:border-teal-500 transition" required>
                </div>
                <div>
                    <label for="specialty" class="block font-semibold text-gray-700 mb-1">Specialty</label>
                    <select name="specialty" id="specialty"
                            class="w-full border-gray-300 rounded-lg p-3 bg-white shadow-sm focus:ring-teal-500 focus:border-teal-500 transition">
                        <option value="pediatrics">Pediatrics</option>
                        <option value="cardiology">Cardiology</option>
                        <option value="dermatology">Dermatology</option>
                        <option value="general_medicine">General Medicine</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="notes" class="block font-semibold text-gray-700 mb-1">Notes / Reason for Visit</label>
                <textarea name="notes" id="notes" rows="4"
                          class="w-full border-gray-300 rounded-lg p-3 shadow-sm focus:ring-teal-500 focus:border-teal-500 transition"
                          placeholder="Enter notes about the appointment or diagnosis..."></textarea>
            </div>

            <div class="p-4 bg-teal-50 rounded-lg border border-teal-200">
                <label for="attachment" class="block font-semibold text-gray-700 mb-2 flex items-center gap-2">
                    <i data-lucide="paperclip" class="w-5 h-5 text-teal-600"></i> Attachment (Report, Image, etc.)
                </label>
                <input type="file" name="attachment" id="attachment"
                       class="w-full text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-teal-100 file:text-teal-600 hover:file:bg-teal-200 cursor-pointer">
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="{{ route('medical_appointments.index') }}"
                   class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition transform hover:scale-[1.02]">
                    Cancel
                </a>
                <button type="submit"
                        class="bg-teal-600 text-white px-6 py-3 rounded-lg font-semibold shadow-md shadow-teal-300/50 hover:bg-teal-700 transition flex items-center gap-2 transform hover:scale-[1.02]">
                    <i data-lucide="save"></i> Save Appointment
                </button>
            </div>
        </form>
    </div>
@endsection