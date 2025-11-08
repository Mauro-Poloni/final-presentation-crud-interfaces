@extends('layouts.app')

@section('title', 'Create Appointment')

@section('content')
    <h1 class="text-2xl font-semibold text-teal-700 mb-6 flex items-center gap-2">
        <i data-lucide="calendar-plus"></i> New Appointment
    </h1>

    <form action="{{ route('medical_appointments.store') }}" method="POST" enctype="multipart/form-data"
          class="bg-white p-6 rounded-lg shadow-md border border-gray-200 space-y-5">
        @csrf

        <div>
            <label for="patient_name" class="block font-medium text-gray-700">Patient Name</label>
            <input type="text" name="patient_name" id="patient_name"
                   class="mt-1 p-2 w-full border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500" required>
        </div>

        <div>
            <label for="doctor_name" class="block font-medium text-gray-700">Doctor Name</label>
            <input type="text" name="doctor_name" id="doctor_name"
                   class="mt-1 p-2 w-full border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500" required>
        </div>

        <div>
            <label for="appointment_date" class="block font-medium text-gray-700">Appointment Date</label>
            <input type="datetime-local" name="appointment_date" id="appointment_date"
                   class="mt-1 p-2 w-full border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500" required>
        </div>

        <div>
            <label for="specialty" class="block font-medium text-gray-700">Specialty</label>
            <select name="specialty" id="specialty"
                    class="mt-1 p-2 w-full border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500">
                <option value="pediatrics">Pediatrics</option>
                <option value="cardiology">Cardiology</option>
                <option value="dermatology">Dermatology</option>
                <option value="general_medicine">General Medicine</option>
            </select>
        </div>

        <div>
            <label for="notes" class="block font-medium text-gray-700">Notes</label>
            <textarea name="notes" id="notes" rows="4"
                      class="mt-1 p-2 w-full border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500"
                      placeholder="Enter notes about the appointment or diagnosis..."></textarea>
        </div>

        <div>
            <label for="attachment" class="block font-medium text-gray-700">Attachment (Image or Report)</label>
            <input type="file" name="attachment" id="attachment"
                   class="mt-1 p-2 w-full border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500">
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('medical_appointments.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Cancel</a>
            <button type="submit"
                    class="bg-teal-600 hover:bg-teal-700 text-white px-5 py-2 rounded-md shadow-md flex items-center gap-2">
                <i data-lucide="save"></i> Save Appointment
            </button>
        </div>
    </form>
@endsection
