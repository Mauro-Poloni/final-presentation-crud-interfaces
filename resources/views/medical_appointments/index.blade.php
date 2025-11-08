@extends('layouts.app')

@section('title', 'Medical Appointments')

@section('content')

    <div class="mb-8">
        <img class="w-full aspect-[4/1] object-cover object-center rounded-xl shadow-xl border-4 border-teal-300"
             src="{{ asset('storage/medical_attachments/assets/medical_appointments_banner.png') }}"
             alt="Medical Appointments Banner">
    </div>

    <div class="bg-white shadow-2xl rounded-xl p-8 border-t-8 border-teal-600">

        <div class="flex justify-between items-center mb-8 border-b border-gray-200 pb-4">
            <h1 class="text-3xl font-extrabold text-teal-700 flex items-center gap-3">
                <i data-lucide="calendar-check" class="w-8 h-8 text-teal-600"></i> Appointment Schedule
            </h1>

            <a href="{{ route('medical_appointments.create') }}"
               class="bg-teal-600 text-white px-5 py-2.5 rounded-lg font-semibold shadow-md hover:bg-teal-700 transition duration-300 flex items-center gap-2 transform hover:scale-[1.02]">
                <i data-lucide="plus-circle"></i> New Appointment
            </a>
        </div>

        <h2 class="text-2xl font-semibold text-gray-800 mb-5 border-b pb-3">Upcoming Appointments</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($medical_appointments as $appointment)
                <div class="bg-white rounded-xl shadow-lg border-l-4 border-teal-500 p-5 transform hover:shadow-xl transition duration-300 relative">

                    <div class="text-center bg-teal-50 p-3 rounded-t-lg mb-4 border-b-2 border-teal-200">
                        <p class="text-sm font-semibold text-teal-600 uppercase">Appointment Date</p>
                        <p class="text-2xl font-bold text-teal-800">
                            {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d/m/Y') }}
                        </p>
                        <p class="text-xl font-medium text-teal-700">
                            <i data-lucide="clock" class="inline w-5 h-5 mr-1"></i> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('H:i') }}
                        </p>
                    </div>

                    <div class="space-y-3 text-sm">
                        <p class="font-semibold text-gray-900 flex items-center gap-2">
                            <i data-lucide="user" class="w-4 h-4 text-blue-500"></i> Patient: <span class="font-normal">{{ $appointment->patient_name }}</span>
                        </p>
                        <p class="text-gray-700 flex items-center gap-2">
                            <i data-lucide="stethoscope" class="w-4 h-4 text-teal-500"></i> Doctor: <span class="font-normal">{{ $appointment->doctor_name }}</span>
                        </p>
                        <p class="text-gray-700 flex items-center gap-2">
                            <i data-lucide="tag" class="w-4 h-4 text-orange-500"></i> Specialty: <span class="font-normal capitalize">{{ str_replace('_', ' ', $appointment->specialty) }}</span>
                        </p>
                    </div>

                    <div class="mt-4 pt-3 border-t border-dashed border-gray-200 flex justify-between items-center">
                        <span class="text-xs font-semibold text-gray-600">
                            @if($appointment->attachment_path)
                                <i data-lucide="paperclip" class="w-4 h-4 inline mr-1 text-teal-500"></i> File Attached
                            @else
                                <i data-lucide="file-text" class="w-4 h-4 inline mr-1 text-gray-400"></i> No Attachment
                            @endif
                        </span>
                        <span class="text-xs text-gray-400">#{{ $appointment->id }}</span>
                    </div>

                    <div class="flex justify-end gap-3 mt-4">
                        <a href="{{ route('medical_appointments.show', $appointment) }}" class="text-blue-600 hover:text-blue-800 p-1 rounded hover:bg-blue-50 transition" title="View Details">
                            <i data-lucide="eye" class="w-5 h-5"></i>
                        </a>
                        <a href="{{ route('medical_appointments.edit', $appointment) }}" class="text-yellow-600 hover:text-yellow-800 p-1 rounded hover:bg-yellow-50 transition" title="Edit Appointment">
                            <i data-lucide="edit" class="w-5 h-5"></i>
                        </a>
                        <form action="{{ route('medical_appointments.destroy', $appointment) }}" method="POST" class="inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 p-1 rounded hover:bg-red-50 transition" title="Cancel Appointment">
                                <i data-lucide="trash-2" class="w-5 h-5"></i>
                            </button>
                        </form>
                    </div>

                </div>
            @empty
                <div class="col-span-full text-center p-10 bg-gray-50 rounded-xl text-gray-500 italic border-4 border-dashed border-gray-300">
                    <i data-lucide="calendar-off" class="w-12 h-12 mx-auto mb-3 text-teal-500"></i>
                    <p class="font-semibold text-lg">No appointments scheduled. Click "New Appointment" to book one.</p>
                </div>
            @endforelse
        </div>

        <h2 class="text-2xl font-semibold text-teal-700 mt-10 mb-5 border-t pt-6">Formal Appointment Register</h2>
        <table class="w-full text-left border border-gray-200 shadow-lg bg-gray-50 rounded-lg overflow-hidden">
            <thead class="bg-teal-700 text-white uppercase text-xs">
            <tr>
                <th class="py-3 px-4">ID</th>
                <th class="py-3 px-4">Patient</th>
                <th class="py-3 px-4">Doctor</th>
                <th class="py-3 px-4">Specialty</th>
                <th class="py-3 px-4">Date & Time</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
            @foreach($medical_appointments as $appointment)
                <tr class="hover:bg-teal-50 transition">
                    <td class="py-3 px-4 font-bold text-teal-700">{{ $appointment->id }}</td>
                    <td class="py-3 px-4 font-medium text-gray-800">{{ $appointment->patient_name }}</td>
                    <td class="py-3 px-4 text-sm">{{ $appointment->doctor_name }}</td>
                    <td class="py-3 px-4 text-sm capitalize">{{ str_replace('_', ' ', $appointment->specialty) }}</td>
                    <td class="py-3 px-4 text-sm font-semibold">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-8">
            {{ $medical_appointments->links() }}
        </div>
    </div>
@endsection