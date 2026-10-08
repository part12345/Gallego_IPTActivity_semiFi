@extends('layouts.app')

@section('title', 'Patients')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Patients</h2>
            <p class="text-muted mb-0">Manage registered patients.</p>
        </div>
        <a href="{{ route('patients.create') }}" class="btn btn-primary">+ Add Patient</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($patients->count())
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Year Level</th>
                        <th width="220">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($patients as $patient)
                    <tr>
                        <td>{{ $patient->student_id }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->course }}</td>
                        <td>{{ $patient->year_level }}</td>
                        <td>
                            <a href="{{ route('patients.edit', $patient) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('patients.destroy', $patient) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this patient?')">
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
        <div class="alert alert-info">No patients found. Add your first patient.</div>
    @endif
</div>
@endsection
