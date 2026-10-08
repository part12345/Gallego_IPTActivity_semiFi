<div class="mb-3">
    <label class="form-label">Patient</label>
    <select name="patient_id" class="form-select" required>
        <option value="">Select patient</option>
        @foreach($patients as $patient)
            <option value="{{ $patient->id }}"
                @selected(old('patient_id', $appointment->patient_id ?? '') == $patient->id)>
                {{ $patient->name }} ({{ $patient->student_id }})
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Doctor</label>
    <select name="doctor_id" class="form-select" required>
        <option value="">Select doctor</option>
        @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}"
                @selected(old('doctor_id', $appointment->doctor_id ?? '') == $doctor->id)>
                Dr. {{ $doctor->name }} — {{ $doctor->specialization }}
            </option>
        @endforeach
    </select>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Appointment Date</label>
        <input type="date" name="appointment_date" class="form-control"
               value="{{ old('appointment_date', $appointment->appointment_date ?? '') }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
            @foreach(['Pending', 'Confirmed', 'Completed', 'Cancelled'] as $status)
                <option value="{{ $status }}"
                    @selected(old('status', $appointment->status ?? 'Pending') === $status)>
                    {{ $status }}
                </option>
            @endforeach
        </select>
    </div>
</div>
