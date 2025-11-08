@extends('layouts.app')

@section('title', 'Edit Appointment')

@section('content')
    <h1 class="text-2xl font-semibold text-teal-700 mb-6 flex items-center gap-2">
        <i data-lucide="edit"></i> Edit Appointment
    </h1>

    <form action="{{ route('medical_appointments.update', $medical_appointment) }}" method="POST" enctype="multipart/form-data"
          class="bg-white p-6 rounded-lg shadow-md border border-gray-200 space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label for="patient_name" class="block font-medium text-gray-700">Patient Name</label>
            <input type="text" name="patient_name" id="patient_name"
                   value="{{ old('patient_name', $medical_appointment->patient_name) }}"
                   class="mt-1 p-2 w-full border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500">
        </div>

        <div>
            <label for="doctor_name" class="block font-medium text-gray-700">Doctor Name</label>
            <input type="text" name="doctor_name" id="doctor_name"
                   value="{{ old('doctor_name', $medical_appointment->doctor_name) }}"
                   class="mt-1 p-2 w-full border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500">
        </div>

        <div>
            <label for="appointment_date" class="block font-medium text-gray-700">Appointment Date</label>
            <input type="datetime-local" name="appointment_date" id="appointment_date"
                   value="{{ old('appointment_date', \Carbon\Carbon::parse($medical_appointment->appointment_date)->format('Y-m-d\TH:i')) }}"
                   class="mt-1 p-2 w-full border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500">
        </div>

        <div>
            <label for="specialty" class="block font-medium text-gray-700">Specialty</label>
            <select name="specialty" id="specialty"
                    class="mt-1 p-2 w-full border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500">
                <option value="pediatrics" @selected($medical_appointment->specialty == 'pediatrics')>Pediatrics</option>
                <option value="cardiology" @selected($medical_appointment->specialty == 'cardiology')>Cardiology</option>
                <option value="dermatology" @selected($medical_appointment->specialty == 'dermatology')>Dermatology</option>
                <option value="general_medicine" @selected($medical_appointment->specialty == 'general_medicine')>General Medicine</option>
            </select>
        </div>

        <div>
            <label for="notes" class="block font-medium text-gray-700">Notes</label>
            <textarea name="notes" id="notes" rows="4" class="mt-1 p-2 w-full border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500">{{ old('notes', $medical_appointment->notes) }}</textarea>
        </div>

        <div>
            <label class="block font-medium text-gray-700">Current Attachment</label>
            @if($medical_appointment->attachment_path)
                <img src="{{ asset('storage/' . $medical_appointment->attachment_path) }}" alt="attachment" class="w-32 h-32 object-cover rounded shadow mt-2">
            @else
                <p class="text-gray-400 italic">No file uploaded.</p>
            @endif
        </div>

        <div>
            <label for="attachment" class="block font-medium text-gray-700">Replace Attachment</label>
            <input type="file" name="attachment" id="attachment" class="mt-1 p-2 w-full border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500">
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('medical_appointments.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Cancel</a>
            <button type="submit"
                    class="bg-teal-600 hover:bg-teal-700 text-white px-5 py-2 rounded-md shadow-md flex items-center gap-2">
                <i data-lucide="save"></i> Update
            </button>
        </div>
    </form>
@endsection
