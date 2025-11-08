<?php

namespace App\Http\Controllers;

use App\Models\MedicalAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedicalAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medical_appointments = MedicalAppointment::orderBy('appointment_date', 'asc')->paginate(10);
        return view('medical_appointments.index', compact('medical_appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medical_appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_name'     => 'required|string|max:100',
            'doctor_name'      => 'required|string|max:100',
            'appointment_date' => 'required|date',
            'specialty'        => 'required|in:pediatrics,cardiology,dermatology,general_medicine',
            'notes'            => 'nullable|string|max:2000',
            'attachment'       => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:4096',
        ]);

        if ($request->hasFile('attachment')) {
            $validated['attachment_path'] = $request->file('attachment')->store('medical_attachments', 'public');
        }

        MedicalAppointment::create($validated);

        session()->flash('success', 'Appointment created successfully.');
        return redirect()->route('medical_appointments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalAppointment $medical_appointment)
    {
        return view('medical_appointments.show', compact('medical_appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicalAppointment $medical_appointment)
    {
        return view('medical_appointments.edit', compact('medical_appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedicalAppointment $medical_appointment)
    {
        $validated = $request->validate([
            'patient_name'     => 'required|string|max:100',
            'doctor_name'      => 'required|string|max:100',
            'appointment_date' => 'required|date',
            'specialty'        => 'required|in:pediatrics,cardiology,dermatology,general_medicine',
            'notes'            => 'nullable|string|max:2000',
            'attachment'       => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:4096',
        ]);

        if ($request->hasFile('attachment')) {
            // Borrar archivo previo si existe
            if ($medical_appointment->attachment_path && Storage::disk('public')->exists($medical_appointment->attachment_path)) {
                Storage::disk('public')->delete($medical_appointment->attachment_path);
            }

            $validated['attachment_path'] = $request->file('attachment')->store('medical_attachments', 'public');
        }

        $medical_appointment->update($validated);

        session()->flash('success', 'Appointment updated successfully.');
        return redirect()->route('medical_appointments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalAppointment $medical_appointment)
    {
        if ($medical_appointment->attachment_path && Storage::disk('public')->exists($medical_appointment->attachment_path)) {
            Storage::disk('public')->delete($medical_appointment->attachment_path);
        }

        $medical_appointment->delete();

        session()->flash('success', 'Appointment deleted successfully.');
        return redirect()->route('medical_appointments.index');
    }
}