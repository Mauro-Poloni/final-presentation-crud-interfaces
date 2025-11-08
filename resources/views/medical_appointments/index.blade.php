@extends('layouts.app')

@section('title', 'Medical Appointments')

@section('content')
    <div class="mb-12 md:mb-16">
        <img class="w-full aspect-[4/1] object-cover object-center" src="{{ asset('storage/medical_attachments/assets/medical_appointments_banner.png') }}">
    </div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-teal-700 flex items-center gap-2">
            <i data-lucide="stethoscope"></i> Medical Appointments
        </h1>
        <a href="{{ route('medical_appointments.create') }}"
           class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 shadow-md">
            <i data-lucide="plus-circle"></i> New Appointment
        </a>
    </div>

    <table class="w-full text-left border border-gray-200 shadow-sm bg-white rounded-lg">
        <thead class="bg-teal-50 text-gray-700 uppercase text-sm">
        <tr>
            <th class="py-3 px-4">#</th>
            <th class="py-3 px-4">Patient</th>
            <th class="py-3 px-4">Doctor</th>
            <th class="py-3 px-4">Specialty</th>
            <th class="py-3 px-4">Date</th>
            <th class="py-3 px-4">Attachment</th>
            <th class="py-3 px-4 text-center">Actions</th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
        @forelse($medical_appointments as $appointment)
            <tr class="hover:bg-teal-50 transition">
                <td class="py-3 px-4">{{ $appointment->id }}</td>
                <td class="py-3 px-4 font-medium text-gray-900">{{ $appointment->patient_name }}</td>
                <td class="py-3 px-4">{{ $appointment->doctor_name }}</td>
                <td class="py-3 px-4 capitalize">{{ str_replace('_', ' ', $appointment->specialty) }}</td>
                <td class="py-3 px-4">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d/m/Y H:i') }}</td>
                <td class="py-3 px-4">
                    @if($appointment->attachment_path)
                        <img src="{{ asset('storage/' . $appointment->attachment_path) }}" alt="attachment"
                             class="w-12 h-12 object-cover rounded shadow">
                    @else
                        <span class="text-gray-400 italic">No file</span>
                    @endif
                </td>
                <td class="py-3 px-4 flex justify-center gap-3">
                    <a href="{{ route('medical_appointments.show', $appointment) }}" class="text-blue-600 hover:text-blue-800">
                        <i data-lucide="eye"></i>
                    </a>
                    <a href="{{ route('medical_appointments.edit', $appointment) }}" class="text-yellow-500 hover:text-yellow-700">
                        <i data-lucide="edit"></i>
                    </a>
                    <form action="{{ route('medical_appointments.destroy', $appointment) }}" method="POST" class="inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800">
                            <i data-lucide="trash-2"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="py-4 text-center text-gray-500 italic">No appointments found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="mt-6">
        {{ $medical_appointments->links() }}
    </div>
@endsection
