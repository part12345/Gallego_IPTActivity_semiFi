<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['patient', 'doctor'])
            ->latest('appointment_date')
            ->get();

        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $patients = Patient::orderBy('name')->get();
        $doctors = Doctor::orderBy('name')->get();

        return view('appointments.create', compact('patients', 'doctors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'status' => 'required|string|max:50',
        ]);

        Appointment::create($validated);

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment added successfully.');
    }

    public function show(Appointment $appointment)
    {
        $appointment->load(['patient', 'doctor']);
        return view('appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        $patients = Patient::orderBy('name')->get();
        $doctors = Doctor::orderBy('name')->get();

        return view('appointments.edit', compact('appointment', 'patients', 'doctors'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'status' => 'required|string|max:50',
        ]);

        $appointment->update($validated);

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment updated successfully.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment deleted successfully.');
    }
}
