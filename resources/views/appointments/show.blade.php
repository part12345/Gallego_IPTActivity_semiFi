@extends('layouts.app')
@section('title', 'Appointment Details')
@section('content')
<div class="container py-4"><div class="card shadow-sm"><div class="card-body">
<h4>Appointment Details</h4>
<p><strong>Patient:</strong> {{ $appointment->patient->name ?? 'N/A' }}</p>
<p><strong>Doctor:</strong> {{ $appointment->doctor->name ?? 'N/A' }}</p>
<p><strong>Date:</strong> {{ $appointment->appointment_date }}</p>
<p><strong>Status:</strong> {{ $appointment->status }}</p>
<a href="{{ route('appointments.index') }}" class="btn btn-secondary">Back</a>
<a href="{{ route('appointments.edit', $appointment) }}" class="btn btn-warning">Edit</a>
</div></div></div>
@endsection
