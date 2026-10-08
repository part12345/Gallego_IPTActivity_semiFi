@extends('layouts.app')

@section('title', 'Appointments')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Appointments</h2>
            <p class="text-muted mb-0">Manage patient appointments.</p>
        </div>
        <a href="{{ route('appointments.create') }}" class="btn btn-primary">+ Add Appointment</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($appointments->count())
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th width="220">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->patient->name ?? 'N/A' }}</td>
                    <td>{{ $appointment->doctor->name ?? 'N/A' }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td><span class="badge text-bg-info">{{ $appointment->status }}</span></td>
                    <td>
                        <a href="{{ route('appointments.edit', $appointment) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this appointment?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @else
        <div class="alert alert-info">No appointments found. Add your first appointment.</div>
    @endif
</div>
@endsection
