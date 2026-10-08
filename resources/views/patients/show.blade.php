@extends('layouts.app')
@section('title', 'Patient Details')
@section('content')
<div class="container py-4"><div class="card shadow-sm"><div class="card-body">
<h4>{{ $patient->name }}</h4>
<p><strong>Student ID:</strong> {{ $patient->student_id }}</p>
<p><strong>Course:</strong> {{ $patient->course }}</p>
<p><strong>Year Level:</strong> {{ $patient->year_level }}</p>
<a href="{{ route('patients.index') }}" class="btn btn-secondary">Back</a>
<a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning">Edit</a>
</div></div></div>
@endsection
